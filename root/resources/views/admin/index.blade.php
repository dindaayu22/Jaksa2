@include('admin/header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="margin-group">
          <h4><i class="fa fa-pencil"></i> Aktivitas Hari Ini</h4>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$upd}}</h3>

              <p>Dokumen Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-up-a"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$opd}}</h3>

              <p>Dokumen Dibuka</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$downd}}</h3>

              <p>Dokumen Didownload</p>
            </div>
            <div class="icon">
              <i class="ion ion-arrow-down-a"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-pencil"></i> Log Aktivitas Tahun {{date('Y')}}</li>
            </ul>
            <div class="tab-content no-padding">
            
            <!-- LINE CHART -->
            <div class="box box-info">
              <div class="box-body">
                <div class="chart ">
                  <canvas id="lineChart" class="table-responsive"style="height:250px"></canvas>

                  <script>
                    $(function () {

                      var areaChartData = {
                        labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mai', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'],
                        datasets: [
                          {
                            label               : 'Download',
                            fillColor           : '#00c0ef',
                            strokeColor         : '#00c0ef',
                            pointColor          : '#00c0ef',
                            pointStrokeColor    : '#00c0ef',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#00c0ef',
                            data                : [
                                                  @foreach ($chartdown as $index =>$cdown)
                                                    {{$cdown}},
                                                  @endforeach
                            ]
                          },
                          {
                            label               : 'Upload',
                            fillColor           : '#00a65a',
                            strokeColor         : '#00a65a',
                            pointColor          : '#00a65a',
                            pointStrokeColor    : '#00a65a',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#00a65a',
                            data                : [
                                                  @foreach ($chartup as $index =>$cup)
                                                    {{$cup}},
                                                  @endforeach
                            ]
                          },
                          { label               : 'Open',
                            fillColor           : '#f39c12',
                            strokeColor         : '#f39c12',
                            pointColor          : '#f39c12',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#f39c12',
                            data                : [
                                                  @foreach ($chartop as $index =>$cop)
                                                    {{$cop}},
                                                  @endforeach
                            ]
                          }
                        ]
                      }

                      var areaChartOptions = {
                        //Boolean - If we should show the scale at all
                        showScale               : true,
                        //Boolean - Whether grid lines are shown across the chart
                        scaleShowGridLines      : false,
                        //String - Colour of the grid lines
                        scaleGridLineColor      : 'rgba(0,0,0,.05)',
                        //Number - Width of the grid lines
                        scaleGridLineWidth      : 1,
                        //Boolean - Whether to show horizontal lines (except X axis)
                        scaleShowHorizontalLines: true,
                        //Boolean - Whether to show vertical lines (except Y axis)
                        scaleShowVerticalLines  : true,
                        //Boolean - Whether the line is curved between points
                        bezierCurve             : true,
                        //Number - Tension of the bezier curve between points
                        bezierCurveTension      : 0.3,
                        //Boolean - Whether to show a dot for each point
                        pointDot                : false,
                        //Number - Radius of each point dot in pixels
                        pointDotRadius          : 4,
                        //Number - Pixel width of point dot stroke
                        pointDotStrokeWidth     : 1,
                        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                        pointHitDetectionRadius : 20,
                        //Boolean - Whether to show a stroke for datasets
                        datasetStroke           : true,
                        //Number - Pixel width of dataset stroke
                        datasetStrokeWidth      : 2,
                        //Boolean - Whether to fill the dataset with a color
                        datasetFill             : true,
                        //String - A legend template
                        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                        maintainAspectRatio     : true,
                        //Boolean - whether to make the chart responsive to window resizing
                        responsive              : true
                      }


                      //-------------
                      //- LINE CHART -
                      //--------------
                      var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
                      var lineChart                = new Chart(lineChartCanvas)
                      var lineChartOptions         = areaChartOptions
                      lineChartOptions.datasetFill = false
                      lineChart.Line(areaChartData, lineChartOptions)
                  })
                  </script>
                  
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('admin/footer')