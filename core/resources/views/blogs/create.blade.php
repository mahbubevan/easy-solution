@extends('layouts.frontend')

@section('content')
    <div class="container mt-2 mb-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <form action="#" method="post" class="create-field" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-12">{{__('blog.title')}}</label>
                        <input type="text" class="form-control col-6" name="title"/>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-12">{{__('blog.thumbnail_image')}}</label>
                        <div class="img-preview">
                            <img id="preview" class="img-fluid img-thumbnail" src="{{asset('assets/images/default/default-image.jpg')}}" alt="" />
                        </div>
                        <div class="file-input col-12">
                            <input id="thumbnail" type="file" name="thumbnail"/>
                            <small class="col-12 text-danger">Image Size: 1060*700</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tag" class="col-12">{{__('blog.tags')}}</label>
                        <small style="font-size:.85rem" class="col-12"> <i class="fas fa-exclamation-circle"></i> {{__('blog.tag_hint')}}</small>
                        <input type="text" id="tag" name="tag" class="form-control col-2">
                        <div id="tagField" class="col-12 mt-3">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-12">{{__('blog.categories')}}</label>
                        <select name="categories" multiple id="" class="selectpicker form-control col-4">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="description">{{__('blog.description')}}</label>
                        <textarea class="nicEdit form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                            <button type="submit" class="btn btn-lg btn-primary">Publish <span class="ml-1"><i class="fas fa-plus-square"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <style>
        .create-field{
            font-size: 1.5rem;
            font-weight: bold;
        }
        input[type=text]{
            font-size: 1.2rem;
            font-weight: bold;
            padding: 2px 2px 2px 30px;
        }
        input[type=file]{
            font-size: .9rem;
            font-weight: bold;
            padding: 2px 2px 2px 30px;

        }
        .file-input{
            margin-top: 10px;
            margin-left: -20px;
        }
        .img-preview{
            height:100%;
            width: 500px;
            display: block;
        }
    </style>
@endpush

@push('script')
    <script>
        $(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                   reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                    }

                   return reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            $('#thumbnail').change(function(){
                readURL(this)
            })

            $("#tag").keydown(function(e){
                var i =0;
                if(e.keyCode==9)
                {
                    if($("#tag").val().length<=0){
                        alert("Write Something")
                    }else{
                        i++
                        $("#tagField").append(`
                            <span id="tag-${i}" class="badge badge-primary mr-2">
                                <span class="mr-1">${$("#tag").val()}</span>
                                <span id="${i}" class="btn btn-sm btn-dark text-white c-b">x</span>
                                <input type="hidden" name="tags[]" value="${$("#tag").val()}" />
                            </span>
                        `)
                        $("#tag").val("")
                        e.preventDefault();
                    }
                }
            })

            $(document).on("click",".c-b",function(){
                var value = $(this).attr("id")
                $(`#tag-${value}`).remove()
            })

        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $('select').selectpicker();
    </script>
    <script src="{{asset('assets/nicEdit/nicEdit.js')}}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            $( ".nicEdit" ).each(function( index ) {
                $(this).attr("id","nicEditor"+index);
                new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
            });
        });
    </script>
@endpush
