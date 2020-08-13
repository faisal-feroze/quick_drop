<x-dashboard-agent>

    @section('content')
        {{--  <h1 style="margin-bottom: 50px; margin-top: 50px;">Welcome Admin</h1>  --}}

        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <a href="{{route('order_to_pick')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">{{$orders_to_pick}}</div>
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Orders To Pick</div>
                                
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
                <a href="{{route('order_to_deliver')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">{{$orders_to_deliver}}</div>
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Orders to Deliver</div>     
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
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">  
                <a href="{{route('all_picked_orders')}}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">{{$orders_picked}}</div>
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Total Picked Orders</div>
                            </div>
                            {{--  <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>  --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('all_delivered_orders')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">{{$orders_delivered}}</div>
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Total Delivered Orders</div>   
                            </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('all_returned_orders')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800 col text-center">{{$orders_returned}}</div>
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-center">Total Returned Orders</div>  
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


</x-dashboard-agent>