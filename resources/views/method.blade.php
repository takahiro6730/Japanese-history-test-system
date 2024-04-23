@extends('layouts.main')
@section('main-content')
    <link href="{{asset('/css/method_style.css')}}" rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>

        AOS.init({
      duration: 1200,
    })
    </script>
    <section class="manvisual">
        <div class="method_img">
            <p class="method_title">試験内容と<br class="method-br"> 受験方法</p>
            <img src="{{asset('/img/top/content/top_method.png')}}" alt="">
        </div>
    </section>
    <section class="method_detail">
        <p class="method_contitle">[試験内容]</p>
        <p class="method_abstract">日本地域マイスター検定はまず「歴史・文化」のジャンルから始めます。</p>
        <div class="method_context"><ul>
            <li class="method_sentence"><img src="{{asset('/img/top/content/top_method-culture.jpg')}}" alt="" data-aos="fade-right">歴史・文化を知ることは今を知ることにつながります。誰しも歴史上の人物の一人くらいは知っているのではないでしょうか。それでいて知ってそうで知らない歴史もたくさんあるかもしれません。ふるさとやお気に入りの土地の良さを知り、親しみやすく奥深い歴史・文化を楽しみましょう。</li>
            <li class="method_sentence">全国47都道府県に問題が分かれているので受験する都道府県を自由に選ぶことができます。ふるさとの県を選んでも良いですし、観光で気に入った県を選ぶのも良いでしょう。</li>
            <li class="method_sentence">各都道府県ごとにブロンズ(3級)、シルバー(2級)、ゴールド(準1級)、プラチナ(1級)と自分の目標に合わせて受験ができます。自分のペースでステップアップしていけるようになっています。合格するとプラチナ・マイスターやゴールド・マイスターなどの資格(称号)が付与されます。そして、複数のプラチナ・マイスターを取得し規定をクリアするとダイヤモンド・マイスターの資格(称号)が付与されます。<img src="{{asset('/img/top/content/top_method-other.jpg')}}" alt="" data-aos="fade-left"></li>
            <li class="method_sentence">日本地域マイスター検定の「歴史・文化編」では、地理、地形、気候、文学、美術、建築、遺跡など様々な分野の文化・歴史に関する問題が出題されます。出題の形式も択一問題、複数選択問題、記述問題、穴埋め問題、正誤問題など多岐に渡ります。ですので総合的な教養や理解度を確かめることができます。</li>
            <li class="method_sentence"><img src="{{asset('/img/top/content/top_method-school.jpg')}}" alt="" data-aos="fade-right">学校での社会科や日本史はもちろんのこと、地理あるいは古文、美術、地学など多くの科目の学力の向上に寄与するかもしれません。また生涯学習の道しるべとしてライフワークとして取り組むこともできます。</li></ul>
        </div>
        <p class="method_contitle">[受験方法]</p>
        <div class="method_context"><ul>
            <li class="method_sentence" style="flex-direction:column"> 日本地域マイスター検定はオンラインで受験をします。スマートフォン、タブレット、パソコンのいずれでも受験が可能です。<img class="method_online" src="{{asset('/img/top/content/top_method-online.jpg')}}" data-aos="zoom-in"></li>
            <li class="method_sentence">日本地域マイスター検定のウェブサイトから申込みます。ジャンル、都道府県、クラス(級)を選びます。</li>
            <div class="method_example"><p>例<p><p>　ジャンル：文化・歴史<br> 　都道府県：神奈川県<br> 　クラス(級)：ブロンズ(3級)</p></div>
            <li class="method_sentence">申込が完了すると、受験に関する案内(受験票に相当）がメールで送られてきます。受験に関するご自分の状況はマイページでいつでも確認できます。</li>
            <li class="method_sentence"><img src="{{asset('/img/top/content/top_method-clock.png')}}" data-aos="fade-down">受験当日はまず受験開始時刻より前にログインを済ませて下さい。そしてインターネットの接続が安定している部屋で指定の時刻に受験して下さい。静かな部屋での受験をおすすめします。</li>
            <li class="method_sentence">各設問にはそれぞれ時間制限があります。残り時間はそれぞれの設問の画面に表示されます。その時間を過ぎると次の設問に自動的に移行します。制限時間は各設問により異なります。「次の問題へ」のボタンを押しても次の設問に移行できますが、いずれの場合も前の設問に戻ることはできません。ですので「次の問題へ」のボタンは良く考えてから押しましょう。</li></ul>
        </div>
    </section>
@endsection
