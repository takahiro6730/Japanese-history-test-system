@extends('admin.admin_layouts.admin_main')
@section('page-title')
    作成
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    試験管理
@endsection
@section('sub-root2')
    作成
@endsection
@section('main-content')
<style>
    label{
        margin:auto 0!important;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">試験作成</h5>
            <div class="card-body">
                <div id="pstyle_set">
                    <div class=" form-group row">
                        <label for="pstyle_id" class="col-12 col-sm-3 col-form-label text-sm-right">問題形式</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select name="pstyle_id" id="pstyle_id" class="form-control">
                                <option value="1" selected>ラジオ</option>
                                <option value="2">チェックボックス</option>
                                <option value="3">インフット</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="problem_text" class="col-12 col-sm-3 col-form-label text-sm-right">問題入力</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea type="text" id="problem_text" name="problem_text" class="form-control" style="height:100px;" Required></textarea>
                            <p id="problem_text-alert" class="text-danger"></p>
                        </div>
                    </div>
                    <div class="d-flex w-100">
                        <button type="button" onclick="pstyle()" class="btn btn-space btn-primary mx-auto">次のステップへ</button>
                    </div>
                </div>
                <div id="pstyle_detail" style="display:none;"  >
                    <div class="form-group row">
                        <div class="col-12 col-sm-8 col-lg-6">
                            <p>問題形式: <span id="exam_style"></span></p>
                            <p>問題: <span id="exam_text"></span></p>
                        </div>    
                    </div>
                    <div class="border-top">
                        <p>答えを入力してから追加ボタンをクリックすることを忘れないでください。</p>
                        <div class="form-group row d-flex"  id="pre_answer_home">

                       
                            <label for="pre_answer" class="col-12 col-sm-3 col-form-label text-sm-right ">予想答え</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" id="pre_answer_each" class = "form-control form-control-lg">
                            </div>
                            <button type="button" class="btn btn-primary" onclick="add_preanswer()">追加</button>
                            <p id="pre_answer-alert" class="col-12 col-sm-8 col-lg-6 mx-auto text-danger"></p>
                        </div>
                        <ol type="A" id="pre_answer_array"></ol>
                        <div class="correct_answer form-group row d-flex">
                            <label for="correct_answer" class="col-12 col-sm-3 col-form-label text-sm-right">正解</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" id="correct_answer_each" class="form-control form-control-lg">
                            </div>
                            <button type="button" class="btn btn-primary" style="bottom: 3px; right: 16px;" onclick="add_correctanswer()">追加</button>
                            <p class="col-12 col-sm-8 col-lg-6 mx-auto text-danger" id="correct_answer-alert"></p>
                        </div>
                        <ul id="correct_answer_array"></ul>
                    </div>
                    <form action="{{route('admin.test.add_problem')}}" method="POST" class="w-100">
                        @csrf
                        <input name="snd_pstyle_id" id="snd_pstyle_id" type = "hidden">
                        <input name="snd_problem_text" id="snd_problem_text" type="hidden">
                        <input name="snd_pre_answers" id="snd_pre_answers" type="hidden">
                        <input name="snd_correct_answers" id="snd_correct_answers" type="hidden">
                        <div class="form-group d-flex justify-content-center">
                            <label for="input-select">県選択</label>
                            <select class="form-control mx-3" style="width: 150px;" id="input-select" name="snd_province">
                                @foreach($provinces as $province)
                                <option>{{$province->name}}</option>
                                @endforeach
                            </select>
                            
                            <label for="input-select">ジャンル選択</label>
                            <select class="form-control mx-3" style="width: 150px;" id="input-select" name="snd_ganre">
                                @foreach($ganres as $ganre)
                                <option>{{$ganre->ganre_name}}</option>
                                @endforeach
                            </select>
                            
                            <label for="input-select">レベル選択</label>
                            <select class="form-control mx-3" style="width: 150px;" id="input-select" name="snd_level">
                                @foreach($levels as $level)
                                <option>{{$level->level_name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <p style="margin:auto 0;">消費時間:</p>
                            <input type="text" name="snd_mintime" id="snd_mintime" class="form-control mx-3" style="width: 150px;">
                            <label for="snd_mintime">分</label>
                            <input type="text" name="snd_secondtime" id="snd_secondtime" class="form-control mx-3" style="width: 150px;">
                            <label for="snd_secondtime">秒</label>                  
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-space btn-success mx-auto">次の問題の作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script src="{{asset('admin/vendor/datepicker/moment.js')}}"></script>
        <script src="{{asset('admin/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{asset('admin/vendor/datepicker/datepicker.js')}}"></script>
        <script>
            var pstyle_id;
            var pstyle_name;
            var problem_text;
            var pre_answer = [];
            var correct_answer = [];
            var snd_pstyle_id;
            var snd_problem_text;
            var snd_pre_answers;
            var snd_correct_answers;
            var pstyle_set = document.getElementById("pstyle_set");
            var pstyle_detail = document.getElementById("pstyle_detail");
            var pre_answer_home = document.getElementById("pre_answer_home");
            var i = 0; var j=0;
            function pstyle(){
                
                pstyle_id = document.getElementById("pstyle_id").value;
                if(pstyle_id == 1){pstyle_name = "'ラジオ"}
                else if(pstyle_id == 2){pstyle_name = "チェックボックス"}
                else{pstyle_name = "インフット"}
                
                problem_text = document.getElementById("problem_text").value;
                if(problem_text == ''){
                    document.getElementById("problem_text-alert").innerText = "ここに入力してください!";
                    return;
                }

                document.getElementById("exam_style").innerHTML = pstyle_name;
                document.getElementById("exam_text").innerHTML = problem_text;
                
                document.getElementById("snd_pstyle_id").value = pstyle_id;
                document.getElementById("snd_problem_text").value = problem_text;

                pstyle_set.style.display = "none";
                pstyle_detail.style.display = "block";
                if(pstyle_id == 3){pre_answer_home.setAttribute('style', 'display:none !important');}
            }

            function add_preanswer(){
                var pre_answer_each = document.getElementById("pre_answer_each").value;
                if(pre_answer_each == ''){
                    document.getElementById("pre_answer-alert").innerText = "ここに入力してください!";
                    return;
                }
                document.getElementById("pre_answer-alert").innerText = "";
                pre_answer.push(pre_answer_each);
                if(j==0){
                    snd_pre_answers = pre_answer_each;
                    j++;
                }
                else{snd_pre_answers+="#" + pre_answer_each;}

                document.getElementById('pre_answer_array').innerHTML+='<li>' + pre_answer_each + '</li>';
                
                document.getElementById("snd_pre_answers").value = snd_pre_answers;

                document.getElementById("pre_answer_each").value = "";
                
            }
            function add_correctanswer(){
                var correct_answer_each = document.getElementById("correct_answer_each").value;
                if(correct_answer_each == ''){
                    document.getElementById("correct_answer-alert").innerText = "ここに入力してください!";
                    return;
                }
                document.getElementById("correct_answer-alert").innerText = "";
                correct_answer.push(correct_answer_each);
                if(i==0){
                    snd_correct_answers = correct_answer_each;
                    i++;
                }
                else{snd_correct_answers+="#" + correct_answer_each;}
                
                document.getElementById('correct_answer_array').innerHTML+='<li>' + correct_answer_each + '</li>';

                document.getElementById("snd_correct_answers").value = snd_correct_answers;

                document.getElementById("correct_answer_each").value = "";

            }
        
        </script>
</div>

@endsection