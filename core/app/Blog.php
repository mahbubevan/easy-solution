<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    const UNPUBLISHED = 0;
    const PUBLISHED = 1;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
    protected $appends = ['thumbnail_image'];

    public function getThumbnailImageAttribute()
    {
        try{
            return $this->images->first()->path;
        }catch(Exception $e){
            return 'N/A';
        }
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'blog_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
