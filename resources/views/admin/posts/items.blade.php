<tr>
    <th scope="row">{{ $post->id }}</th>
    <td>{{ $post->title }}</td>
    <td>{{ $post->author }}</td>
    <td>{{ $post->view_count }}</td>
    <td>{{ $post->created_at }}</td>
    <td><span class="badge badge-info">{{ $post->status }}</span></td>
    <td>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info">بروزرسانی</a>
    </td>
</tr>
