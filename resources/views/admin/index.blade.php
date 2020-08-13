<x-dashboard-admin>

    @section('content')
        {{--  <h1 style="margin-bottom: 50px; margin-top: 50px;">Welcome Admin</h1>  --}}

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">  
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Placed Orders</div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        <a href="{{route('all_orders')}}">
                                            {{$order_placed}}
                                            <p class="text-xs">recent placed orders</p>
                                        </a>    
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        <a href="{{route('parcel.accepted')}}">
                                            {{$order_accepted}}
                                            <p class="text-xs">accepted orders</p>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                            {{--  <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>  --}}
                            </div>
                        </div>
                    </div>
            </div>
    
            <div class="col-xl-4 col-md-6 mb-4">
                
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center"><a href="{{route('order_running')}}">Running Orders: {{$order_running}} </a></div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        <a href="{{route('parcel.accepted')}}">
                                            {{$order_accepted}}
                                            <p class="text-xs">Accepted</p>
                                        </a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        <a href="{{route('accepted')}}">
                                            {{$order_to_pick}}
                                            <p class="text-xs">To be Picked</p>
                                        </a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        <a href="{{route('parcel.picked')}}">
                                            {{$order_picked}}
                                            <p class="text-xs">Picked</p>
                                        </a>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
               
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
               
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center"> <a href="{{route('payment_due')}}">Payment Due: {{$order_due}}</a></div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        {{--  <p class="text-xs">Cash</p>  --}}
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        {{--  <p class="text-xs">Online</p>  --}}
                                    </div>
                                </div>
                                
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
             
            </div>
        
            <div class="col-xl-4 col-md-6 mb-4">
               
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1 text-center"><a href="{{route('paid_orders')}}">Cash Memo: {{$order_memo}}</a></div>
                                    <div class="row" style="margin-top: 25px;">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                            
                                            {{--  <p class="text-xs">New</p>  --}}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                            
                                            {{--  <p class="text-xs">Earlier</p>  --}}
                                        </div>
             
                                    </div>
                                    
                                </div>
                            {{--  <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>  --}}
                            </div>
                        </div>
                    </div>
               
            </div>
    
            <div class="col-xl-4 col-md-6 mb-4">
                
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center"><a href="{{route('show_user')}}">Company: {{$company}}</a></div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        {{$company_active}}
                                        <p class="text-xs">Active</p>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        {{$company_inactive}}
                                        <p class="text-xs">Inactive</p>
                                    </div>
                                </div>
                                
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
 
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
               
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center"><a href="{{route('all_agents')}}">Delivery Agent: {{$agents}}</a> </div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        {{--  <p class="text-xs">Cycle</p>  --}}
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        {{--  <p class="text-xs">Bike</p>  --}}
                                    </div>
                                </div>
                                
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <a href="#">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Revenue: </div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        <p class="text-xs">Service Charge</p>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        <p class="text-xs">COD</p>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        <p class="text-xs">Cash Return</p>
                                    </div>
                                </div>
                                
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <a href="#">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Profit and Loss: </div>
                                <div class="row" style="margin-top: 25px;">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        <p class="text-xs">All Income</p>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">
                                        
                                        <p class="text-xs">All Expense</p>
                                    </div>
                                </div>
                                
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>


        </div>
    @endsection


</x-dashboard-admin>