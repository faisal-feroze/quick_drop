<x-dashboard-admin>

    @section('content')

    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800">Orders of Company: </h1>



    <!-- DataTales Example -->



    <div class="card shadow mb-4">

        <div class="card-header py-3">

          <h6 class="m-0 font-weight-bold text-primary">Orders of Company:  </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">



                <form action="{{ route('invoice') }}" method="POST">

                    @csrf



                    <table class="table table-bordered">

                        <tr>

                            <th colspan="1">Date of Deposit</th>

                            <th colspan="6">{{date('Y-m-d H:i:s')}}</th>

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

                            <td rowspan="30">{{$user->name}}</td>

                        </tr>



                        @php

                            $final_net_amount = 0;
                            $total = 0;

                            $sub_total = 0;

                            $total_delivery_charge = 0;

                            $total_service_charge = 0;

                            $i = 0;

                        @endphp



                        @foreach($orders as $order)

                            @php



                                $delivery_charge = $charges[$count];

                                $cod[] = ($order->amount - $charges[$count])*.01;

                                $net_amount = $order->amount - $delivery_charge;



                            @endphp



                            <tr>

                                <td>{{$order->pick_up_date}} <input type="hidden" value="{{$order->id}}" name="order_id[]"> </td>

                                <td>{{$order->order_code}}</td>

                                <td>Name: {{$order->customer_name}} <br> Address: {{$order->customer_address}} </td>

                                <td>

                                    Total price: {{$order->amount}} <input type="hidden" value="{{$order->amount}}" name="total_amount[]"> <br>

                                    Total quantity: {{$order->quantity}}  <br>

                                    Parcel Status: {{$order->status}}

                                </td>

                                <td>- {{$delivery_charge}} <input type="hidden" value="{{$delivery_charge}}" name="service_charge[]"></td>

                                {{--  <td>- {{$cod}} <input type="hidden" value="{{$cod}}" name="cod[]"></td>  --}}

                                @if($order->status == 'delivered')
                                  @php
                                    $final_net_amount = $net_amount;
                                  @endphp
                                  <td>{{$final_net_amount}} <input type="hidden" value="{{$final_net_amount}}" name="net_amount[]"></td>

                                @else
                                  @php
                                    $final_net_amount = 0;
                                  @endphp
                                  <td>0 <input type="hidden" value="0" name="net_amount[]"></td>
                                @endif
                                <?php

                                    $sub_total = $sub_total + $final_net_amount;

                                    $total_delivery_charge = $total_delivery_charge + $delivery_charge;

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



                        @foreach($orders as $order)

                            <?php



                                $cod[$i];

                                if($order->status == 'returned'){

                                    $total_service_charge = $total_service_charge + 0;

                                }

                                else{

                                    $total_service_charge = $total_service_charge + abs($cod[$i]);

                                }



                            ?>



                            <tr>

                                <td colspan="3">Order Group for this Service Charge:{{$order->order_code}}</td>

                                <td>Cash Handling Charge (1% applicable)</td>



                                @if($order->status == 'returned')

                                    <td>-0 <input type="hidden" value="0" name="cod[]"></td>

                                @else

                                    <td>- {{abs($cod[$i])}} <input type="hidden" value="{{abs($cod[$i])}}" name="cod[]"></td>

                                @endif

                                <td></td>

                            </tr>



                            @php

                                $i++;

                                $user_id = $order->user_id;

                            @endphp



                        @endforeach



                        <tr>

                            <td colspan="3"></td>

                            <td>Total Delivery Charge</td>

                            <td>{{$total_delivery_charge}}</td>

                            <td></td>

                        </tr>



                        <tr>
                            <td colspan="3"></td>
                            <td>Total Service Charge</td>
                            <td></td>
                            <td>- {{$total_service_charge}}</td>
                        </tr>

                        @if(App\User::where('id',$user_id)->pluck('payment_method')->first()=='Hand Cash (Home)')

                            <tr>
                                <td colspan="3"></td>
                                <td>Hand Cash (Home) Charge 1% of total amount {{$sub_total - $total_service_charge}}</td>
                                <td></td>
                                <td>- {{($sub_total - $total_service_charge)*.01}}</td>
                            </tr>
                            <input type="hidden" name="home_cash_charge" value="{{($sub_total - $total_service_charge)*.01}}">
                            
                        @else
                            <input type="hidden" name="home_cash_charge" value="0">

                        @endif



                        <tr>

                            <td colspan="3">

                                Payment Method: {{App\User::where('id',$user_id)->pluck('payment_method')->first()}} <br>

                                Payment Details: {{App\User::where('id',$user_id)->pluck('payment_details')->first()}}

                            </td>

                            @php
                            if(App\User::where('id',$user_id)->pluck('payment_method')->first()=='Hand Cash (Home)'){
                                $final_total_to_pay = ($sub_total - $total_service_charge) - (($sub_total - $total_service_charge)*.01);
                            }

                            else{
                                $final_total_to_pay = ($sub_total - $total_service_charge);
                            }
                                
                            @endphp

                            <td>Total to Pay</td>

                            <td></td>

                            {{--  <td>{{round($sub_total - $total_service_charge)}} BDT <input type="hidden" value="{{round($sub_total - $total_service_charge)}}" name="total_to_pay"></td>  --}}
                            <td>{{round($final_total_to_pay)}} BDT <input type="hidden" value="{{round($final_total_to_pay)}}" name="total_to_pay"></td>
                        </tr>

                    </table>

                    @if(App\User::where('id',$user_id)->pluck('payment_method')->first()=='Hand Cash (Home)')

                        @php
                            $lastInvoiceId = App\Invoice::select('id')->orderBy('id','desc')->first();
                            $lastInvoiceId=(int)substr($lastInvoiceId , 6);
                            $lastInvoiceId++;
                            $txn_no = 'Hand_Cash-'.$lastInvoiceId;
                        @endphp

                        <label for="">Remarks/Txn Id: </label> <input type="text" name="remarks" value="{{$txn_no}}" required>

                    @else
                        <label for="">Remarks/Txn Id: </label> <input type="text" name="remarks" required>
                    @endif

                
                    <button type="submit" class="btn btn-success">Pay Bills</button>

                </form>

            </div>

        </div>

      </div>



    @endsection

</x-dashboard-admin>
