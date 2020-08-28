@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 my-auto p-5">
            <div class="list-group">
                @foreach ($categories as $category)
                    <a href="#" class="list-group-item list-group-item-action">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-4 col-sm-12 p-5 mt-5">
            @foreach ($blogs as $blog)
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 mb-3">
                        <span class="display-4"> {{$blog->title}} </span>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                       <div class="author-info row">
                           <div class="img-circle col-xl-1 col-lg-1 col-md-6 col-sm-6 col-xs-6">
                                <img src="{{$blog->thumbnail_image}}" alt="" class="w-100 img-thumbnail img-fluid rounded-circle">
                           </div>
                           <div class="author col-xl-4 col-lg-4 col-md-4 my-auto text-left">
                               <span>by {{$blog->author->name}} </span>
                           </div>
                       </div>
                       <div class="publsihed-info row mt-3">
                           <div class="col-xl-2 col-lg-2 col-md-6 col-xs-12 col-sm-12">
                               <span> {{__('system.published')}} </span>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-6 col-xs-12 col-sm-12 text-left">
                            <span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$blog->created_at)->format('D d F Y') }} </span>
                        </div>
                       </div>
                       <div class="tag-info row mt-1">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-xs-12 col-sm-12">
                            <span> {{__('system.tags')}} </span>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-6 col-xs-12 col-sm-12">
                            @foreach (json_decode($blog->tags,true) as $tag)
                            <span class="badge badge-primary">{{$tag}}</span>
                            @endforeach
                        </div>
                       </div>
                       <div class="category-info row mt-1">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-xs-12 col-sm-12">
                            <span> {{__('system.category')}} </span>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-6 col-xs-12 col-sm-12">
                            @foreach ($blog->categories as $category)
                            <span class="badge badge-success">{{$category->name}}</span>
                            @endforeach
                        </div>
                       </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 mt-3">
                        <img src="{{$blog->thumbnail_image}}" class="img-thumbnail img-fluid" alt="">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 mt-5">
                        <div class="description row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                                {!! $blog->description !!}
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right mt-3">
                                <a href="{{route('show',['slug'=>$blog->slug,'blog'=>$blog->id])}}" class="btn btn-md btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 my-auto p-3">
            <h1>REcent Posts</h1>
        </div>
    </div>
</div>


@endsection
