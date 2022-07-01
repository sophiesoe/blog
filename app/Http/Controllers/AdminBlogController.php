<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index() {
        return view('admin.blogs.index',[
            'blogs' => Blog::latest()->paginate(6)
        ]);
    }

    public function create() {
        return view('admin.blogs.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store() {
        
        $formData= request()->validate([
            'title'=>['required'],
            'intro'=>['required'],
            'slug'=>['required',Rule::unique('blogs', 'slug')],
            'category_id'=>['required',Rule::exists('categories', 'id')],
            'body'=>['required'],
        ]);
        $formData['user_id']=auth()->id();
        $formData['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        
        Blog::create($formData);
        return redirect('/');
    }
    public function destroy(Blog $blog) {
        $blog->delete();

        return back()->with('success', 'Your post is deleted!');
        
    }

    public function edit(Blog $blog) {
        return view('admin.blogs.edit',[
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }
    
    public function update(Blog $blog) {
        
        $formData= request()->validate([
            'title'=>['required'],
            'intro'=>['required'],
            'slug'=>['required',Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'category_id'=>['required',Rule::exists('categories', 'id')],
            'body'=>['required'],
        ]);
        $formData['user_id']=auth()->id();
        $formData['thumbnail']=request()->file('thumbnail')? 
        request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;
        
        $blog->update($formData);
        return redirect('/admin/blogs')->with('success', 'Your post is updated!');
    }
}
