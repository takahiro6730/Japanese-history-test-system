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
                <h5 class="mb-0">試験申込リスト </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ユーザー名</th>
                                <th>試験名</th>
                                <th>レベル</th>
                                <th>ジャンル</th>
                                <th>試験時間</th>
                                <th>申請日</th>
                                <th>予約同意</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($test2users as $test2user)

                            @foreach($test2user->reservation()->get() as $reservation)
                            <tr>
                                <td>{{$reservation->user()->first()->name}}</td>
                                <td>{{$reservation->test()->first()->name}}</td>
                                <td>{{$reservation->test()->first()->get_level_name()}}</td>
                                <td>{{$reservation->test()->first()->get_ganre_name()}}</td>
                                <td>{{$reservation->test()->first()->get_test_date()}}
                                    ：{{$reservation->test()->first()->get_begin_time()}}
                                    ～{{$reservation->test()->first()->get_end_time()}}</td>
                                <td>{{$reservation->get_reserved_ago_time()}}</td>
                                <td>
                                @if(!$reservation->test2user()->first()->allowed_id == 0)
                                    {{$reservation->get_reserve_state()}}
                                @else                                                
                                    <a href="{{route('admin.reserve.delete', ['id'=>$reservation->id])}}" class="btn btn-outline-primary mx-3">予約削除</a>
                                    <a href="{{route('admin.reserve.agree', ['id'=>$reservation->id])}}" class="btn btn-outline-primary mx-3">予約同意</a>
                                    {{-- <a href="{{route('admin.reserve.mail_send', ['id'=>$reservation->id])}}" class="btn btn-outline-dark mx-3">通知送信</a> --}}
                                @endif
                                </td>
                            </tr>
                            @endforeach

                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ユーザー名</th>
                                <th>試験名</th>
                                <th>レベル</th>
                                <th>ジャンル</th>
                                <th>試験時間</th>
                                <th>申請日</th>
                                <th>予約同意</th>
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
