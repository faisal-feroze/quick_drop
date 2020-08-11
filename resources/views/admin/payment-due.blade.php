<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Due Orders</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Due Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Company Name</th>
                  <th>Total unpaid Orders</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Company Name</th>
                    <th>Total unpaid Orders</th>
                    <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
  
                @foreach($users as $user)
                @if($user->orders()->whereIn('status',['delivered','returned'])->where('bill_status','Due')->count()!=0)
                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->orders()->whereIn('status',['delivered','returned'])->where('bill_status','Due')->count()}}</td>
                      <td><a href="{{ route('pay_bill',['id'=>$user->id])}}" class="btn btn-primary">Pay Bill</a></td>
                  </tr>
                  @endif
                @endforeach
                      
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>