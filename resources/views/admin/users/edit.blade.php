@extends('layouts.dashboard.index')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-title">
                <h4>ثبت نام کاربر جدید</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('partials.alerts')
                    <div class="col-md-12">
                        <div class="basic-form p-10">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" >
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="userFullName">نام و نام خانوادگی</label>
                                    <input id="userFullName" name="userFullName" type="text"
                                           class="form-control input-default hasPersianPlaceHolder"
                                           value="{{ old('userFullName', $user->name) }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">آدرس ایمیل</label>
                                    <input id="userEmail" name="userEmail" type="text"
                                           class="form-control input-default hasPersianPlaceHolder"
                                           value="{{ old('userEmail', $user->email) }}"
                                           >
                                </div>
                                <div class="form-group">
                                    <label for="userRole">نقش کاربری :</label>
                                    <select id="userRole" name="userRole" class="form-control persianText">
                                        @foreach ($roles as $key => $name)
                                            <option value="{{ $key }}" {{ $user->role == $key ? 'selected' : ''}}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">رمز عبور</label>
                                    <input id="password" name="password" type="password"
                                           class="form-control input-default hasPersianPlaceHolder"
                                           value="{{ old('userPassword') }}"
                                           >
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">تکرار رمز عبور</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                           class="form-control input-default hasPersianPlaceHolder"
                                           value="{{ old('password_confirmation') }}"
                                           >
                                </div>
                                <div class="form-group m-t-20">
                                    <button type="submit" class="btn btn-primary m-b-10 m-l-5">ثبت اطلاعات
                                    </button>
                                    <a href="{{ route('admin.users') }}" class="btn btn-danger m-b-10 m-l-5 float-right">بازگشت
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection