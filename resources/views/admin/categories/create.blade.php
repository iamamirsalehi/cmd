@extends('layouts.dashboard.index')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-title">
                <h4>افزودن دسته بندی</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('partials.alerts')
                    <div class="col-md-12">
                        <div class="basic-form p-10">
                            <form action="{{ route('admin.categories.store') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="categoryTitle">عنوان</label>
                                    <input id="categoryTitle" name="categoryTitle" type="text"
                                           class="form-control input-default hasPersianPlaceHolder"
                                           value="{{ old('categoryTitle') }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="categoryParent">پدر :</label>
                                    <select id="categoryParent" name="categoryParent" class="form-control persianText">
                                        <option value="0">---------</option>
                                        @foreach ($categories as $id => $title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-t-20">
                                    <button type="submit" class="btn btn-primary m-b-10 m-l-5">ثبت اطلاعات
                                    </button>
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