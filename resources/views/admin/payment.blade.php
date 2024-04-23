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
    試験申込受付
@endsection
@section('main-content')
<link rel="stylesheet" href="{{asset('admin/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/libs/css/style.css')}}">

    <div class="row">
    <!-- ============================================================== -->
    <!-- data table rowgroup  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">決済状態 </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>番号</th>
                                <th>試験名</th>
                                <th>ユーザー名</th>
                                <th>決済金額</th>
                                <th>申請日</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;   
                        @endphp

                            @foreach($user2payments as $user2payment)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$user2payment->test_id}}</td>
                                <td>{{$user2payment->user_id}}</td>
                                <td>{{$user2payment->price}}</td>
                                <td>{{$user2payment->test_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>番号</th>
                                <th>試験名</th>
                                <th>ユーザー名</th>
                                <th>決済金額</th>
                                <th>申請日</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
                    <!-- ============================================================== -->
                    <!-- end data table rowgroup  -->
                    <!-- ============================================================== -->
                </div>
    <script src="{{asset('admin/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/js/data-table.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('admin/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('admin/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('admin/libs/js/main-js.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
@endsection
