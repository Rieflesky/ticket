<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" href="admin/src/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="admin/src/index.html" class="text-nowrap logo-img"> 
            <img src="img/Logo1.png" alt="" style="width: 150px; height: 150px; auto;">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{url('/redirect')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Admin Dashboard</span>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="img/logout1.png" alt="" width="25" height="25" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body text-center">              
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-outline-primary mx-auto mt-2 d-block">Logout</button>
                      </form>
                  </div>
              </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
        </div>
        <div class="row">
          <div class="col-lg-32 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Visitor</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Phone Number</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Ticket Serial Number</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Status</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Visited</h6>
                          </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      @csrf
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $user->id }}</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                            
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $user->phone }}</p>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">{{ $user->email }}</p>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          @foreach($user->tickets as $ticket)
                            <h6 class="fw-semibold mb-0 fs-4">{{ $ticket->serial_number }}</h6>
                            @endforeach
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $ticket->status }}</p>
                        </td>
                        <td class="border-bottom-0">
                            <a href="{{ route('changeStatus',['ticket' => $ticket->id, 'status' => 'Visited']) }}" type="submit" class="btn btn-success" style="background-color: green;" value="Visited">Yes</a>
                            <a href="{{ route('changeStatus',['ticket' => $ticket->id, 'status' => 'Unvisited']) }}" type="submit" class="btn btn-danger" style="background-color: red;" value="Unvisited">No</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          
            
        </div>
        
      </div>
    </div>
  </div>
  
  <script src="admin/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="admin/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="admin/src/assets/js/sidebarmenu.js"></script>
  <script src="admin/src/assets/js/app.min.js"></script>
  <script src="admin/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="admin/src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="admin/src/assets/js/dashboard.js"></script>
</body>

</html>
