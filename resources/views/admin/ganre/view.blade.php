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
    県名一覧
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">ジャンル名一覧</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ジャンル名</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 0;   
                        @endphp

                        @foreach ($ganres as $ganre)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$ganre->ganre_name}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('admin.ganre.edit', ['id'=>$ganre->id])}}">編集</a>
                                <a  class="btn btn-outline-dark"  href="{{route('admin.ganre.delete', ['id'=>$ganre->id])}}">削除</a>
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