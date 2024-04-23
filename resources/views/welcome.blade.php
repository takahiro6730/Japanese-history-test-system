@extends('layouts.main')
@section('main-content')
    <link href="{{ asset('/css/welcome_style.css') }}" rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.5.4/vegas.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>

        AOS.init({
      duration: 1200,
    })
    </script>
    <section class="mainvisual">
        <div class="top_screen" id="top_screen_id" >
            {{-- <img class="bg-pc" src="{{asset('img/users/main_bg.png')}}" alt="background-image">
            <img class="bg-sp" src="{{asset('img/users/main_bg-sp.jpg')}}" alt="background-image"> --}}
            {{-- <div class="top_subject">
                <p class="top_subject-special">Special</p>    
                <p class="top_subject-meister">Meister</p>    
            </div>
            <div class="top_idea">
                私が地元の<span id="top_idea-meister"> Meister</span>です。
            </div> --}}
        </div>

        <div class="top_notices-modal">
            <a href="#top_notices" class="schedul_btn">
                <p style="margin:0; padding:0;">インフォメーション</p>
            </a>
        </div>

        <div class="top_notices" id="top_notices">
            <div class="top_notices-title">インフォメーション
                <a href="#" class="top_notices-close">&times;</a>
            </div>


            <div class="top_notices-detail">
                @foreach ($notices as $notice)
                    <div class="top_notices-content">
                        <p class="notice-date">{{ $notice->get_notice_date() }}</p>
                        <a href="{{ route('notice.select', ['id' => $notice->id]) }}"
                            class="notice-title">{{ $notice->notice_contitle }}</a>
                        <p class="notice-text">{{ $notice->notice_context }}</p>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('guide.notice') }}">
                <div class="top_notices-all">一覧を見る</div>
            </a>
        </div>

    </section>


    <section class="promotion">
        <div class="promotion_detail">
            <img class="promo_clock" src="{{ asset('img/users/clock.png') }}" alt="map-image">
            <img class="promo_girl" src="{{ asset('img/users/promo_girl.png') }}" alt="map-image">

            <p class="promotion_title">プロモーション<br>
                <span class="title_space">Promotion</span>
            </p>

            <div class="video">
                <img class="promo_camera" src="{{ asset('img/users/promo_camera.png') }}" alt="map-image">
                <video id="video" controls muted autoplay data-aos="zoom-in">
                    <source src="{{ asset('img/interview01.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>

    </section>

    @if (!Auth::check())
        <section class="free_test">
            <p class="free_test-title">お試し検定<br><span class="title_space">Trial test</span></p>
            <p class="free_test-summary">6つの都道府県で各5問お楽しみいただけます！</p>
            <div class="free_test-bg">
                <div class="free_test_parts">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($first_tests as $first_test)
                        @php
                            $i++;
                        @endphp
                        @if ($first_test['province'])
                        <div class="free_test-part" data-aos="flip-right">
                            <div class="free_test_img">
                                <img src="{{ asset('img/top/test_area/top_free_' . $i . '.jpg') }}" alt="">
                                <p class="free_test_name">
                                    @foreach (mb_str_split($first_test['province']) as $char)
                                        {{ $char }}
                                        <br>
                                    @endforeach

                                </p>
                            </div>
                            <div class="free_test_detail" id="free_test_detail">
                                <p class="free_test_detail-ganre">ジャンル：{{ $first_test['ganre'] }}</p>
                                <p class="free_test_detail-level">出題数：{{ $first_test['count'] }}</p>
                                <div class="free_test_enter">
                                    <a class="free_test_enter_btn"
                                        href="{{ route('free_test_enter', ['id' => $first_test['free_id']]) }}">検定開始</a>
                                </div>
                            </div>
                        </div> 
                        @endif

                    @endforeach
                </div>

            </div>
        </section>
    @endif

    @if (Auth::check())
        <section class="test_area">
            <p class="test_area-title">試験エリア<br>
                <span class="title_space">Test area</span>
            </p>
            {{-- <div class="animation"></div> --}}

            <div class="free_test-bg  animation">
            {{-- <img src="{{asset('img/users/coming-soon2.png')}}" style="width:100%"> --}}
                {{-- 
                <div class="test_areas">
                    @foreach ($provinces as $province)
                        <div class="test_area-part" data-aos="flip-right">
                            <a href="{{ route('prefecture.select', ['id' => $province->id]) }}">
                                <div class="area_img">
                                    <p class="area_name">

                                        @foreach (mb_str_split($province->name) as $char)
                                            {{ $char }}
                                            <br>
                                        @endforeach

                                    </p>
                                    <img src="{{ $province->img_url }}" alt="">
                                </div>
                                <div class="area_detail" id="areadetail">
                                    <p class="area_detail-title">最近の開催試験</p>
                                    @if (is_null($province->province_first_test()))
                                        <p class="predetail_title">テストはありません。</p><br><br><br><br><br>
                                    @else
                                        <p class="aera_detail_test_title">
                                            試験タイトル:{{ $province->province_first_test()->name }}</p>
                                        <p class="area_detail-date">
                                            開催日：{{ $province->province_first_test()->get_test_date() }}</p>
                                        <p class="area_detail-time">
                                            開催時間：{{ $province->province_first_test()->get_begin_time() }}
                                            ～{{ $province->province_first_test()->get_end_time() }}</p>
                                        <p class="area_detail-ganre">
                                            ジャンル：{{ $province->province_first_test()->get_ganre_name() }}</p>
                                        <p class="area_detail-level">
                                            レベル：{{ $province->province_first_test()->get_level_name() }}</p>
                                    @endif

                                </div>
                            </a>
                        </div>
                    @endforeach

                </div> --}}
            </div>
            {{-- <div class="to_area-list">
                <div>
                    <a href="{{ route('search.area') }}" class="to_area-list-btn">試験エリア一覧ページへ</a>
                </div>
            </div> --}}
        </section>
    @endif

    <section class="sns_media">
        {{-- <img class="sns-girl" src="{{asset('img/users/sns-girl.png')}}"> --}}
        <p class="sns-title">SNSメディア<br><span class="title_space">SNS media</span></p>
        <div class="sns-bg">
            {{-- <div class="sns-map"></div> --}}
            <div class="sns-items">
                <div class="sns-items-img" data-aos="zoom-in-up">
                    <a href="#"><img src="{{ asset('img/top/sns_media/top_youtube.png') }}" alt=""></a>
                </div>
                <div class="sns-items-img" data-aos="zoom-in-up">
                    <a href="#"><img src="{{ asset('img/top/sns_media/top_twiter.png') }}" alt=""></a>
                </div>
                <div class="sns-items-img" data-aos="zoom-in-up">
                    <a href="#"><img src="{{ asset('img/top/sns_media/top_facebook.png') }}" alt=""></a>
                </div>
                <div class="sns-items-img" data-aos="zoom-in-up">
                    <a href="#"><img src="{{ asset('img/top/sns_media/top_instagram.png') }}" alt=""></a>
                </div>
            </div>
            {{-- <img class="sns-meister" src="{{ asset('img/users/meister00.png') }}"> --}}
        </div>
    </section>

    @if (Auth::check())
        <section class="search_by_ganre">
            <p class="search_ganre-title">ジャンルから探す<br><span class="title_space">Search by genre</span></p>
            {{-- <div class=""></div> --}}

            <div class="search_ganre-btns animation">
{{-- 
                <img class="search_tree" src="{{ asset('img/users/trees.png') }}" alt="">
                @foreach ($ganres as $ganre)
                    <div class="search_each_ganre" data-aos="zoom-in">
                        <a href="{{ route('ganre.select', ['id' => $ganre->id]) }}">
                            <p class="search_ganre-btns-btn">{{ $ganre->ganre_name }}</p>
                        </a>
                    </div>
                @endforeach --}}
            </div>
        </section>
    @endif

    <div class="slider">
        <div id="slider-container">
            <div id="slider-scroller">
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(1).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(2).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(3).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(5).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(6).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(4).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(7).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(8).png') }}" /></div>
                <div class="slider-item"><img src="{{ asset('img/users/users_slide(9).png') }}" /></div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="content-items">
            <div class="content-items-left" data-aos="fade-right"><a href="{{ route('guide.about_site') }}">
                    <p class="content-items-title">日本地域マイスター<br>検定について</p>
                    <img src="{{ asset('img/top/content/top_about.jpg') }}" alt="">
                </a>
            </div>
            <div class="content-items-right" data-aos="fade-left"><a href="{{ route('guide.method') }}">
                    <p class="content-items-title">試験内容と受験方法</p><img src="{{ asset('img/top/content/top_method.png') }}"
                        alt="">
                </a></div>
        </div>
    </section>

    <div class="slider">
        <div id="slider-right-container">
            <div id="slider-right-scroller">
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(1).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(2).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(3).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(4).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(5).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(6).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(7).png') }}" /></div>
                <div class="slider-right-item"><img src="{{ asset('img/users/user_slide(8).png') }}" /></div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/slide.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.5.4/vegas.min.js"></script>
    <script>
        var windowwidth = window.innerWidth || document.documentElement.clientWidth || 0;
        if (windowwidth > 768) {
            var responsiveImage = [{
                    src: "{{ asset('img/users/top_bg_1.jpg') }}"
                },
                {
                    src: "{{ asset('img/users/top_bg_2.jpg') }}"
                },
                {
                    src: "{{ asset('img/users/top_bg_3.jpg') }}"
                }
            ];
        } else {
            var responsiveImage = [{
                    src: "{{ asset('img/users/top_bg_1.jpg') }}"
                },
                {
                    src: "{{ asset('img/users/top_bg_2.jpg') }}"
                },
                {
                    src: "{{ asset('img/users/top_bg_3.jpg') }}"
                }
            ];
        }
        $('#top_screen_id').vegas({
            //overlay: true,
            transition: 'blur',
            transitionDuration: 2000,
            delay: 10000,
            animationDuration: 20000,
            animation: 'kenburns',
            slides: responsiveImage,
        });
    </script>
@endsection
