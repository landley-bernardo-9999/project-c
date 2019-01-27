<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- Messaging App --}}
         @auth
            <meta name="userID" content="{{ auth()->user()->id }}">
        @endauth
        
        <title>@yield('title')</title>
        
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
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
       

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

// Modal for editing a resident.

$(document).on('click','.edit-resident', function(){
 $('#edit-resident').modal('show');
 $('.edit-resident-form').show();
 $('.edit-resident-title').text('Edit Resident');
});

// Modal for adding a resident's transaction.

$(document).on('click','.add-transaction', function(){
 $('#add-transaction').modal('show');
 $('.add-transaction-form').show();
 $('.add-transaction-title').text('Add Transaction');
});

// Modal for adding a repair for a room.

$(document).on('click','.add-repair', function(){
 $('#add-repair').modal('show');
 $('.add-repair-form').show();
 $('.add-repair-title').text('Add Repair');
});

// Modal for editing a repair for a room.

$(document).on('click','.edit-repair', function(){
 $('#edit-repair').modal('show');
 $('.edit-repair-form').show();
 $('.edit-repair-title').text('Edit Repair');
});

// Modal for creating an owner for a room.

$(document).on('click','.add-owner', function(){
 $('#add-owner').modal('show');
 $('.add-owner-form').show();
 $('.add-owner-title').text('Add Owner');
});

// Modal for creating an owner for a room.

$(document).on('click','.edit-owner', function(){
 $('#edit-owner').modal('show');
 $('.edit-owner-form').show();
 $('.edit-owner-title').text('Edit Owner');
});

// Modal for adding a violation of resident.

$(document).on('click','.add-violation', function(){
 $('#add-violation').modal('show');
 $('.add-violation-form').show();
 $('.add-violation-title').text('Add Violation');
});

// Modal for editing a violation of resident.

$(document).on('click','.edit-violation', function(){
 $('#edit-violation').modal('show');
 $('.edit-violation-form').show();
 $('.edit-violation-title').text('Edit Violation');
});

// Modal for adding a personnel.

$(document).on('click','.add-personnel', function(){
 $('#add-personnel').modal('show');
 $('.add-personnel-form').show();
 $('.add-personnel-title').text('Add Personnel');
});

// Modal for editing personnel's information.

$(document).on('click','.edit-personnel', function(){
 $('#edit-personnel').modal('show');
 $('.edit-personnel-form').show();
 $('.edit-personnel-title').text('Edit Personnel');
});

// Modal for editing personnel's information.

$(document).on('click','.add-supply', function(){
 $('#add-supply').modal('show');
 $('.add-supply-form').show();
 $('.add-supply-title').text('New Entry');
});

// Modal for in of supplies.

$(document).on('click','.inSupply', function(){
 $('#inSupply').modal('show');
 $('.inSupply-form').show();
 $('.inSupply-title').text('In Supply');
});

// Modal for out of supplies.

$(document).on('click','.outSupply', function(){
 $('#outSupply').modal('show');
 $('.outSupply-form').show();
 $('.outSupply-title').text('Out Supply');
});

// show resident contract information.

$(document).on('click','.add-inventory', function(){
 $('#add-inventory').modal('show');
 $('.add-inventory-form').show();
 $('.add-inventory-title').text('Inventory');
});

// modal for moving out resident.

$(document).on('click', '.move-out-resident', function(){
 $('#move-out-resident').modal('show');
 $('.move-out-resident-form').show();
 $('.move-out-resident-title').text('Move Out');
});

// modal for renewing contract.

$(document).on('click', '.renew-contract-resident', function(){
 $('#renew-contract-resident').modal('show');
 $('.renew-contrat-resident-form').show();
 $('.renew-contract-resident-title').text('Contract Renewal');
});
    </script>
</body>
</html>



    
