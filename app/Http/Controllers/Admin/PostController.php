<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts  = Post::all();
        
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $postStatuses  = Post::postStatuses();

        $categories = $this->allCategories();

        $post_tags = Tag::all();

        return view('admin.posts.create', compact('postStatuses', 'categories', 'post_tags'));
    }

    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        $post = Post::create([
            'title'    =>   $data['post_title'],
            'slug'     =>   $data['post_title'],
            'content'  =>   $data['post_content'],
            'status'   =>   $data['post_status'],
            'user_id'  =>   User::first()->id,
        ]);

        if($post and $post instanceof Post)
        {
            $post->categories()->attach($request->input('categories'));
        }
        
        $tags = $request->post_tags;

        foreach($tags as $key => $tag)
        {
            if(intval($tag) == 0)
            {
                $created_tag = Tag::create([
                    'title' => $tag
                ]);

                $tags[] = $created_tag->id;
            }
        }

        $tags = array_map(function($item){
            return intval($item);
        }, $tags);

        array_unique($tags);

        $post->tags()->sync($tags);

        session()->flash('success', 'مقاله با موفقیت ایجاد شد');

        return back();
    }

    public function edit(Post $post)
    {
        $categories     = $this->allCategories();
        $postStatuses   = Post::postStatuses(); 
        $postCategories = $post->categories->pluck('id')->toArray();    
        $post_tags      = $post->tags->pluck('id')->toArray();
        $tags           = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'postStatuses', 'postCategories', 'post_tags', 'tags'));
    }

    public function update(Request $request, Post $post)
    {        
        $post->update([
            'title'    =>   $request->input('post_title'),
            'slug'     =>   $request->input('post_title'),
            'content'  =>   $request->input('post_content'),
            'status'   =>   $request->input('post_status'),
        ]);

        $post->categories()->sync($request->input('categories'));

        $tags = $request->post_tags;

        foreach($tags as $key => $tag)
        {
            if(intval($tag) == 0)
            {
                $created_tag = Tag::create([
                    'title' => $tag
                ]);

                $tags[] = $created_tag->id;
            }
        }

        $tags = array_map(function($item){
            return intval($item);
        }, $tags);

        array_unique($tags);

        $post->tags()->attach($tags);

        session()->flash('success', 'مقاله با موفقیت بروزرسانی شد');

        return redirect()->route('admin.posts');
    }

    private function allCategories()
    {
        $allCategories = Category::all();

        $categories    = $allCategories->groupBy('parent_id')->toArray();

        $categories['root'] = $categories[''];

        unset($categories['']);

        return $categories;
    }
}
