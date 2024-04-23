@extends('layouts.main')
@section('main-content')
<link href="{{asset('/css/prefecture_style.css')}}" rel='stylesheet'>
<section class="manvisual">
        <div class="prefecture_img">
            <p class="prefecture_name">

            @foreach(mb_str_split($province->name) as $char)
                {{$char}}
                <br>
            @endforeach
            
            </p>
            <img src="{{$province->img_url}}" alt="">
        </div>
    </section>
    <section class="prefecture_detail">
        @if(!$tests->isEmpty())
        <p class="predetail_title">最近の開催試験</p>
        

        <div class="ganre_detail">

            <div class="ganre_context">
                <p class="ganre_date">開催日：{{$tests[0]->get_test_date()}}</p>
                <p class="ganre_time">開催時間：{{$tests[0]->get_begin_time()}}～{{$tests[0]->get_end_time()}}</p>
                <p class="ganre_level">レベル：{{$tests[0]->get_level_name()}}</p>
                <p class="ganre_level">ジャンル：{{$tests[0]->get_ganre_name()}}</p>
                <p class="ganre_count"> 出題数: {{$tests[0]->get_problem_count()}}</p>
            </div>
            <div class="ganre_apply">

            @if($tests[0]->get_allowed_state()==0)

                <div class="ganre_apply">
                    <a href="{{route('test.apply',['id'=>$tests[0]->id])}}" class="ganre_apply-btn">申し込む</a>
                </div>
                @else
                <div>
                <p class="ganre_apply-btn" style="background-color:#C7C7C7">申請済み</p>
                </div>

            @endif

            </div>
        </div>  

        <div class="test_list_btn_group">
            <button class="test_list_btn" id="test_asc">昇順</button>
            <button class="test_list_btn" id="test_desc">降順</button>
        </div>

        <div class="ganre_group" id="show_test_group">
        @foreach($tests as $test)

            <div class="ganre_detail">

                <div class="ganre_context">
                    <p class="ganre_date">開催日：{{$test->get_test_date()}}</p>
                    <p class="ganre_time">開催時間：{{$test->get_begin_time()}}～{{$test->get_end_time()}}</p>
                    <p class="ganre_level">レベル：{{$test->get_level_name()}}</p>
                    <p class="ganre_level">ジャンル：{{$test->get_ganre_name()}}</p>
                    <p class="ganre_count"> 出題数: {{$test->get_problem_count()}}</p>
                </div>

                @if($test->get_allowed_state()==0)
                <div class="ganre_apply">
                    <a href="{{route('test.apply',['id'=>$test->id])}}" class="ganre_apply-btn">申し込む</a>
                </div>
                @else
                <div>
                <p class="ganre_apply-btn" style="background-color:#C7C7C7">申請済み</p>
                </div>
                @endif
            </div>            

        @endforeach

        </div>
        @else
        <p class="predetail_title">テストはありません。</p>
        @endif

    </section>
    <script>
        $(document).ready(function(){
            $("#test_asc").click(function(){
                $("#show_test_group").css('flex-direction', 'column');
                $(this).css('background','#13AE6A');
                $("#test_desc").css('background','white');
            });
            $("#test_desc").click(function(){
                $("#show_test_group").css('flex-direction', 'column-reverse');
                $(this).css('background','#13AE6A');
                $("#test_asc").css('background','white');
            });
        })   
    </script>
@endsection
