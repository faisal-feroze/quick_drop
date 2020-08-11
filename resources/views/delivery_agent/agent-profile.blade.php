<x-dashboard-agent>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Profile</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->
    <div>

        <form action="{{ route('agents_update',$agent->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="" value="{{$agent->name}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                  <input type="text" name="phone" class="form-control" id="" value="{{$agent->phone}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Secondary Mobile</label>
                <div class="col-sm-10">
                  <input type="text" name="secondary_phone" class="form-control" id="" value="{{$agent->secondary_phone}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">NID</label>
                <div class="col-sm-10">
                  <input type="text" name="nid" class="form-control" id="" value="{{$agent->nid}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Addess</label>
                <div class="col-sm-10">
                    <textarea name="address" class="form-control" id="" cols="12" rows="5" required>{{$agent->address}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="" value="{{$agent->email}}">
                </div>
            </div>

            {{--  <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Change Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="" value="">
                </div>
            </div>  --}}

            {{--  <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Reference</label>
                <div class="col-sm-10">
                  <input type="text" name="reference" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">NID</label>
                <div class="col-sm-10">
                  <input type="text" name="NID" class="form-control" id="" value="">
                </div>
            </div>  --}}

            {{--  <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status" required>
                        <option selected>Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div> 
            </div>  --}}

            <div class="form-group row">
                <div class="col-sm-12 text-right">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </div>


        </form>
      
      

    </div>
    @endsection
</x-dashboard-agent>