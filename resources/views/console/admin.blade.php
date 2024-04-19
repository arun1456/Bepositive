<html lang="en"><head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BePositive</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="cms/vendors/feather/feather.css">
  <link rel="stylesheet" href="cms/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="cms/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../cms/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../cms/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../cms/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../cms/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../cms/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../cms/css/vertical-layout-light/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- endinject -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="../cms/images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
<style type="../cms/text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="#">
            BePositive
          </a>
          <a class="navbar-brand brand-logo-mini" href="#">
            
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
            
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          
          </li>
          
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="cms/images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="cms/images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-apps"></i>
              <span class="menu-title">Dashboard</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" id="show-location" href="#">Location</a></li>
                <li class="nav-item"> <a class="nav-link" id="show-donor" href="#">Donors</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
            @include('console.dashboard')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Blood Donation Group By BePositive </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<!-- plugins:js -->
<script src="../cms/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../cms/vendors/chart.js/Chart.min.js"></script>
  <script src="../cms/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../cms/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../cms/js/off-canvas.js"></script>
  <script src="../cms/js/hoverable-collapse.js"></script>
  <script src="../cms/js/template.js"></script>
  <script src="../cms/js/settings.js"></script>
  <script src="../cms/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../cms/js/dashboard.js"></script>
  <script src="../cms/00000js/Chart.roundedBarCharts.js"></script>

  <script>
     $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  $(document).ready(function(){
    locationForm();
    locationTable();
    $("#myForm").hide();
    $("#location-form").hide();
    donorTable();
    filterForm();
    donorForm();
    $("#donor-form").hide();
    $("#dnor-Form").hide();
    $("#dash").show();
    $("#show-dnor").click(function(){
        $("#dnor-Form").toggle();
    });
    $("#show-location").click(function(){
        $("#location-form").toggle();
        $("#donor-form").hide();
        $("#dash").hide();
    });
    $("#show-donor").click(function(){
        $("#donor-form").toggle();
        $("#location-form").hide();
        $("#dash").hide();
    });
    $("#showForm").click(function(){
        $("#myForm").toggle();
    });
    function locationForm()
    {
      $.ajax({
            type: 'GET',
            url: "{{url('/locationform')}}",
            success: function (response) {
                $('.locationForm').html(response);
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.responseJSON.message;
                alert(errorMessage);
            }
        });
    }
    function locationTable()
    {
      $.ajax({
            type: 'GET',
            url: "{{url('/locationtable')}}",
            success: function (response) {
                $('.locationTable').html(response);
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.responseJSON.message;
                alert(errorMessage);
            }
        });
    }
    function donorTable()
    {
      $.ajax({
        type: 'GET',
        url: "{{url('/donortable')}}",
        success: function (response){
          $('.donor-table').html(response);
        },
        error: function (xhr, status, error){
          var errorMessage = xhr.responseJSON.message;
          alert(errorMessage);
        }
      });
    }
    function donorForm()
    {
      $.ajax({
        type: 'GET',
        url: "{{url('/donorform')}}",
        success: function (response){
          $('.donor-form').html(response);
        },
        error: function (xhr, status, error){
          var errorMessage = xhr.reponseJSON.message;
          alert(errorMessage)
        }
      });
    }
    function filterForm()
    {
      $.ajax({
        type:'GET',
        url: "{{url('/donorfilterform')}}",
        success: function (response){
          $('.filter-form').html(response);
        },
        error: function (xhr, status, error){
          var errorMessage = xhr.reponseJSON.message;
          alert(errorMessage)
        }
      })
    }
  });
  </script>


</body></html>