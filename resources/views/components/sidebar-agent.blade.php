<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
        {{--  <i class="fas fa-laugh-wink"></i>  --}}
      </div>
      <div class="sidebar-brand-text mx-3">Quick Drop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('order_to_pick')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Orders to pick</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('order_to_deliver')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Orders to Deliver</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('all_picked_orders')}}"> 
        <i class="fas fa-fw fa-chart-area"></i>
        <span>All Picked Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('all_delivered_orders')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>All Delivered Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('all_returned_orders')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>All Returned Orders</span></a>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      My profile
    </div>
  
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('agent_profile')}}"> 
        <i class="fas fa-fw fa-chart-area"></i>
        <span>My Profile</span></a>
    </li>

  </ul>