<?php
// error_reporting (E_ALL ^ E_NOTICE); 
    session_start();
    if ( $_SESSION['USER_NAME']==true)
    {
      $user_id=$_SESSION['USER_ID'];
      $username=$_SESSION['USER_NAME'];
      $userimage=$_SESSION['USER_IMAGE'];
    }
    else
    {
      header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - KasperSky</title>
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/1f2f8fd2edba93f1e30f0852d0284b6c.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- google chart script -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      11400],
          ['2005',  1170,      422260],
          ['2006',  660,       115520],
          ['2007',  1030,      10000],
          ['2004',  1000,      1000000],
          ['2005',  1170,      132222],
          ['2006',  660,       1222120],
          ['2007',  1030,      544440]
          
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

       function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Visitations', { role: 'style' } ],
        ['2010', 10, 'color: gray'],
        ['2020', 14, 'color: #76A7FA'],
        ['2030', 16, 'opacity: 0.2'],
        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_values'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

       function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Visitations', { role: 'style' } ],
        ['2010', 10, 'color: gray'],
        ['2020', 14, 'color: #76A7FA'],
        ['2030', 16, 'opacity: 0.2'],
        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_values1'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Country');
        data.addColumn('number', 'Traffic');
        data.addColumn('boolean', 'Full Time Employee');
        data.addRows([
          ['Mike',  {v: 10000, f: '$10,000'}, true],
          ['Jim',   {v:8000,   f: '$8,000'},  false],
          ['Alice', {v: 12500, f: '$12,500'}, true],
          ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>
    </head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><img src="./assets/img/article/kaspersky.png" width="60px" height="60px" alt=""></div>
                    <div class="sidebar-brand-text mx-3"><span>KasperSky</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light dropdown dropright" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="category.php"><i class="fas fa-th-list"></i><span>Category</span></a></li>
                    <li class="nav-item dropdown"  data-toggle="dropdown" role="presentation"><a class="nav-link" href="blog.php"><i class="fas fa-edit"></i><span>Blog</span><i class="fas fa-caret-down"></i></a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fas fa-plus-circle"></i> Add Blog</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-th-list"></i> Category</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-star"></i> All Blog</a>
                      </div>
                    </li>
                    <li class="nav-item"  data-toggle="dropdown" role="presentation"><a class="nav-link" href="blog.php"><i class="fa fa-shopping-basket"></i><span>Shop</span><i class="fas fa-caret-down"></i></a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fas fa-plus-circle"></i> Add Blog</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-th-list"></i> Category</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-star"></i> All Blog</a>
                      </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i><span>Query</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="comment.php"><i class="fas fa-comment"></i><span>Comments</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Admin</span></a></li> -->
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>