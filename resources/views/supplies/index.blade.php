@extends('layouts.main')
@section('title', 'Supplies')
@section('content')
<div class="row">

    {{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-dashboard-tab" href="/" role="tab" aria-controls="v-pills-dashboard" aria-selected="false"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link active" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="true"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div>
    </div>

{{-- Content of the room section. --}}

    <div class="col-md-10">
        @include('includes.notifications')
        <div class="card">
               {{-- Search button for finding residents. --}}
            <div class="card-header">
                <div class="col-m-12">
                    <h3 class="float-left">Supplies</h3>

                    <form action="/search/supplies" method="GET">
                        <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search supplies">
                    </form>
            
                </div>
            </div>

            <div class="card-body" style="padding:3%;">
                <div class="row">
                    <div>
                        <div class="input-group float-left">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-primary">Category</button>
                                  <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-danger" href="/supplies">Clear</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            @foreach ($supplies as $item)
                                            <a class="dropdown-item" href="/search/supplies?s={{ $item->category }}">{{ $item->category }}</a>
                                            @endforeach
                                        </div>
                            </div>                    
                        </div> 

                        
                    </div>

                    <div class="col-md-1">
                        <div class="input-group float-left">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-primary">Brand</button>
                                  <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-danger" href="/supplies">Clear </a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            @foreach ($supplies as $item)
                                            <a class="dropdown-item" href="/search/supplies?s={{ $item->brand }}">{{ $item->brand }}</a>
                                            @endforeach
                                        </div>
                            </div>                    
                        </div>   
                             
                    </div>

                    <div class="col-md-9">
                        <a  href="#" class="add-supply btn btn-primary float-right" role="button"><i class="fas fa-plus-circle"></i>&nbspNEW ENTRY</a>
                    </div>
                        <br><br>
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Desc</th>
                                        <th>Serial Number</th>
                                        <th>Stock</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplies as $row)
                                    <tr>
                                        <td>{{ $row->category }}</td>
                                        <td>{{ $row->brand }}</td>
                                        <td>{{ $row->desc }}</td>
                                        <td>{{ $row->serialNumber }}</td>
                                        <td>{{ $row->stock }}</td>
                                        <td> 
                                            <a  href="#" class="inSupply btn btn-success float-right" role="button"><i class="fas fa-sign-in-alt"></i>&nbspIn</a>

                                                {{-- Modal for adding stock.  --}}

                                                <div id="inSupply" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="width:1320px; margin-left:-80%">

                                                            <div class="modal-header">
                                                                <h4 class="inSupply-title float-left"></h4>
                                                                <button class="close" type="button" data-dismiss="modal" >&times;</button>
                                                            </div>
                                                            <form method="POST" action="/stocks">

                                                                @csrf

                                                            <div class="modal-body">

                                                                    <div class="form-group row" >
                                                                        <label for="stock_date" class=" col-form-label text-md-right" style="margin-left:3%">Date:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_date" id="stock_date" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                                                            </div>

                                                                        <label for="stock_category" class=" col-form-label text-md-right">Category:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_category" id="stock_category" type="text" class="form-control" value="{{ $row->category }}">
                                                                        </div>     
                                                    
                                                                        <label for="stock_brand" class=" col-form-label text-md-right">Brand:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_brand" id="stock_brand" type="text" class="form-control" value="{{ $row->brand }}">
                                                                        </div>

                                                                        <label for="stock_desc" class=" col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_desc" id="stock_desc" type="text" class="form-control" value="{{ $row->desc }}">
                                                                            </div>
                                                                    </div>
                                                                        <div class="form-group row" >
                                                                            <label for="stock_serialNumber" class=" col-form-label text-md-right" style="margin-left:3%">Serial Number:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_serialNumber" id="stock_serialNumber" type="text" class="form-control" value="{{ $row->serialNumber }}">
                                                                            </div> 

                                                                            <label for="stock_qty" class=" col-form-label text-md-right">Qty:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_qty" id="stock_qty" type="number" min="1" class="form-control" value="{{ Request::query('qty') }}" required>
                                                                            </div>

                                                                            <div class="col-md-2">
                                                                                <input name="stock_action" id="stock_action" type="text" class="form-control" value="in"> 
                                                                            </div>

                                                                            <div class="col-md-2" >
                                                                                <input name="supply_id" id="supply_id" type="number" class="form-control" value="{{ $row->id }}"> 
                                                                            </div>

                                                                        </div>
                                                                    
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                                                                <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i>&nbspIN</button>    
                                                            </div>

                                                            </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>
                                            <a  href="#" class="outSupply btn btn-danger float-right " role="button"><i class="fas fa-sign-out-alt"></i> &nbspOut</a>

                                               {{-- Modal for adding stock.  --}}

                                               <div id="outSupply" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="width:1320px; margin-left:-80%">

                                                            <div class="modal-header">
                                                                <h4 class="outSupply-title float-left"></h4>
                                                                <button class="close" type="button" data-dismiss="modal" >&times;</button>
                                                            </div>
                                                            <form method="POST" action="/stocks">

                                                                @csrf

                                                            <div class="modal-body">

                                                                    <div class="form-group row" >
                                                                        <label for="stock_date" class=" col-form-label text-md-right" style="margin-left:3%">Date:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_date" id="stock_date" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                                                            </div>

                                                                        <label for="stock_category" class=" col-form-label text-md-right">Category:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_category" id="stock_category" type="text" class="form-control" value="{{ $row->category }}">
                                                                        </div>     
                                                    
                                                                        <label for="stock_brand" class=" col-form-label text-md-right">Brand:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_brand" id="stock_brand" type="text" class="form-control" value="{{ $row->brand }}">
                                                                        </div>

                                                                        <label for="stock_desc" class=" col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_desc" id="stock_desc" type="text" class="form-control" value="{{ $row->desc }}">
                                                                            </div>
                                                                    </div>
                                                                        <div class="form-group row" >
                                                                            <label for="stock_serialNumber" class=" col-form-label text-md-right" style="margin-left:3%">Serial Number:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_serialNumber" id="stock_serialNumber" type="text" class="form-control" value="{{ $row->serialNumber }}">
                                                                            </div> 

                                                                            <label for="stock_qty" class=" col-form-label text-md-right">Qty:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                                <input name="stock_qty" id="stock_qty" type="number" min="1" class="form-control" value="{{ Request::query('qty') }}" required>
                                                                            </div>

                                                                            <div class="col-md-2">
                                                                                <input name="stock_action" id="stock_action" type="text" class="form-control" value="out"> 
                                                                            </div>

                                                                            <div class="col-md-2" >
                                                                                <input name="supply_id" id="supply_id" type="number" class="form-control" value="{{ $row->id }}"> 
                                                                            </div>

                                                                        </div>
                                                                    
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                                                                <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i>&nbspOUT</button>    
                                                            </div>

                                                            </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <p class="">{{ $supplies->links() }}</p>
                </div>

                <div class="row">
                    <h3>Supply In and Out Record</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Desc</th>
                                <th>Serial Number</th>
                                <th>Qty</th>
                                <th>Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stock as $item)
                                <tr>
                                    <td>{{ $item->stock_date }}</td>
                                    <td>{{ $item->stock_category }}</td>
                                    <td>{{ $item->stock_brand }}</td>
                                    <td>{{ $item->stock_desc }}</td>
                                    <td>{{ $item->stock_stock_serialNumber }}</td>
                                    <td>{{ $item->stock_qty }}</td>
                                    <td>
                                        @if($item->stock_action == 'in')
                                        <p class="btn-success text-center">{{ $item->stock_action }}</p>
                                        @elseif($item->stock_action == 'out')
                                        <p class="btn-danger text-center">{{ $item->stock_action }}</p>
                                        @endif
                                    </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                   
                    
                </div>
                <br>
                <h3>Out of Stocks &nbsp<span class="badge badge-primary badge-pill">{{ count($outOfStocks) }}</span></h3>
                <div class="row">
                    <div class="col-md-8">
                       
                            
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Stock</th>
                                            <th>Add to Cart</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($outOfStocks as $item)
                                       <tr>
                                            <td>{{ $item->category}}</td>
                                            <td>{{ $item->brand}}</td>
                                            <td>{{ $item->stock}}</td>
                                            <td><a href=""><i class="fas fa-cart-plus fa-2x"></i></a></td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                                   
                               </table>
                     
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-thumbtack"></i>&nbsp&nbsp&nbsp&nbsp&nbspAdded to Cart
                            </div>
                            <div class="card-body">
                               <table class="table">
                                   <thead>
                                       <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Expected Amt</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
                                            <td>TV</td>
                                            <td>10</td>
                                            <td>1000</td>
                                       </tr>
                                   </tbody>
                               </table>

                               <a  href="#" class="add-supply btn btn-primary float-left " role="button"><i class="fas fa-plus-circle"></i>&nbspCREATE PURCHASE</a>
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer">
                {{-- <h3 class="text-center">Results found: </h3> --}}
            </div>
        </div>
    </div>
</div>

   {{-- Modal for editing personnel's information.  --}}

   <div id="add-supply" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="add-supply-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>
                <form method="POST" action="/supplies">

                    @csrf

                <div class="modal-body">
                    {{-- CATEGORY  --}}
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">Category:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="category" id="category" type="text" class="form-control" value="{{ old('category') }}" required>
                        </div>     
                    </div>
                    {{-- BRAND --}}
                    <div class="form-group row">
                        <label for="brand" class="col-md-4 col-form-label text-md-right">Brand:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="brand" id="brand" type="text" class="form-control" value="{{ old('brand') }}" required>
                        </div>     
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="form-group row">
                        <label for="desc" class="col-md-4 col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="desc" id="desc" type="text" class="form-control" value="{{ old('desc') }}">
                        </div>     
                    </div>
                    {{-- SERIAL NUMBER --}}
                    <div class="form-group row">
                            <label for="serialNumber" class="col-md-4 col-form-label text-md-right">Serial Number:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-6">
                                <input name="serialNumber" id="serialNumber" type="text" class="form-control" value="{{ old('serialNumber') }}" required>
                            </div>     
                        </div>
                </div>
                  
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspADD</button>    
                </div>

                </form> 
            </div>
        </div>
    </div>

@endsection


