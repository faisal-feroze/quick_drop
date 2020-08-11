<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Delivered Orders</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Delivered Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Company Name</th>
                  <th>Order Date</th>
                  <th>Pickup Info</th>
                  <th>Parcel Info</th>
                  <th>Customer Info</th>
                  <th>Total Price</th>
                  <th>Parcel Status</th>
                  <th>Delivery Date</th>
                  <th>Code</th>
                  <th>Delivery Agent</th>
                  <th>Updated At</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Company Name</th>
                  <th>Order Date</th>
                  <th>Pickup Info</th>
                  <th>Parcel Info</th>
                  <th>Customer Info</th>
                  <th>Total Price</th>
                  <th>Parcel Status</th>
                  <th>Delivery Date</th>
                  <th>Code</th>
                  <th>Delivery Agent</th>
                  <th>Updated At</th>
                </tr>
              </tfoot>
              <tbody>
  
                @foreach($orders as $order)
              
                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$order::find($order->id)->user->name}}</td>
                      <td>{{$order->created_at}}</td>
                      <td>{{ Carbon\Carbon::parse($order->pick_up_date)->format('Y-m-d') }}, <br> {{$order->pick_up_address}}</td>
                      <td>{{$order->product_des}}, <br> Quantity: {{$order->quantity}}</td>
                      <td>Name: {{$order->customer_name}} <br> Address: {{$order->customer_address}}</td>
                      <td>{{$order->amount}}</td>
                      <td>{{$order->status}}</td>
                      <td>{{$order->delivery_date}}, <br> {{$order->preferred_delivery_time}}</td>
                      <td>{{$order->order_code}}</td>
                      <td>{{ App\User::find($order->delivery_agent_id)->pluck('name')->first() }}</td>
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