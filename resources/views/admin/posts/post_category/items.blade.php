<div class="form-check">
    <ul>
        @foreach ($items as $category)
            @include('admin.posts.post_category.child')
        @endforeach
    </ul>
</div>
