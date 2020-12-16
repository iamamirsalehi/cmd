@extends('layouts.dashboard.index')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-title">
                <h4>ویرایش مقاله جدید - {{ $post->title }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('partials.alerts')
                    <div class="col-md-12">
                        <div class="basic-form p-10">
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" >
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="post_title">عنوان</label>
                                    <input id="post_title" name="post_title" type="text"
                                           class="form-control input-default hasPersianPlaceHolder"
                                           value="{{ old('post_title', $post->title) }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="post_content">بدنه</label>
                                    <textarea name="post_content" id="post_content" class="form-control" style="height: auto" rows="10">
                                        {{ old('post_content', $post->content) }}
                                    </textarea>
                                </div>

                                @include('admin.posts.post_category.items', ['items' => $categories['root']])

                                <br> <br>
                                <div class="form-group">
                                    <label for="post_status">تگ ها :</label>
                                    <select style="min-width: 300px" id="post_tags" name="post_tags[]" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $post_tags) ? 'selected' : '' }}>{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="post_status">وضعیت مقاله :</label>
                                    <select id="post_status" name="post_status" class="form-control persianText">
                                        @foreach ($postStatuses as $postStatusId => $postStatusTitle)
                                            <option value="{{ $postStatusId }}" {{ ($post->status == $postStatusId) ? 'selected' : '' }}>{{ $postStatusTitle }}</option>
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