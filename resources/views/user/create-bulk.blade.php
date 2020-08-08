<x-dashboard-user> 
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Order</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <div>
        <form method="post" action="{{route('store-bulk')}}">
            @csrf

            <p class="border-bottom-primary">Pickup Information</p>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Pickup Date</label>
                <div class="col-sm-10">
                  <input type="date" name="pick_up_date" class="form-control" id="" placeholder="">
                </div>
              </div>
  
              <div class="form-group row">
                  <label for="text" class="col-sm-2 col-form-label">Pickup Address</label>
                  <div class="col-sm-10">
                    <textarea name="pick_up_address" class="form-control" id="" cols="15" rows="5">{{auth()->user()->address}}</textarea>
                  </div>
              </div>

              <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Default Mobile</label>
                <div class="col-sm-10">
                  <input type="text" name="secondary_phone" class="form-control" id="" value="{{auth()->user()->phone}}" required>
                </div>
              </div>

              <p class="border-bottom-primary">Parcel Information</p>

              <div class="order_inouts">
                <div class="bulk_input">
                    <p>customers Name/ Phone/ Address/ Cash Amount/ Pay by/ Product info/ Quantity</p>
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">
                          Line 1: customers Name <br>
                          Line 2: customers Phone <br>
                          Line 3: customers Address <br>
                          Line 4: Cash Amount <br>
                          Line 5: Pay by <br>
                          Line 6: Product info <br>
                          Line 7: Quantity <br>
                        </label>
                        <div class="col-sm-10">
                        <textarea name="all_info[]" class="form-control" id="" cols="25" rows="8" 
                        placeholder="Line 1: Customer Name &#10;Line 2: Customer Phone&#10;Line 3: Customer Address &#10;Line 4: Cash Amount &#10;Line 5: Pay by &#10;Line 6: Product Detail &#10;Line 7: Quantity"></textarea>
                        </div>

                        <label class="col-sm-2 col-form-label">Delivery Date</label>
                        <div class="col-sm-10">
                          <input type="date" name="delivery_date[]" class="form-control" id="" placeholder="">
                        </div>
                    
                        <label for="text" class="col-sm-2 col-form-label">Preferred Delivery Time</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="preferred_delivery_time[]">
                                <option selected>Select Time</option>
                                <option value="Morning">Morning</option>
                                <option value="Noon">Noon</option>
                                <option value="Afternoon">Afternoon</option>
                            </select>
                        </div> 
                     
                    </div>
                </div> 
             </div>

             
             <div class="form-group row">
                <div class="col-sm-12">
                  <a id="add_new_order" class="btn btn-success">Add New Order</a>
                </div>
              </div>
    

            <div class="form-group row">
              <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Save Order</button>
              </div>
            </div>
          </form>
    </div>

    @endsection
</x-dashboard-user>