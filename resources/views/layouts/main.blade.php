<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- fontawesome --}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>
    @include('includes.topbar')
    <br>
    <div id="app">  
       <div class="container-fluid">
            @yield('content')  
       </div>
    </div> 

    {{-- Script links essential for UI enhancement. --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    
    

    <script type="text/javascript">

        //  Modal for creating a room.

        $(document).on('click','.create-room', function(){
            $('#create-room').modal('show');
            $('.create-room-form').show();
            $('.create-room-title').text('Create Room');
        });

        // Modal for editing a room.

        $(document).on('click','.edit-room', function(){
            $('#edit-room').modal('show');
            $('.edit-room-form').show();
            $('.edit-room-title').text('Edit Room');
        });

        // Modal for adding a resident.

        $(document).on('click','.add-resident', function(){
            $('#add-resident').modal('show');
            $('.add-resident-form').show();
            $('.add-resident-title').text('Add Resident');
        });

         // Delete confirmation dialog

        $("#FormDeleteTime").submit(function (event) {
            var x = confirm("Are you sure you want to delete?");
                if (x) {
                    return true;
                }
                else {
                    event.preventDefault();
                    return false;
                }
        });
    </script>
</body>
</html>


