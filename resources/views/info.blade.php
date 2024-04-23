@extends('layouts.main')
@section('main-content')
<link href="{{asset('/css/info_style.css')}}" rel='stylesheet'>
<section class="mainvisual">
    <div class="info_screen">
        <p class="info-title">{{$notice->notice_contitle}}</p>
        <div style="width: 100%; position:relative;">
            <img src="{{$notice->notice_img_url}}" alt="画像">
            <img class="notice_greeting" src="{{asset('/img/users/greeting.png')}}">
            <img class="notice_point" src="{{asset('/img/users/point.png')}}">
        </div>
    </div>
</section>
<section class="info-data">
    <div class="info-detail">
        <p class="info-content">{{$notice->notice_context}}</p>
        <p class="info-date">{{$notice->get_notice_date()}}</p>
    </div>
    <div class="list-btn">
        <a href="{{route('guide.notice')}}"><p class="info-list-btn">一覧を見る</p></a>
    </div>            
</section>
@endsection
