@extends('admin.admin_layouts.admin_main')
@section('page-title')
    お知らせ編集
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    お知らせ
@endsection
@section('sub-root2')
    お知らせ編集
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">お知らせ</h5>
        <form method="POST" action="{{route('admin.notice.save')}}" id="validationform">
            <div class="d-flex my-4 justify-content-around align-items-center flex-column">
                @csrf
                @if($notice == ''){
                    <input type="hidden" name="notice_id" id="notice_id" value="-1">
                }@else
                <input type="hidden" name="notice_id" id="notice_id" value="{{$notice->id}}">
                @endif
                <div class="w-100 d-flex justify-content-center my-3">
                    <div class="tar-img">
                        <img src="{{$notice->notice_img_url}}" id="notice_img" alt="">
                    </div>
                    <input type="hidden" name="notice_url" id="notice_url" value="{{$notice->notice_img_url}}">
                </div>
                <div class="name-area">
                    <label class="mx-2">お知らせ名</label>
                    <div class="mx-2">
                        <input type="text" required="" class="form-input pl-2" name="add_test_name" value="{{$notice->notice_contitle}}">
                    </div>
                </div>
                <div class="form-group mx-3 my-2">
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                        <input type="text" required="" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="notice_date" value="{{$notice->notice_date}}">
                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                        </div>
                    </div>
                </div>
                <div class="name-area">
                    <textarea required="" class="form-control" id="exampleFormControlTextarea1" rows="3" name="notice_context">{{$notice->notice_context}}</textarea>
                </div>
            </div>
            <div class="d-flex w-100 my-4">
                <button type="submit" class="btn btn-space btn-primary mx-auto"> 保 存 </button>
            </div>
        </form>
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
        max-width: 800px;
    }
    .name-area{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80%
    }
    .tar-img{
        width: 400px;
        height: 300px;
    }
    .tar-img img{
        width: 100%;
        height: 100%;
        object-fit: fill;
    }
</style>
<script>
    $(document).ready(function(){
        $(document).on('click', "#notice_img", function () {
            var input = document.createElement('input');
            input.type = 'file';
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            input.onchange = e => {
                var file = e.target.files[0];
                var fd = new FormData();
                fd.append('file', file);
                fd.append('province_id', $("#province_id").val());
                $.ajax({
                    headers: {'X-CSRF-TOKEN': csrfToken },
                    type: 'POST',
                    url: "{{url('admin/notice/picture_upload')}}",
                    data: fd,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    cache: false,
                    processData: false,
                    async: false,
                    success: function (data, status) {
                        $("#notice_img").attr('src', "{{url('/')}}"+'/'+data.file_url);
                        $("#notice_url").val("{{url('/')}}"+'/'+data.file_url);
                    }
                });
            }
            input.click();
        });
    });
</script>
<script src="{{asset('admin/vendor/datepicker/moment.js')}}"></script>
<script src="{{asset('admin/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
<script src="{{asset('admin/vendor/datepicker/datepicker.js')}}"></script>


@endsection