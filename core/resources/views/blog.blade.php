@extends('layouts.frontend')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="title col-12 text-center">
                        <span class="display-3"> {{$blog->title}} </span>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="thumbnail-img col-lg-12 col-xs-12 col-md-12 col-sm-6 col-xs-6">
                        <img src="{{$blog->thumbnail_image}}" alt="" class="img-fluid img-thumbnail">
                    </div>
                </div>
                <div class="row mt-5">
                        <div class="author-info col-lg-1 col-xl-1 col-md-3 col-sm-4 col-xs-4">
                            <img src="{{$blog->thumbnail_image}}" class="img-thumbnail rounded-circle" alt="">
                        </div>
                        <div class="col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-6 my-auto">
                            <span class="h-6 font-weight-bold"> {{__('system.by')}}, {{$blog->author->name}} </span>
                        </div>
                        <div class="published-info col-lg-1 col-xl-1 col-md-2 col-sm-3 col-xs-6 my-auto">
                            <span class="font-weight-bold">{{__('system.published')}}</span>
                        </div>
                        <div class="published-info col-lg-3 col-xl-3 col-md-3 col-sm-4 col-xs-6 my-auto">
                            <span>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$blog->created_at)->format('D d F Y') }}
                            </span>
                        </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-1 col-xl-1 col-sm-6 col-xs-6 col-md-3">
                        <span class="font-weight-bold"> {{__('system.tags')}} </span>
                    </div>
                    <div class="col-lg-10 col-xl-10 col-sm-6 col-xs-6 col-md-9">
                        @foreach (json_decode($blog->tags,true) as $tag)
                            <span class="badge badge-primary">{{$tag}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-2">
                        <div class="category-info col-lg-2 col-xl-2 col-sm-6 col-xs-6 col-md-3">
                            <span class="font-weight-bold"> {{__('system.category')}} </span>
                        </div>
                        <div class="col-lg-10 col-xl-10 col-sm-6 col-xs-6 col-md-9">
                            @foreach ($blog->categories as $category)
                            <span class="badge badge-success">{{$category->name}}</span>
                            @endforeach
                        </div>
                </div>
                <div class="row mt-5">
                    <div class="description-info text-justify p-5">
                        {!! $blog->description !!}
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach ($blog->images as $img)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 col-sm-12 gallery">
                            <img
                            src="{{$img->path}}"
                            class="img-fluid img-thumbnail gallery-img"
                            alt=""
                            data-image-path={{$img->path??''}}
                            data-caption = {{$img->category->name??''}}
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="full-panel">
        <div class="thumbnail text-center">
            <img class="img-thumbnail img-fluid" src="" id="preview" alt="img">
            <div class="mt-5 mb-3" id="preview-images"></div>
        </div>
        <div class="close-btn display-4">X</div>
        <div class="arrow right-arrow"><i class="fas fa-chevron-right"></i></div>
        <div class="arrow left-arrow"><i class="fas fa-chevron-left"></i></div>
    </div>
@endsection
