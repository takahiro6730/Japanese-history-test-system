@extends('admin.admin_layouts.admin_main')
@section('page-title')
    試験選択
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    試験管理
@endsection
@section('sub-root2')
    試験選択
@endsection
@section('main-content')
<style>
    label{
        margin:auto 0!important;
    }
</style>
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="test-problem-page">
                <!-- ============================================================== -->
                <!-- accrodions style two -->
                <!-- ============================================================== -->
                <div class="problems-section px-2">
                    <div class="section-block">
                        <h5 class="section-title pl-4">試験選択</h5>
                    </div>
                    <div class="accrodion-outline hx-1000">
                        <div id="accordion2">

                            @foreach($tests as $test)
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour_{{$test->id}}" aria-expanded="false" aria-controls="collapseFour_{{$test->id}}">
                                        <span class="title-text">{{$test->name}}</span>
                                       </button>
                                    </h5>
                                </div>
                                <div id="collapseFour_{{$test->id}}" class="collapse" aria-labelledby="headingFour" data-parent="#accordion2" style="">
                                    <div class="card-body">
                                        <p class="lead">{{$test->answer_text}}</p>
                                        <p class="problem-state">
                                            レベル：{{$test->get_level_name()}}&nbsp;&nbsp;&nbsp;
                                            ジャンル：{{$test->get_ganre_name()}} &nbsp;&nbsp;&nbsp;
                                            県名：{{$test->get_province_name()}}
                                        </p>
                                        <p class="problem-state">
                                            {{$test->get_test_date()}} &nbsp;&nbsp;&nbsp; {{$test->get_begin_time()}}～{{$test->get_end_time()}}
                                        </p>
                                        <a href="{{route('admin.test.test_problem_edit', ['id'=>$test->id])}}" class="btn btn-primary">選択</a>
                                        <a href="{{route('admin.test.test_problem_del', ['id'=>$test->id])}}" class="btn btn-secondary">削除</a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end accrodions style two -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
        <script src="{{asset('admin/vendor/datepicker/moment.js')}}"></script>
        <script src="{{asset('admin/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{asset('admin/vendor/datepicker/datepicker.js')}}"></script>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->
</div>
<script>
    $(document).on('keyup', '#search_card', function () {
        // alert($('#th_check').prop('checked'));
        var filter = $(this).val();
        $("#accordion").find(".collapse").each(function () {
            var title = $(this).parent().find(".title-text").text();
            console.log($(this).parent());
            if (title.indexOf(filter) > -1) {
                $(this).parent().css('display', 'block');
            }
            else {
                $(this).parent().css('display', 'none');
            }
        });
    });
    function select_test(test_id){
        $("#sel_test_id").val(test_id);
        $("#sel_test_name").val($("#test_name_"+test_id).val());
        $("#sel_test_datetime").val($("#collapseOne_"+test_id).find('.lead').text().replaceAll(" ",""));
        $("#sel_test_state").val($("#collapseOne_"+test_id).find('.problem-state').text().replaceAll(" ",""));
    }
    function add_problem(problem_id){
        $("#collapseFour_"+problem_id);
        var new_element = $("#temp_problem").find(".card").clone();
        new_element.find(".title-text").text($("#collapseFour_"+problem_id).parent().find(".title-text").text().substring(0, 20)+"...");
        new_element.find(".collapse").attr("id", "collapseSeven_"+problem_id);
        new_element.find(".collapsed").attr('data-target', "#collapseSeven_"+problem_id);
        new_element.find(".collapsed").attr('aria-controls', "collapseSeven_"+problem_id);
        new_element.find(".problem-text").text($("#collapseFour_"+problem_id).find(".problem-state").text().replaceAll(" ", ""));
        new_element.find(".btn-secondary").attr('onclick', `del_problem(${problem_id})`);
        $("#accordion3").append(new_element);
        $("#collapseFour_"+problem_id).parent().css('display', 'none');
        $("#problem_ids").val(get_problem_ids());
    }
    function del_problem(problem_id){
        $("#collapseSeven_"+problem_id).parent().remove();
        $("#collapseFour_"+problem_id).parent().css('display', 'block');
        $("#problem_ids").val(get_problem_ids());
    }
    function get_problem_ids(){
        var porblem_elements = $("#accordion3");
        var ids_text="";
        $("#accordion3").find(".collapse").each(function(){
            ids_text += '#' + $(this).attr('id').replaceAll('collapseSeven_','');
        });
        return ids_text;
    }
</script>
<style>
    .test-problem-page{
        display: flex;
    }
    .problems-section{
        width:100%;
    }
    .selected-section{
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .test-view-section{
        width:100%;
    }
    .hx-500{
        height: 300px!important;
        overflow: hidden;
        overflow-y: auto;
    }
    .test-selected-problems{
        width: 100%
    }
    .hx-1000{
        height: 600px!important;
        overflow: hidden;
        overflow-y: auto;
    }
    #accordion3{
        display: flex;
        flex-wrap: wrap;
    }
    #accordion3 .card{
        width: 50%;
    }
    .temp-problem{
        display: none;
    }
</style>
@endsection