@extends('layouts.main')
@section('main-content')
    <link href="{{asset('/css/about_site_style.css')}}" rel='stylesheet'>
    <section class="manvisual">
        <div class="about_img">
            <p class="about_title">日本地域マイスター<br id="about_space">検定について</p>
            <img src="{{asset('/img/top/content/top_about.jpg')}}" alt="">
        </div>
    </section>
    <section class="about_detail">
        <div class="about_context">
            <p class="recent_date">コロナ禍において会社にも旅行にも行くことができなくなったときに、自宅近くを散歩する人が増えたようです。その際、近所にこんな建物があったんだとか、こんなところに神社があったんだとか、そうした小さな"発見"をしたという話しを聞きました。それで改めて自分が住んでいるところ、地元、故郷への関心が高まった方も少なくなかったようです。</p>
        </div>
        <div class="about_context">
            <p class="recent_date">　他方ここのところリスキリングへの関心や、学び直しの機運も高まっているように感じます。時代の変化についていくため、資格取得のため、知ることそのものの喜びなどそれぞれの動機による自己研鑽かと思われます。こうしたことが相まって、日本の各地域への学習意欲は一層増しているのではないでしょうか。</p>
        </div>
        <div class="about_context">
            <p class="recent_date">　日本地域マイスター検定は47都道府県の様々な知識に関してオンラインで受験できる検定です。今の知識の腕試しをしたり、成長を確かめたり、学校の勉強のサポートにしたりと自在にご活用いただけます。故きを温ねて新しきを知る。ご自身のヴァージョンアップにおすすめいたします。</p>
        </div>
    </section>
@endsection
