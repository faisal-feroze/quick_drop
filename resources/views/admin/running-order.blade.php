<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Running Orders</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Running Placed Orders</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Order Date</th>
                <th>Pickup Date</th>
                <th>Delivery Date</th>
                <th>Customer Info</th>
                <th>Parcel Info</th>
                <th>Admin Note</th>
                <th>Total Price</th>
                <th>Parcel Status</th>
                <th>To be picked by</th>
                <th>picked by</th>
                <th>Code</th>
                <th>Updated At</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>SL</th>
                <th>Order Date</th>
                <th>Pickup Date</th>
                <th>Delivery Date</th>
                <th>Customer Info</th>
                <th>Parcel Info</th>
                <th>Admin Note</th>
                <th>Total Price</th>
                <th>Parcel Status</th>
                <th>To be picked by</th>
                <th>picked by</th>
                <th>Code</th>
                <th>Updated At</th>
              </tr>
            </tfoot>
            <tbody>

              @foreach($orders as $order)
            
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{ Carbon\Carbon::parse($order->pick_up_date)->format('Y-m-d') }}</td>
                    <td>{{$order->delivery_date}}</td>
                    <td>{{$order->customer_name}}, <br> {{$order->customer_address}}</td>
                    <td>{{$order->product_des}}, <br> Quantity: {{$order->quantity}}</td>
                    <td>{{$order->customer_note}}</td>
                    <td>{{$order->amount}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{App\User::where('id',$order->pickup_agent_id)->pluck('name')->first()}}</td>
                    <td>{{App\User::where('id',$order->pickup_agent_id)->pluck('name')->first()}}</td>
                    <td>{{$order->order_code}}</td>
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