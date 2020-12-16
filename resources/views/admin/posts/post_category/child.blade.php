<li>
    <input type="checkbox" 
    class="form-check-input" 
    name="categories[]" 
    value="{{ $category['id'] }}"
    {{ in_array($category['id'], $categories) ? 'checked' : '' }}
    >
    <label class="form-check-label" >{{ $category['title'] }}</label>

    @if(isset($categories[$category['id']]))
        @include('admin.posts.post_category.items', ['items' => $categories[$category['id']]])
    @endif
</li>