@extends('layouts.main')
@section('main-content')
<link href="{{asset('/css/test_end_style.css')}}" rel='stylesheet'>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script>

    AOS.init({
    duration: 1200,
})
</script>
    <section class="mainvisual" data-aos="fade-up">
        <img src=" {{asset('/img/top/test_area/top_wakayama.png')}} " alt="">
        {{-- <p class="endtext">試験終了</p> --}}
    {{-- </section>
    <section class="test_end_notice"> --}}
    @if(Auth::check())
        <div class="end_field">
            <p class="end_title">お疲れ様でした！</p>
            <p class="end_context">回答内容は無事に運営へ送信されました。<br>
                採点出来次第、メールでご連絡いたします。<br>
                メールが届きましたら、「マイページ」にて <br>   
                結果をご確認くださいませ。
            </p>
            <a href="{{route('welcome_page')}}">
                <div class="to-top_page">
                トップページへ    
                </div>
            </a>
        </div>
    @endif

    @if(!Auth::check())
        <div class="end_field">
            <p class="end_title">お疲れ様でした！</p>
            <p class="end_context">あなたの試験結果は &nbsp
            @foreach ($indivi_scores as $i=>$score)
                @if ($i == 4)
                    <span style="color:#00ffff">{{$i+1}}</span> - <span style="color:#00f58a">{{$score}}</span>  &nbsp
                @else
                    <span style="color:#00ffff">{{$i+1}}</span> - <span style="color:#00f58a">{{$score}}</span> , &nbsp
                @endif
                    
            @endforeach
            です。</p>
            <p class="end_context">あなたのスコアは<span style="font-size: 40px; padding:10px; color:red;"> {{$avg_score}}</span>点です。<br>
            楽しかったですか？<br>
                「無料会員登録」をすると、今後<br>
                さまざまな検定を受験することができます！  
            </p>
            <a href="{{route('_verifyMailSend')}}">
                <div class="to-register_page">
                無料会員登録へ    
                </div>
            </a>
            <a href="{{route('welcome_page')}}">
                <div class="to-top_page">
                トップページへ    
                </div>
            </a>
        </div>
    @endif
    </section>
 <a href="{{route('welcome_page')}}" id="top-page"><p>トップページへ</p> </a>
@endsection
