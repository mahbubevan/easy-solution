@extends('admin.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a
                class="btn btn-lg btn-primary float-right mb-3"
                href="javascript:void(0);"
                data-placement="top"
                data-toggle="modal"
                data-target="#addModal"
                title="Create New Category"
            >
                Add New
            </a>
            <div class="table-responsive-sm table-responsive-md table-responsive-xl table-responsive-lg">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th width="20%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            @php
                                $key++;
                            @endphp
                            <tr scope="row">
                                <td>
                                    {{$key}}
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <a
                                        href="javascript:void(0);"
                                        data-placement="top"
                                        title="Edit This Blog"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        href="javascript:void(0);"
                                        data-placement="top"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                        data-category-name="{{$category->name}}"
                                        data-category-id="{{$category->id}}"
                                        title="Move To Trash, You Can Restore Later."
                                        class="btn btn-sm btn-danger deleteBtn">
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


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.category.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group row p-3 mt-3 mb-3">
                    <label for="" class="col-12 font-weight-bold">Name</label>
                    <input type="text" class="form-control col-12" name="category" autofocus/>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-lg">Add</button>
              </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Move To Trash ??</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="{{route('admin.category.destroy')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="category" id="category">
                            <span class="h5 font-weight-bold">
                                <span class="font-weight-bold" id="category-name"></span> will be moved to trash.
                            </span>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Move To Trash</button>
                  </div>
            </form>
      </div>
    </div>
  </div>

@endsection

@push('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()


            $(".deleteBtn").click(function(){
                var name = $(this).data("category-name")
                var id = $(this).data("category-id")
                console.log(name)
                $("#category-name").text(name)
                $("#category").val(id)
            })
        })
    </script>
@endpush
