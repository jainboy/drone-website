// drop down menu in sidebar
$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
// google chart script 
        
          // google.charts.load('current', {'packages':['corechart']});
          // google.charts.setOnLoadCallback(drawChart);
    
          // function drawChart() {
          //   var data = google.visualization.arrayToDataTable([
          //     ['Year', 'Sales', 'Expenses'],
          //     ['2004',  1000,      11400],
          //     ['2005',  1170,      422260],
          //     ['2006',  660,       115520],
          //     ['2007',  1030,      10000],
          //     ['2004',  1000,      1000000],
          //     ['2005',  1170,      132222],
          //     ['2006',  660,       1222120],
          //     ['2007',  1030,      544440]
              
          //   ]);
    
          //   var options = {
          //     title: 'Company Performance',
          //     curveType: 'function',
          //     legend: { position: 'bottom' }
          //   };
    
          //   var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    
          //   chart.draw(data, options);
          // }

          // google.charts.load("current", {packages:["corechart"]});
          // google.charts.setOnLoadCallback(drawChart);
          // function drawChart() {
          //   var data = google.visualization.arrayToDataTable([
          //     ['Task', 'Hours per Day'],
          //     ['Work',     11],
          //     ['Eat',      2],
          //     ['Commute',  2],
          //     ['Watch TV', 2],
          //     ['Sleep',    7]
          //   ]);
    
          //   var options = {
          //     title: 'My Daily Activities',
          //     pieHole: 0.4,
          //   };
    
          //   var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
          //   chart.draw(data, options);
          // }

          // google.charts.load('current', {
          //   'packages':['geochart'],
          //   // Note: you will need to get a mapsApiKey for your project.
          //   // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
          //   'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
          // });
          // google.charts.setOnLoadCallback(drawRegionsMap);
    
          // function drawRegionsMap() {
          //   var data = google.visualization.arrayToDataTable([
          //     ['Country', 'Popularity'],
          //     ['Germany', 200],
          //     ['United States', 300],
          //     ['Brazil', 400],
          //     ['Canada', 500],
          //     ['France', 600],
          //     ['RU', 700]
          //   ]);
    
          //   var options = {};
    
          //   var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
    
          //   chart.draw(data, options);
          // }

          // google.charts.load('current', {'packages':['bar']});
          // google.charts.setOnLoadCallback(drawChart);
    
          //  function drawChart() {
          // var data = google.visualization.arrayToDataTable([
          //   ['Year', 'Visitations', { role: 'style' } ],
          //   ['2010', 10, 'color: gray'],
          //   ['2020', 14, 'color: #76A7FA'],
          //   ['2030', 16, 'opacity: 0.2'],
          //   ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
          //   ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
          // ]);
    
          //   var options = {
          //     chart: {
          //       title: 'Company Performance',
          //       subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          //     },
          //     bars: 'horizontal' // Required for Material Bar Charts.
          //   };
    
          //   var chart = new google.charts.Bar(document.getElementById('barchart_values'));
    
          //   chart.draw(data, google.charts.Bar.convertOptions(options));
          // }

          // google.charts.load('current', {'packages':['bar']});
          // google.charts.setOnLoadCallback(drawChart);
    
          //  function drawChart() {
          // var data = google.visualization.arrayToDataTable([
          //   ['Year', 'Visitations', { role: 'style' } ],
          //   ['2010', 10, 'color: gray'],
          //   ['2020', 14, 'color: #76A7FA'],
          //   ['2030', 16, 'opacity: 0.2'],
          //   ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
          //   ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
          // ]);
    
          //   var options = {
          //     chart: {
          //       title: 'Company Performance',
          //       subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          //     },
          //     bars: 'horizontal' // Required for Material Bar Charts.
          //   };
    
          //   var chart = new google.charts.Bar(document.getElementById('barchart_values1'));
    
          //   chart.draw(data, google.charts.Bar.convertOptions(options));
          // }
 
          // google.charts.load('current', {'packages':['table']});
          // google.charts.setOnLoadCallback(drawTable);
    
          // function drawTable() {
          //   var data = new google.visualization.DataTable();
          //   data.addColumn('string', 'Country');
          //   data.addColumn('number', 'Traffic');
          //   data.addColumn('boolean', 'Full Time Employee');
          //   data.addRows([
          //     ['Mike',  {v: 10000, f: '$10,000'}, true],
          //     ['Jim',   {v:8000,   f: '$8,000'},  false],
          //     ['Alice', {v: 12500, f: '$12,500'}, true],
          //     ['Bob',   {v: 7000,  f: '$7,000'},  true]
          //   ]);
    
          //   var table = new google.visualization.Table(document.getElementById('table_div'));
    
          //   table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
          // }
