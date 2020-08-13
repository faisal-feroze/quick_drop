<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{$user->company_name}}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataCheck" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>SL</th> 
                    <th>Order Date</th>
                    <th>Pickup Date</th>
                    <th>Delivery Date</th>
                    <th>Customer Info</th>     
                    <th>Total Price</th>
                    <th>Parcel Status</th>
                    <th>Payment Status</th>
                    <th>Parcel Code</th>
                    <th>Picked By</th>
                    <th>Delivered By</th>
                    <th>Cash Memo</th>
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
                    <th>Total Price</th>
                    <th>Parcel Status</th>
                    <th>Payment Status</th>
                    <th>Parcel Code</th>
                    <th>Picked By</th>
                    <th>Delivered By</th>
                    <th>Cash Memo</th>
                    <th>Updated At</th>        
                </tr>
              </tfoot>
              <tbody>
  
                @foreach($orders as $order)
                  @php
                    $memo = App\Invoice::where('order_id','=',$order->id)->pluck('memo_no')->first();
                  @endphp
              
                  <tr>
                      <td>{{$count++}}</td>
                      {{--  <td>{{$order::find($order->id)->user->name}}</td>  --}}
                      <td>{{$order->created_at}}</td>
                      <td>{{$order->pick_up_date}}</td>
                      <td>{{$order->delivery_date}}</td>
                      <td>Name: {{$order->customer_name}} <br> Adress: {{$order->customer_address}}</td>
                      <td>{{$order->amount}}</td>
                      <td>{{$order->status}}</td>
                      <td>{{$order->bill_status}}</td>
                      <td>{{$order->order_code}}</td>
                      <td>
                          @if($order->pickup_agent_id)
                          {{ App\User::find($order->pickup_agent_id)->pluck('name')->first() }}
                          @else
                          N/A 
                          @endif
                      </td>
                      <td>
                          @if($order->delivery_agent_id)
                          {{ App\User::find($order->delivery_agent_id)->pluck('name')->first() }}
                          @else 
                          N/A 
                          @endif
                      </td>
                      <td>
                          @if($memo)
                           <a href="{{route('view.invoice',['memo'=> $memo])}}">{{$memo}}</a>
                          @else
                          N/A 
                          @endif
                      </td>
                      <td>{{$order->updated_at->diffForHumans()}}</td>
                      {{--  <td>{{ App\Invoice::select('memo_no')->where('order_id','=',$order->id)->get() }}</td>  --}}   
                  </tr>
                @endforeach
                      
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>