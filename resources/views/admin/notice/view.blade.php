@extends('admin.admin_layouts.admin_main')
@section('page-title')
    お知らせページ
@endsection
@section('root')
    管理ページ
@endsection
@section('sub-root1')
    お知らせ編集
@endsection
@section('sub-root2')
    お知らせ一覧
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">県名一覧</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">タイツル</th>
                            <th scope="col">作成日</th>
                            <th scope="col">画像</th>
                            <th scope="col"></th>                                                      
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 0;   
                        @endphp

                        @foreach ($notices as $notice)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$notice->notice_contitle}}</td>
                            <td>{{$notice->notice_date}}</td>
                            <td><img class="embed-img" src="{{$notice->notice_img_url}}" alt=""></td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('admin.notice.edit', ['id'=>$notice->id])}}">編集</a>
                                <a  class="btn btn-outline-dark"  href="{{route('admin.notice.delete', ['id'=>$notice->id])}}">削除</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
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
</style>

@endsection