@extends('layouts.master')
@section('css')

@section('title')
    نظام RMB الادارة طلبات الصيانة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
<div class="col-sm-6" >
  <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">لوحة تحكم مدير النظام</h4>
</div>
@endsection
@section('PageTitle2')
    لوحة تحكم
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
 <!--=================================
wrapper -->
  <!-- widgets -->
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-danger">
                <i class="fa fa-h-square highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">أجهزة طبية</p>
              <h4>{{ \App\Models\Device\Device::query()->where('deviceTypes', 1)->count()}} </h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower growth
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-warning">
                <i class="fa fa-desktop highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">أجهزة تكنولوجيا المعلومات</p>
              <h4>{{ \App\Models\Device\Device::query()->where('deviceTypes', 2)->count()}}</h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-success">
                <i class="fa  fa-history highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">طلبات صيانة الاجهزة الطبية</p>
              <h4>{{ \App\Models\Maintenance\MaintenanceRequest::query()->where('deviceTypes', 1)->count()}}</h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week 
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <span class="text-primary">
                <i class="fa fa-history highlight-icon" aria-hidden="true"></i>
              </span>
            </div>
            <div class="float-right text-right">
              <p class="card-text text-dark">طلبات صيانة تكنولوجيا المعلومات</p>
              <h4>{{ \App\Models\Maintenance\MaintenanceRequest::query()->where('deviceTypes', 2)->count()}}</h4>
            </div>
          </div>
          <p class="text-muted pt-3 mb-0 mt-2 border-top">
            <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
          </p>
        </div>
      </div>
    </div>
  </div>
  ///
  {{-- <canvas id="myChart" width="290" height="290"></canvas> --}}

  <div class="row">
    <div class="col-12 mb-30 ">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="row">
                  ////

                    <div class="card-body">
                      <h5 class="card-title">أحصائيات شهرية للتذاكر</h5>
                      <div class="row d-flex align-items-center">
                        <div class="col-sm-4">
                          <span class="round-chart" data-percent="77" data-width="5" data-color="#84ba3f"> 
                            <span class="percent" style="width: 160px; height: 160px; line-height: 160px;">77</span>
                          <canvas height="160" width="160"></canvas></span>
                        </div>
                        <div class="col-sm-4">
                          <h2 class="theme-color font-weight-bold">70.45 GB</h2>
                          <small>Current Plan</small>
                          <h5 class="mt-2 text-dark">263 GB Per Month</h5></div>
                      </div>
                      <p><strong>Note:</strong> You can upgrade your existing Premium Plan to a plan with more features, or a longer subscription period.</p>
                    </div>
                  ///
                  
                    <div class="col-xl-4">
                        <h5 class="card-title">نسبة التذاكر المغلقة لكل شهر</h5>
                        <canvas id="myChart" width="700" height="400"></canvas>
                      </div>

                      <div class="col-xl-4">
                        <h5 class="card-title">أحصائيات شهرية</h5>
                        <canvas id="myChart2" width="700" height="400"></canvas>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
  ///

  <!-- Orders Status widgets-->
<div class="calendar-main mb-30">
<div class="row">
  <div class="col-lg-3">
    <div class="row">
        <div class="col-12 sm-mb-30">
            <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-block m-t-20">
                    <i class="fa fa-plus pr-2"></i> Create New
                </a>
            <div id="external-events" class="m-t-20">
                <br>
                <p class="text-muted">Drag and drop your event or click in the calendar</p>
                <div class="external-event bg-success fc-event">
                    <i class="fa fa-circle mr-2 vertical-middle"></i>New Theme Release
                </div>
                <div class="external-event bg-info fc-event">
                    <i class="fa fa-circle mr-2 vertical-middle"></i>My Event
                </div>
                <div class="external-event bg-warning fc-event">
                    <i class="fa fa-circle mr-2 vertical-middle"></i>Meet manager
                </div>
                <div class="external-event bg-danger fc-event">
                    <i class="fa fa-circle mr-2 vertical-middle"></i>Create New theme
                </div>
            </div>
        </div>
    </div>
</div>
  <div class="col-lg-9">
      <div id="calendar"></div>
       <div class="modal" tabindex="-1" role="dialog" id="event-modal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add New Event</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body p-20"></div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success save-event">Create event</button>
                      <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Delete</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- Modal Add Category -->
      <div class="modal" tabindex="-1" role="dialog" id="add-category">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add a category</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body p-20">
                      <form>
                          <div class="row">
                              <div class="col-md-6">
                                  <label class="control-label">Category Name</label>
                                  <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                              </div>
                              <div class="col-md-6">
                                  <label class="control-label">Choose Category Color</label>
                                  <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                      <option value="success">Success</option>
                                      <option value="danger">Danger</option>
                                      <option value="info">Info</option>
                                      <option value="primary">Primary</option>
                                      <option value="warning">Warning</option>
                                  </select>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success save-category" data-dismiss="modal">Save</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<!--=================================
wrapper -->
<!-- row closed -->
@endsection
@section('js')
  <!-- charts morris -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  


  <script>
    var qq = '{!!json_encode( array_values($aaa)) !!}'
    var manths = $.parseJSON(qq);

    // console.log(qq);
    const ctx = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'نسبة التذاكر الشهرية ',
                data: manths,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>



<script>
  var xx = '{!!json_encode( array_values($ttt)) !!}'
  var manths3 = $.parseJSON(xx);

  // console.log(qq);
  const ctxx= document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctxx, {
      type: 'bar',
      data: {
          labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
          datasets: [{
              label: 'نسبة التذاكر المغلقة  ',
              data: manths3,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>


@endsection
