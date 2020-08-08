<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">MEMO NO: {{$memo}}</h1>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">MEMO NO: {{$memo}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
        
                <table class="table table-bordered">
                    <tr>
                        <th colspan="1">Date of Deposit</th>
                        <th colspan="6">{{$created_at}}</th>
                    </tr>
                    <tr>
                        <th>Company Name</th>
                        <th>Pick up Date</th>
                        <th>Code No.</th>
                        <th>Customer</th>
                        <th>Parcel & Amount</th>
                        <th>Service Charge</th>
                        <th>Net Amount</th>
                    </tr>
                    <tr>
                        <td rowspan="10">{{$company_name}}</td>
                    </tr>
                    @php
                    $sub_total = 0;
                    @endphp
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ App\Order::where('id',$invoice->order_id)->pluck('pick_up_date')->first() }}</td> 
                            <td>{{ App\Order::where('id',$invoice->order_id)->pluck('order_code')->first() }}</td>
                            <td>
                                Name: {{ App\Order::where('id',$invoice->order_id)->pluck('customer_name')->first() }} <br> 
                                Address: {{ App\Order::where('id',$invoice->order_id)->pluck('customer_address')->first() }}
                            </td>
                            <td>
                                Total price: {{$invoice->total_amount}}  <br>
                                Total quantity: {{ App\Order::where('id',$invoice->order_id)->pluck('quantity')->first() }} <br>
                                Parcel Status: {{ App\Order::where('id',$invoice->order_id)->pluck('status')->first() }}
                            </td>
                            <td>{{$invoice->service_charge}} </td>
                            <td>{{$invoice->net_amount}} </td>
                            <?php 
                                $sub_total = $sub_total + ($invoice->net_amount);
                                $count++;                  
                            ?>
                        </tr>  
                    @endforeach     

                    <tr>
                        <td colspan="3">Total Order: {{$count}}</td>
                        <td>Sub Total</td>
                        <td></td>
                        <td>{{$sub_total}} BDT</td>
                    </tr>


                    @foreach($invoices as $invoice)

                            <tr>
                                <td colspan="3">Order Group for this Service Charge:{{App\Order::where('id',$invoice->order_id)->pluck('order_code')->first()}}</td>
                                <td>Cash Handling Charge (1% applicable)</td>
                                <td></td>
                                <td>-{{$invoice->cod}}</td>
                            </tr>

                            @php
                                //$i++;
                                $user_id = App\Order::where('id',$invoice->order_id)->pluck('user_id')->first();
                                $total_to_pay = $invoice->total_to_pay;
                                $remarks = $invoice->remarks;
                                $home_cash_charge = $invoice->home_cash_charge;
                            @endphp

                        @endforeach
                    
                        @if(App\User::where('id',$user_id)->pluck('payment_method')->first()=='Hand Cash (Home)')

                            <tr>
                                <td colspan="3"></td>
                                <td>Hand Cash (Home) Charge 1% of total amount {{$total_to_pay + $home_cash_charge}}</td>
                                <td></td>
                                <td>- {{$home_cash_charge}}</td>
                            </tr>

                        @endif


                    <tr>
                        <td colspan="3">
                            Payment Method: {{App\User::where('id',$user_id)->pluck('payment_method')->first()}} <br>
                            Payment Details: {{App\User::where('id',$user_id)->pluck('payment_details')->first()}} <br>
                            Remarks / Tnx Id: {{$remarks}} 
                        </td>
                        <td>Total Paid</td>
                        <td></td>
                        <td>{{$total_to_pay}} BDT</td>
                    </tr>
                </table>

                <button type="" class="btn btn-success">Print Bills</button>
                
            </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>