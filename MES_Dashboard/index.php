<?php
session_start();

  include("connect.php");
  include("function.php");
  
  if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
  }
  //$user_data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
<body>
  
  <div class="sidebar">
    <div class="logo-details">
      <i class="fa-solid fa-industry"></i>
        <div class="logo_name">MES</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <nav>
      <ul class="nav-list">
          <li>
              <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
          </li>
          <li>
            <a id="machinedatamenu">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Machine Data</span>
            </a>
            <span class="tooltip">Machine Data</span>
          </li>
        <li>
          <a id="oeemenu">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
          <span class="tooltip">Analytics</span>
        </li>
      </ul>
    </nav>
  </div>

  <div class="machine_data" id="machinedata" aria-labelledby="machinedatatab" role="tabpanel" style="display:none">
    <div class="row" id="count_display">
      <div class="col-sm-5">
        <div class="card" style="position: relative; right:5px; top:0px; border-radius: 25px; box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25); background:none;">
          <div class="card-body">
            <div class="card-title" style="height: 50px">
              <h4>Good Count</h4>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" style="position:relative; bottom: 35px; left:160px">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
              </svg>
            </div>
            <div id="Goodcount">
              
            </div>
            <div class="area-chart">
              <div class="grid"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="card" style="border-radius: 25px; box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);background:none;">
          <div class="card-body">
            <div class="card-title" style="height: 50px; ">
              <h4>Bad Count</h4>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16" style="position:relative; bottom: 35px; left:140px">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
              </svg>
            </div>
            <div id="Badcount">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Chart-->
    <div class="row">
      <div class="card" style="position: relative; left:150px; top:50px; width:800px; height: 450px; border-radius: 25px; box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);background:none;">
        <div class="card-body">
          <figure class="highcharts-figure">
            <div id="container"></div>
          </figure>
        </div>
      </div>
    <!--Machine Activity Log-->
      <div class="card" style="position: relative; top: 50px; left: 200px; width: 400px; border-radius: 25px; box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25); background:none;">
        <div class="card-header">
          <h4>Machine's Activity Log</h4>
        </div>
        <div class="card-body">
            <div data-simplebar="" style="max-height:330px">
              <div class="timeline-alt pb-0">
                  <div class="timeline-item">
                      <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                      <div class="timeline-item-info">
                        <a href="#" class="text-info fw-bold mb-1 d-block">Machine Status</a>
                        <small> Machine running normally</small>
                        <p class="mb-0 pb-2">
                          <small class="text-muted">5 minutes ago</small>
                        </p>
                      </div>
                  </div>
  
                  <div class="timeline-item">
                    <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                      <div class="timeline-item-info">
                          <a href="#" class="text-primary fw-bold mb-1 d-block">Machine Status</a>
                          <small>Machine running normally
                          </small>
                          <p class="mb-0 pb-2">
                              <small class="text-muted">30 minutes ago</small>
                          </p>
                      </div>
                  </div>
  
                  <div class="timeline-item">
                      <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                      <div class="timeline-item-info">
                          <a href="#" class="text-info fw-bold mb-1 d-block">Machine Status</a>
                          <small>Machine running normally
                          </small>
                          <p class="mb-0 pb-2">
                              <small class="text-muted">2 hours ago</small>
                          </p>
                      </div>
                  </div>
                  <div class="timeline-item">
                      <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                      <div class="timeline-item-info">
                          <a href="#" class="text-primary fw-bold mb-1 d-block">Machine Status</a>
                          <small>Machine running normally
                          </small>
                          <p class="mb-0 pb-2">
                              <small class="text-muted">14 hours ago</small>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  </div>
  <div class="oee_data" id="oeedata" aria-labelledby="oeedatatab" role="tabpanel" style="display: none">
    <div class="container" style="border: 6px solid #000000; width: 200px; height: 200px">

    </div>
  </div>
  <script src="./src/js/sidebar.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      
      displayGoodCount();
      setInterval(displayGoodCount,1000);
      displayBadCount();
      setInterval(displayBadCount,1000);
  
    })

  </script>
</body>
</html>
