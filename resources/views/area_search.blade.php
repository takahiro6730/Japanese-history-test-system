<!-- add maeda 2023/07/13 -->
@extends('layouts.main')
@section('main-content')
​
<link href="{{asset('/css/area_style.css')}}" rel='stylesheet'>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script>

    AOS.init({
    duration: 1200,
})</script>
    <div class="test_area_wrapper">
        <div class="icon_controll">
            <div class="icon1">
                <img src="{{asset('/img/prefecture/star1.png')}}" alt="アイコン" data-aos="zoom-out">
            </div>
            <div class="icon2">
                <img src="{{asset('/img/prefecture/star2.png')}}" alt="アイコン" data-aos="zoom-out">
            </div>
            <div class="icon3">
                <img src="{{asset('/img/prefecture/star1.png')}}" alt="アイコン" data-aos="zoom-out">
            </div>
            <div class="icon4">
                {{-- <img src="{{asset('/img/prefecture/meister.png')}}" alt="アイコン" data-aos="zoom-out"> --}}
            </div>
            <div class="icon5">
                <img src="{{asset('/img/prefecture/star1.png')}}" alt="アイコン" data-aos="zoom-out">
            </div>
            <div class="icon6">
                <img src="{{asset('/img/prefecture/mountain.png')}}" alt="アイコン" data-aos="zoom-out">
            </div>
        </div>
        <section class="test_area">
            <p class="test_area-title">試験エリア一覧</p>
            <form action="{{route('prefecture.search')}}" method="GET">
            @csrf
            <div class="area_search">
                <input type="text" class="area_search_input" id="area_search_input" name="province_name" placeholder="県名で検索">
                <input type="submit" id="province_search_key" value="検索">
            </div>
            </form>
            <div class="test_areas" >
                @if(!empty($tests))
                    @foreach($tests as $test)
                    <div class="test_area-part" data-aos="flip-right">
                        <a href="{{route('prefecture.select', ['id'=>$test->province->id])}}">
                            <div class="area_img">
                                <p class="area_name">
                                    @foreach(mb_str_split($test->province->name) as $char)
                                        {{$char}}
                                        <br>
                                    @endforeach
                                </p>
                                <img src="{{$test->province->img_url}}" alt="">
                            </div>
                            <div class="area_detail">
                                <p class='area_detail_title'>試験タイトル:{{$test->name}}
                                <p class="ganre_date">開催日：{{$test->get_test_date()}}</p>
                                <p class="ganre_time">開催時間：{{$test->get_begin_time()}}～{{$test->get_end_time()}}</p>
                                <p class="ganre_level">レベル：{{$test->get_level_name()}}</p>
                                <p class="ganre_level">ジャンル：{{$test->get_ganre_name()}}</p>
                                <p class="ganre_count"> 出題数: {{$test->get_problem_count()}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
            </div>
            <div>
            @if ($tests->lastPage() > 1)
                {{ $tests->links('pagination')}}
             @endif
            </div>
            @else
            <p class="test_area-title">テストはありません。</p>
            @endif
        </section>
    </div>
@endsection