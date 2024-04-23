@extends('layouts.main')
@section('main-content')
<link href="{{asset('/css/notice_style.css')}}" rel='stylesheet'>
<section class="mainvisual">
        <div class="notice_screen">
            <p class="notice_title">サイトからのお知らせ</p>
            
            <div class="notice_content">
            {{-- <img class="notice-blueboard" src="{{asset('img/users/notice.png')}}"> --}}
            <img class="notice-notepad" src="{{asset('img/users/notepad.png')}}">
                @foreach ($notices as $notice)
                <div class="notice_items">
                    <a href="{{route('notice.select', ['id'=>$notice->id])}}">
                        <div class="notice_img">
                            <img src="{{$notice->notice_img_url}}" alt="">
                        </div>
                        <div class="notice_detail">
                            <p class="notice_detail-date">{{$notice->get_notice_date()}}</p>
                            <p class="notice_detail-title">{{$notice->notice_contitle}}</p>
                            <p class="notice_detail-text">{{$notice->notice_context}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div>
                {{ $notices->links('pagination')}}
            </div>
        </div>
    </section>
@endsection
