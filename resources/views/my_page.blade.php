@extends('layouts.main')
@section('main-content')
<link href="{{asset('/css/mypage_style.css')}}" rel='stylesheet'>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script>

    AOS.init({
    duration: 1200,
})
</script>
    <div class="my_page-top-color"></div>
    <div class="my_page-bottom-color"></div>
<section class="my_page" >
        <div class="user_information" data-aos="fade-down">
            <p class="title">あなたの情報</p>
            <p class="user_name">氏名:　<span>{{Auth::user()->name}}</span></p>
            <p class="user_mail_address">メールアドレス:　<span>{{Auth::user()->email}}</span></p>
            <br>
            @php
                $class = 0;
            @endphp
            <p>
            @foreach ($allowed_tests as $allowed_test)
            @if(!is_null($allowed_test))
            @if(!is_null($allowed_test->passed))
                @if($allowed_test->passed->state == '合格')
                 @php
                    $class = 1;
                @endphp

                    「<span>{{$allowed_test->test->get_province_name()}}</span>県 
                    <span>{{$allowed_test->test->get_ganre_name()}}</span>
                    <span>{{$allowed_test->test->get_level_name()}}</span>
                    メイスター」
                    {{-- {{dd($allowed_test->test->get_province_name())}} --}}

                @endif
                @endif
                @endif
                
            @endforeach
            @if($class == 1)
                を取得しました。
            @else
                まだ取得した資格がありません。 頑張ってください。
            @endif
            </p>
            <img src="{{asset('img/users/promo_girl.png')}}" class="user-meister">
        </div>
        <div class="recent_result" data-aos="fade-right">
            <p class="recent_result_title title">最近受けた検定</p>
            <div class="recent_result_detail">
            @foreach ($allowed_tests as $allowed_test)
            @if(!$allowed_test->test->check_datetime())
                <div class="recent_test">
                <div class="recent-container">
                    <div class="recent_when">
                        <p class="recent_date">開催日：{{$allowed_test->test->get_test_date()}}</p>
                        <p class="recent_time">開催時間：{{$allowed_test->test->get_begin_time()}}～{{$allowed_test->test->get_end_time()}}</p>
                    </div>
                    <div class="recent_context">
                        <p class="recent_ganre">エリア： <span>{{$allowed_test->test->get_province_name()}}</span></p>
                        <p class="recent_ganre">ジャンル： <span>{{$allowed_test->test->get_ganre_name()}}</span></p>
                        <p class="recent_level">レベル：<span>{{$allowed_test->test->get_level_name()}}</span></p>
                    </div>
                </div>
                    @if($allowed_test->passed === null || $allowed_test->passed->state === null)
                        
                        <div class="recent_test_result nogaze_style">
                            <span>合否判定待ち</span> 
                        </div>
                        
                    @elseif($allowed_test->passed->state == '不合格')
                        
                        <div class="recent_test_result fail_style">
                            <span>不合格</span> 
                        </div>
                        
                    @elseif($allowed_test->passed->state == '合格')
                        <div class="recent_test_result pass_style">
                            <span>合格</span> 
                        </div>
                    @endif
                    @endif
                </div>
                
            @endforeach
            </div>
        </div>
        <div class="reservation_list" data-aos="fade-left">
            <p class="reservation_title title">予約済み検定</p>    
            <div class="reservation_detail">
                @foreach($allowed_tests as $allowed_test)
                @if($allowed_test->test->check_datetime())
                <div class="reservation_content">
                    <p class="reservation_contetnt_title">試験タイトル:{{$allowed_test->test->name}}</p>
                    <div class="reservation_when">
                        <p class="reservation_date">開催日：{{$allowed_test->test->get_test_date()}}</p>
                        <p class="reservation_time">開催時間：{{$allowed_test->test->get_begin_time()}}～{{$allowed_test->test->get_end_time()}}</p>
                    </div>
                    <div class="reservation_context">
                        <p class="reservation_area">エリア： <span>{{$allowed_test->test->get_province_name()}}</span></p>
                        <p class="reservation_ganre">ジャンル： <span>{{$allowed_test->test->get_ganre_name()}}</span></p>
                        <p class="reservation_level">レベル：<span>{{$allowed_test->test->get_level_name()}}</span></p>
                    </div>
                    <a href="{{route('test.login_form', ['id'=>$allowed_test->allowed_id])}}">
                        <div class="to_test_site">
                            試験画面へ進む
                        </div>
                    </a>
                </div>
                @endif
                @endforeach

            </div>
        </div>
        <div class="passed_test_list" data-aos="fade-up">
            <p class="passed_test_title title">合格済み検定一覧</p>
            <div class="passed_test_detail">
            @foreach ($allowed_tests as $allowed_test)
            @if($allowed_test->test->check_datetime())
                @if($allowed_test->passed !== null)
                    @if($allowed_test->passed->state == '合格')
                        <div class="passed_test_content">
                            <div class="passed_test_when">
                                <p class="passed_test_date">開催日：{{$allowed_test->test->get_test_date()}}</p>
                                <p class="passed_test_time">開催時間：{{$allowed_test->test->get_begin_time()}}～{{$allowed_test->test->get_end_time()}}</p>
                            </div>
                            <div class="passed_test_context">
                                <p class="passed_test_area">エリア： <span>{{$allowed_test->test->get_province_name()}}</span></p>
                                <p class="passed_test_ganre">ジャンル： <span>{{$allowed_test->test->get_ganre_name()}}</span></p>
                                <p class="passed_test_level">レベル：<span>{{$allowed_test->test->get_level_name()}}</span></p>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @endforeach
            </div> 
        </div>
    </section>
    @endsection
