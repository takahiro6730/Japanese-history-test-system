@extends('admin.admin_layouts.admin_main')
@section('page-title')
    管理ページ
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    ユーザー
@endsection
@section('sub-root2')
    お客様お問い合わせ一覧
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">お客様お問い合わせ</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">ユーザー名</th>
                            <th scope="col" class="text-center">電話番号</th>
                            <th scope="col" class="text-center">メールアドレス</th>
                            <th scope="col" class="text-center">件名</th>
                            <th scope="col" class="text-center">お問合せ内容</th>
                            <th scope="col" class="text-center">回答</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 0;   
                        @endphp

                        @foreach ($userquestions as $userquestion)
                        <tr>
                            <th class="text-center" scope="row">{{++$i}}</th>
                            <td class="text-center">{{$userquestion->user_name}}</td>
                            <td class="text-center">{{$userquestion->user_phone}}</td>
                            <td class="text-center">{{$userquestion->user_mail}}</td>
                            <td  class="text-center">{{$userquestion->user_contitle}}</td>
                            <td  class="text-center" style="white-space: wrap">{{$userquestion->user_context}}</td>
                            
                            @if(!($userquestion->reply == ''))
                            <td class="text-center " style="word-wrap: break-word;">{{$userquestion->reply}}</td>
                            @else
                            <td class="text-center d-flex justify-content-center flex-column my-auto mx-auto">
                                <button type="button" class="btn btn-outline-dark" onclick="open_reply_modal({{$userquestion->id}}, '{{$userquestion->user_mail}}')">回答</button><div>
                                {{-- <form method="POST" action="{{route('admin.user.reply')}}" class="reply-form d-none" id="comment-1-reply-form" class="">
                                @csrf
                                    <textarea placeholder="Reply to comment" rows="4" name="reply_text" class="w-100"></textarea>
                                    <input type="hidden" name="userquestion_id" value="{{$userquestion->id}}">
                                    <div>
                                    <button class="btn btn-outline-dark button-send" type="submit">転送</button>
                                    <button class="btn btn-outline-dark button-cancle" type="button" data-toggle="reply-form" data-target="comment-1-reply-form">キャンセル</button>
                                    </div>
                                </form> --}}
                            </td>
                            @endif

                            <td class="text-center">
                                <a  class="btn btn-outline-dark"  href="{{route('admin.user.question.delete', ['id'=>$userquestion->id])}}">削除</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        {{-- Mail modal --}}
        <div class="modal fade show" id="mailModal" style="display: none;">
            <div class="modal-dialog">
                <div class="mail-modal-content">
                    <div class="mail-first-items">

                        <div class="mail-modal-header" style="border-bottom: 0; padding: 0;">
                            <a href="#" type="button" class="mail-close" style="opacity:1;">
                                <div style="position: absolute; top: 15px; right: 20px; font-size:20px;">
                                    &cross;
                                </div>
                            </a>
                        </div>
                        <form action="{{route('admin.user.reply')}}" method="POST" id="rplay_mail">
                            @csrf
                            <input type="hidden" id="userquestion_id" name="userquestion_id" value="" required>
                            <div class="mail-first-line" id="mail_line">
                                <div class="mail-first-content">
                                    <input type="text" class="mail-item-input" id="mail_address" name="mail_address" value="">
                                </div>
                            </div>
                            <div class="mail-div">
                                <textarea class="mail-textarea" id="reply_text" name="reply_text" required></textarea>
                            </div>
                    <div class="modal-footer justify-content-center" style="border-top: 0; padding: 10px;">
                        <button id="first_ok" class="btn btn-primary m-auto" type="submit"
                        style="background-color: rgb(143, 1, 255); font-size: 14px;border:0; height: 32px; width: 80px; border-radius: 10px; font-weight: 600; opacity:1;">送信</button>
                    </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
<style>
    .page-content{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .embed-img{
        width : 50px;
        height: 50px;
    }
    .main-center{
        width: 100%;
        max-width: 1400px;
    }
    .d-done{
        display:none;
    }
    td, th{
        max-width: 300px!important;
        word-wrap: break-word!important;
    }
    .button-send, .button-cancle{
        width: 90px;
    }
.mail-modal-content{
    top: 200px;
    left: 40%;
    border-radius: 20px;
    box-shadow: 5px 5px 10px 1px grey;
    padding-bottom: 10px;
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    outline: 0;
    width: 500px;
}
.mail-first-content {
    width: 100%;

    text-align: left;
}
.mail-first-content input{
    width: 100%;
    height: 40px;
    padding-left: 45px;
    font-size: 20px;
    border-radius: 5px;
    border: 0;
    /* box-shadow: 5px 5px 10px 1px grey; */
    background: rgb(241 241 241);
    border: 1px solid #dfdfdf;
}

.mail-first-items {
    margin: 20px 20px;
    margin-bottom: 0;
}
.mail-first-line {
    display: flex;
    justify-content: space-around;
    flex-direction: row;
    align-items: center;
    margin: 30px auto;
    font-size: 18px;
    font-weight: 600;
    position: relative;
}
.mail-textarea{
    width: 100%;
    height: 100%;
}
.mail-div{
    height: 100px;
    width: 90%;
    margin: 15px auto;
}

</style>

<script>
function open_reply_modal(userquestion_id, userquestion_address){
    $("#mailModal").css('display', 'block');
    $("#mail_address").val(userquestion_address);
    $("#userquestion_id").val(userquestion_id);
    $(document).ready(function(){
        $(".mail-close").click(function(){
            $("#mailModal").css('display', 'none');
        })
    })
}
    //document.addEventListener(
    //    "click",
    //    function(event) {
    //        var target = event.target;
    //        var replyForm;
    //        if (target.matches("[data-toggle='reply-form']")) {
    //            replyForm = document.getElementById(target.getAttribute("data-target"));
    //            replyForm.classList.toggle("d-none");
    //        }
    //    },
    //    false
    //);

</script>

@endsection