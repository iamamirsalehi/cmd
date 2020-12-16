@extends('layouts.dashboard.index');


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>لیست مقالات </h4>
            </div>
            @include('partials.alerts')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @include('admin.posts.columns')
                        </thead>
                        <tbody>
                            @each('admin.posts.items', $posts, 'post')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection