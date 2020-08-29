<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('system.title')}}</title>

    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    {{-- font awesome --}}

    <script src="https://kit.fontawesome.com/bda171beb6.js" crossorigin="anonymous"></script>

    {{-- custom css --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    @stack('css')

    <script type="text/javascript" src="{{asset('assets/nicEdit/nicEdit.js')}}"></script>

</head>
<body>

    @include('partials.navtop')
    @include('partials.navbar')
    @yield('content')
    {{-- bootsrap js cdn --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- custom js --}}
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
        $(function(){
            $("#locale").change(function(){
                var value = $("#locale option:selected").val();
                // console.log(value)

                $.ajax({
                    type:'GET',
                    url:"{{route('set_locale')}}",
                    data:{
                        locale:value,
                    },
                    success:function(e){
                        if(e.success==0){
                            setTimeout(function(){
                                location.reload()
                            },50)
                        }
                    }
                })
            })




        })
    </script>

    @stack('script')
</body>
</html>
