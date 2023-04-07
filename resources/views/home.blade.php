@extends('layouts.layout')

@section('content')

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                    
                    @if (Auth::user()->hasRole('Admin'))
                    <div id="piechart"></div>
                    @endauth
                    <div id="piechart_3d"></div>


                    </div>
                    
                </div>
            </div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Registered User Count'],
 
                @php
                foreach($pieChartuser as $d) {
                    echo "['".$d->month_name."', ".$d->count."],";
                }
                @endphp
        ]);
 
          var options = {
            title: 'Users created',
            is3D: false,
          };
 
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
          chart.draw(data, options);
        }
      </script>
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Task Completed',     11],
          ['Pending',      2],
          
        ]);

        var options = {
          title: 'My Task assigned',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
@endsection
