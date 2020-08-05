<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Returned Orders</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Returned Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Company Name</th>
                  <th>Order Date</th>
                  <th>Pickup Date</th>
                  <th>Customer Info</th>  
                  <th>Parcel Info</th>   
                  <th>Total Price</th>
                  <th>Parcel Status</th>
                  <th>Code</th>
                  <th>Delivery Agent</th>
                  <th>Collection Date</th>
                  <th>Returned At</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Company Name</th>
                    <th>Order Date</th>
                    <th>Pickup Date</th>
                    <th>Customer Info</th>     
                    <th>Parcel Info</th>
                    <th>Total Price</th>
                    <th>Parcel Status</th>
                    <th>Code</th>
                    <th>Delivery Agent</th>
                    <th>Collection Date</th>
                    <th>Returned At</th>
                </tr>
              </tfoot>
              <tbody>
  
                @foreach($orders as $order)
              
                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$order::find($order->id)->user->name}}</td>
                      <td>{{$order->created_at->diffForHumans()}}</td>
                      <td>{{ Carbon\Carbon::parse($order->pick_up_date)->format('Y-m-d') }} <br> Pickup adress: {{$order->pick_up_address}}</td>
                      <td>{{$order->customer_name}}, <br> {{$order->customer_address}}</td>    
                      <td>{{$order->product_des}}, <br> Quantity: {{$order->quantity}}</td>            
                      <td>{{$order->amount}}</td>
                      <td>{{$order->status}}</td>
                      <td>{{$order->order_code}}</td>
                      <td>
                        @if($order->delivery_agent_id)
                          {{ App\Agent::find($order->delivery_agent_id)->name }}
                        @endif
                      </td>
                      <td></td>
                      <td>{{$order->updated_at->diffForHumans()}}</td>
  
                  </tr>
                @endforeach
                      
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>