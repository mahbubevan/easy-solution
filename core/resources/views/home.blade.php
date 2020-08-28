@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive-sm table-responsive-md table-responsive-xl table-responsive-lg">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th width="15%" scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $blog)
                            @php
                                $key++;
                            @endphp
                            <tr scope="row">
                                <td>
                                    {{$key}}
                                </td>
                                <td>
                                    <img src="{{$blog->thumbnail_image}}" class="w-25 img-fluid rounded-circle img-thumbnail" alt="">
                                </td>
                                <td>
                                    {{$blog->title}}
                                </td>
                                <td>
                                    <span class="font-weight-bold text-{{$blog->status==\App\Blog::PUBLISHED?'success':'danger'}}">
                                        {{ $blog->status==\App\Blog::PUBLISHED?'Published':'Not Published' }}
                                    </span>
                                </td>
                                <td>
                                    <a
                                        href="{{route('user.blog.show',['slug'=>$blog->slug,'blog'=>$blog->id])}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="View Details"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a
                                        href="{{route('user.blog.edit',['slug'=>$blog->slug,'blog'=>$blog->id])}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Edit This Blog"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        href="{{route('user.blog.destroy',$blog->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Move To Trash, You Can Restore Later."
                                        class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
    <style>

    </style>
@endpush
@push('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
