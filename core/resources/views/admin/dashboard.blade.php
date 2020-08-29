@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-12 col-xs-12">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Users
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Blogs</a>
                    <a href="{{route('admin.category.index')}}" class="list-group-item list-group-item-action">Categories</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                  </div>
            </div>
            <div class="col-lg-9 col-xl-9 col-md-6 col-sm-12 col-xs-12">

            </div>
        </div>
    </div>
@endsection
