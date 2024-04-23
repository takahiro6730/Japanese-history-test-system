@extends('layouts.main')
@section('main-content')
    <link href="{{asset('/css/question_style.css')}}" rel='stylesheet'>
    <section class="mainvisual">
        <img src="{{asset('/img/top/content/top_question.png')}}" alt="">
        <p class="question_main">お問合せ</P>
    </section>
    <section class="question_detail">
    <form method="POST" action="{{route('question_admin')}}">
    @csrf
       <div class="question_name">
            <label for="question_name">氏名<span class="question_request">（必須）</span></label>
            <input type="text" id="qustion_name" name="question_name" required>
        </div>
        <div class="question_phone">
            <label for="question_phone">電話番号<span class="question_request">（必須）</span></label>
            <input type="text" id="qustion_phone" name="question_phone" required>
        </div>
        <div class="question_mail_address">
            <label for="question_mail_address">メールアドレス<span class="question_request">（必須）</span></label>
            <input type="email" id="qustion_mail_address" name="question_mail_address" required>
        </div>
        <div class="question_contitle">
            <label for="question_contitle">件名<span class="question_request">（必須）</span></label>
            <input type="text" id="qustion_contitle" name="question_contitle" required>
        </div>
        <div class="question_context">
            <label for="question_context">お問合せ内容<span class="question_request">（必須）</span></label>
            <textarea type="text" id="qustion_context" name="question_context" required></textarea>
        </div>
        <div class="question_send">
            <input type="submit" value="送信する" name="question_send_value" id="question_send_value">
        </div>
    </form>  
    </section>
@endsection
