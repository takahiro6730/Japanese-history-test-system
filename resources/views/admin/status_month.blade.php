@extends('admin.admin_layouts.admin_main')
@section('page-title')
    試験申込受付
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    試験予約管理
@endsection
@section('sub-root2')
    決済統計
@endsection
@section('main-content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">決済統計</h5>
                <div class="card-body">
                    <div class="card-body border-top d-flex justify-content-center">
                        <h5>月に行く</h5>
                        <div class="form-group  mx-3">
                            <div class="input-group date" id="datetimepicker11" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker11" id="date_month">
                                <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="morris_totalrevenue"></div>
                </div>
                <div class="card-footer">
                    <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block" id='dis_price'>{{$dis_price}}
                    ￥</span></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('admin/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('admin/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('admin/vendor/charts/morris-bundle/morris.js')}}"></script>
    <script src="{{asset('admin/vendor/datepicker/datepicker.js')}}"></script>
    <script src="{{asset('admin/vendor/datepicker/moment.js')}}"></script>
    <script src="{{asset('admin/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>

    <script>
        Morris.Area({
            element: 'morris_totalrevenue',
            behaveLikeLine: true,
            data: [
                @foreach ($totals as $key=>$price)
                    { x: "{{ $key }}", y: {{$price}}, } , 
                @endforeach
            ],
            xkey: 'x',
            ykey: 'y',
            xkeys: ['x'],
            ykeys: ['y'],
            labels: ['￥'],
            lineColors: ['#5969ff'],
            resize: true
        });
    </script>
    <script>

        $(document).ready(function(){
            $("#date_month").focusout(function(){
                $("#morris_totalrevenue").html('');
                point_date = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: "{{route('status.month_chart')}}" + '?point_date=' + point_date,
                    success: function (pdata, status) {

                    $('#dis_price').html(pdata.dis_price + '￥');

                        Morris.Area({
                            element: 'morris_totalrevenue',
                            behaveLikeLine: true,
                            data: pdata.p_points,
                            xkey: 'x',
                            ykey: 'y',
                            xkeys: ['x'],
                            ykeys: ['y'],
                            labels: ['￥'],
                            lineColors: ['#5969ff'],
                            resize: true
                        });
                    }           
                });
            });
        });
    </script>
    
@endsection
