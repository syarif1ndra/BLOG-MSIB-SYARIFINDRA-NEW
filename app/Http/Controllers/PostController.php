<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::with('category', 'author')->paginate(10); 
        return view('posts.index', compact('posts'));
    }


    public function home()
    {
        $posts = Post::with('category')
                     ->where('is_published', true)
                     ->paginate(10); 

        return view('frontend.home', compact('posts'));
    }


    public function create()
    {

        $categories = Category::all();
        $authors = Author::all(); 
        return view('posts.create', compact('categories', 'authors'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
            'author_id'     => 'required|exists:authors,id',
        ]);

        try {

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }


            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $request->boolean('is_published'), 
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function details($id)
    {
        $post = Post::with(['category', 'author'])->findOrFail($id);
    

        if (!$post->is_published) {
            if (!Auth::check() || Auth::id() !== $post->author_id) {
                abort(404, 'Post not found.');
            }
        }
    

        $posts = Post::with('category')
            ->where('is_published', true)
            ->where('id', '!=', $post->id) 
            ->limit(2) 
            ->get();
    
        return view('frontend.details', compact('posts', 'post'));
    }
    
    

    public function show($id)
    {

        $post = Post::with(['category', 'author'])->findOrFail($id);
    

        return view('posts.show', compact('post'));
    }
    
    

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        return view('posts.edit', compact('post', 'categories', 'authors'));
    }

    
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
            'author_id'     => 'required|exists:authors,id',
        ]);

        try {
           
            $imagePath = $post->image; 
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }


            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $request->boolean('is_published'), 
                'category_id' => $request->category_id,
                'author_id' => $request->author_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
