@extends('admin.admin_layouts.admin_main')
@section('page-title')
    試験問題選択
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    試験管理
@endsection
@section('sub-root2')
    試験問題選択
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
            <h5 class="card-header">試験問題選択</h5>
            <div class="test-problem-page">

                <!-- ============================================================== -->
                <!-- accrodions style two -->
                <!-- ============================================================== -->
                <div class="problems-section px-2">
                    <div class="section-block">
                        <h5 class="section-title">問題選択</h5>
                    </div>
                    <div class="accrodion-outline hx-1000">
                        <div id="accordion2">

                            @foreach($problems as $problem)
                            <div class="card" style="{{$problem->selected_flag($test)}}">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                       <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour_{{$problem->id}}" aria-expanded="false" aria-controls="collapseFour_{{$problem->id}}">
                                        <span class="title-text">{{$problem->answer_text}}</span>
                                       </button>
                                    </h5>
                                </div>
                                <div id="collapseFour_{{$problem->id}}" class="collapse" aria-labelledby="headingFour" data-parent="#accordion2" style="">
                                    <div class="card-body">
                                        <p class="lead"></p>
                                        <p class="problem-state">
                                            レベル：{{$problem->level->level_name}}&nbsp;&nbsp;&nbsp;
                                            ジャンル：{{$problem->ganre->ganre_name}} &nbsp;&nbsp;&nbsp;
                                            県名：{{$problem->province->name}}
                                        </p>
                                        <button onclick="add_problem({{$problem->id}})" class="btn btn-secondary">追加</button>
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

                <!-- ============================================================== -->
                <!-- accrodions style four -->
                <!-- ============================================================== -->
                <div class="selected-section px-2">
                    <div class="test-view-section">
                        <form action="{{route('free_test_problem')}}" method="post">
                            @csrf
                            <div class="section-block">
                                <h5 class="section-title">試験</h5>
                            </div>
                            <input type="hidden" name="sel_test_id" id="sel_test_id" value="{{$test->test_id}}">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">試験情報</span></div>
                                <input type="text" placeholder="" class="form-control" id="sel_test_state" 
                                value=" ジャンル：{{$test->free_test_id($test->test_id)}}" 
                                readonly>
                            </div>
                            
                        
                            {{-- <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">　問題数</span></div>
                                <input type="text" placeholder="" class="form-control" id="sel_test_total_count" value="0" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">合計時間</span></div>
                                <input type="text" placeholder="" class="form-control" id="sel_test_total_time" value="0分" readonly>
                            </div> --}}
                            <input type="hidden" id="problem_ids" name="problem_ids" value="">
                            <div class="w-100 text-center">
                                <input type="submit" class="btn btn-primary" value="保存">
                            </div>
                        </form>
                    </div>
                
                <!-- ============================================================== -->
                <!-- end accrodions style four -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- accrodions style three -->
                <!-- ============================================================== -->
                    <div class="test-selected-problems">

                    
                        <div class="section-block">
                            <h5 class="section-title">試験問題</h5>
                        </div>
                        <div class="accrodion-regular hx-500">
                            <div id="accordion3">
                                @foreach($problems as $problem)
                                @if($problem->selected_free_num($test->problem_id))
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h5 class="mb-0">
                                           <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven_{{$problem->id}}" aria-expanded="false" aria-controls="collapseSeven_{{$problem->id}}">
                                            <span class="title-text">{{$problem->answer_text}}</span>
                                           </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven_{{$problem->id}}" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion2" style="">
                                        <div class="card-body">
                                            <p class="lead"></p>
                                            <p class="problem-state">
                                                レベル：{{$problem->level->level_name}}&nbsp;&nbsp;&nbsp;
                                                ジャンル：{{$problem->ganre->ganre_name}} &nbsp;&nbsp;&nbsp;
                                                県名：{{$problem->province->name}}
                                            </p>
                                            <button onclick="del_problem({{$problem->id}})" class="btn btn-secondary">削除</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach


                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="temp-problem" id="temp_problem">
        <div class="card">
            <div class="card-header" id="headingSeven">
                <h5 class="mb-0">
                   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    <span class="title-text">Accordion Heading Title Here</span>
                   </button>
                  </h5>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3" style="">
                <div class="card-body">
                    <p class="problem-text"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                    <button onclick="del_problem(0)" class="btn btn-secondary">削除</button>
                </div>
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
        width:50%;
    }
    .selected-section{
        width: 50%;
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

    }
    #accordion3 .card{

    }
    .temp-problem{
        display: none;
    }
</style>
@endsection