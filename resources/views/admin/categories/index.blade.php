@extends('layouts.dashboard.index');


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>لیست دسته بندی ها </h4>
            </div>
            @include('partials.alerts')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام </th>
                            <th>پدر</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categoty)
                            <tr>
                                <th scope="row">{{ $categoty->id }}</th>
                                <td>{{ $categoty->title }}</td>
                                <td>{{ optional($categoty->parent)->title }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $categoty->id) }}" class="btn btn-info">بروزرسانی</a>
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