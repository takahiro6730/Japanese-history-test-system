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
    ジャンル名編集
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">ジャンル名編集</h5>
        <form method="POST" action="{{route('admin.ganre.save')}}" id="validationform">
            <div class="d-flex my-4 justify-content-around flex-column">
                @csrf
                @if($ganre == ''){
                    <input type="hidden" name="ganre_id" id="ganre_id" value="-1">
                }@else
                <input type="hidden" name="ganre_id" id="ganre_id" value="{{$ganre->id}}">
                @endif
                <div class="name-area">
                    <label class="mx-2">ジャンル名</label>
                    <div class="mx-2">
                        <input type="text" required="" class="form-input pl-2" name="add_ganre_name" value="{{$ganre->ganre_name}}">
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
</style>

@endsection