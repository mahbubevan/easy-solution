<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('system.title')}}</title>

    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="list-group">
                    @foreach ($categories as $category)
                        <a href="#" class="list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12">
                @foreach ($blogs as $blog)
                    {{-- <span> {{$blog->description}} </span> --}}
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                            <span class="display-4"> {{$blog->title}} </span>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                           <div class="author-info row">
                               <div class="img-circle col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6">
                                    <img src="{{$blog->thumbnail_image}}" alt="" class="img-thumbnail img-fluid rounded-circle">
                               </div>
                               <div class="author col-xl-4 col-lg-4 col-md-4 my-auto">
                                   <span> {{$blog->author->name}} </span>
                               </div>
                           </div>
                           <div class="publsihed-info row">
                               <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 col-sm-12">
                                   <span> {{__('system.published')}} </span>
                               </div>
                               <div class="col-xl-9 col-lg-9 col-md-6 col-xs-12 col-sm-12">
                                <span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$blog->created_at)->format('D d F Y') }} </span>
                            </div>
                           </div>
                           <div class="tag-info row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 col-sm-12">
                                <span> {{__('system.tags')}} </span>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-6 col-xs-12 col-sm-12">
                                @foreach (json_decode($blog->tags,true) as $tag)
                                <span class="badge badge-primary">{{$tag}}</span>
                                @endforeach
                            </div>
                           </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                            <img src="{{$blog->thumbnail_image}}" class="img-thumbnail img-fluid" alt="">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                            <div class="description row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                                    {!! $blog->description !!}
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                    <button class="btn btn-md btn-primary">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <h1>REcent Posts</h1>
            </div>
        </div>
    </div>
    {{-- bootsrap js cdn --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
