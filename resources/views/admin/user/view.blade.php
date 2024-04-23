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
    ユーザー一覧
@endsection
@section('main-content')
<div class="page-content">
    <div class="card main-center">
        <h5 class="card-header">ユーザー</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ユーザー名</th>
                            <th scope="col">email</th>
                            <th scope="col" class="text-center">試験申請</th>
                            <th scope="col" class="text-center">試験予約</th>
                            <th scope="col" class="text-center">試験完了</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $i = 0;   
                        @endphp

                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-center">{{$user->get_reserve_count()}}</td>
                            <td class="text-center">{{$user->get_allowed_count()}}</td>
                            <td class="text-center">{{$user->get_passed_count()}}</td>
                            <td>
                                <a  class="btn btn-outline-dark"  href="{{route('admin.user.delete', ['id'=>$user->id])}}">削除</a>
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