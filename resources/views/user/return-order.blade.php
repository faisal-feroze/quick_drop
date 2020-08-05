<x-dashboard-user>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Returned Orders</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Returned Orders</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Order Date</th>
                <th>Customer Info</th>
                <th>Admin Note</th>
                <th>Parcel Info</th>
                <th>Total Price</th>
                <th>Parcel Status</th>
                <th>Cash Memo</th>
                <th>Code</th>
                <th>Updated At</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>SL</th>
                <th>Order Date</th>
                <th>Customer Info</th>
                <th>Admin Note</th>
                <th>Parcel Info</th>
                <th>Total Price</th>
                <th>Parcel Status</th>
                <th>Cash Memo</th>
                <th>Code</th>
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
                    <td>{{$order->created_at->diffForHumans()}}</td>
                    <td>Name: {{$order->customer_name}} <br> Address: {{$order->customer_address}} </td>
                    <td>{{$order->customer_note}}</td>
                    <td>{{$order->product_des}}, <br> Quantity: {{$order->quantity}}</td>
                    <td>{{$order->amount}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                      @if($memo)
                        <a href="{{route('show.invoice',['memo'=> $memo])}}">{{$memo}}</a>
                      @endif
                    </td>
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
</x-dashboard-user>