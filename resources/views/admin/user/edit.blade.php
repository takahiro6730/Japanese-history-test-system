@extends('admin.admin_layouts.admin_main')
@section('page-title')
    管理ページ
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    県名編集
@endsection
@section('sub-root2')
    県名編集
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">県名編集</h5>
        <form method="POST" action="{{route('admin.prefecture.save')}}" id="validationform">
            <div class="d-flex my-4 justify-content-around flex-column">
                @csrf
                @if($province == ''){
                    <input type="hidden" name="province_id" id="province_id" value="-1">
                }@else
                <input type="hidden" name="province_id" id="province_id" value="{{$province->id}}">
                @endif
                <div class="w-100 d-flex justify-content-center my-3">
                    <div class="tar-img">
                        <img src="{{$province->img_url}}" id="province_img" alt="">
                    </div>
                    <input type="hidden" name="province_url" id="province_url" value="{{$province->img_url}}">
                </div>
                <div class="name-area">
                    <label class="mx-2">県名</label>
                    <div class="mx-2">
                        <input type="text" required="" class="form-input pl-2" name="add_test_name" value="{{$province->name}}">
                    </div>
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
        $(document).on('click', "#province_img", function () {
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
                    url: "{{url('admin/prefecture/picture_upload')}}",
                    data: fd,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    cache: false,
                    processData: false,
                    async: false,
                    success: function (data, status) {
                        alert(data.file_url);
                        $("#province_img").attr('src', "{{url('/')}}"+'/'+data.file_url);
                        $("#province_url").val("{{url('/')}}"+'/'+data.file_url);
                    }
                });
            }
            input.click();
        });
    });
</script>

@endsection