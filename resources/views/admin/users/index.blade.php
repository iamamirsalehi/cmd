@extends('layouts.dashboard.index');


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>لیست کاربران </h4>
            </div>
            @include('partials.alerts')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>تاریخ ثبت نام</th>
                            <th>نقش</th>
                            <th>وضعیت</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><span class="badge badge-info">{{ $roles[$user->role] }}</span></td>
                                <td><span class="badge badge-primary">{{ $user->status == $status['active'] ? 'فعال' : 'غیر فعال'  }}</span></td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info">بروزرسانی</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection