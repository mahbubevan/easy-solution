<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
        <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item">
                <a class="nav-link" href="#">{{__('system.contribute')}}</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">{{__('system.home')}}</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto my-2 order-0 w-75 order-md-1 position-relative">
        <form class="form-inline">
            <input class="d-inline form-control col-7 mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <a class="btn btn-md btn-success">Search</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
          </form>
    </div>
    <div class="navbar-collapse collapse w-100 dual-collapse2 order-2 order-md-2">
        <ul class="navbar-nav mr-auto text-center">
            <li class="nav-item ">
                <a class="nav-link" href="#">{{__('system.about')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{__('system.contact')}}</a>
            </li>
        </ul>
    </div>
</nav>
