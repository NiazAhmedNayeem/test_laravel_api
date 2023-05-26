<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function add_blog()
    {
        return view('blogs.index');
    }
    public function create(Request $request)
    {
        Blog::createBlog($request);
        return redirect('/manage-blogs')->with('message', 'Blog Create Successfully, Thank you.');
    }
    public function manage_blogs()
    {
        return view('blogs.manage', ['blogs' => Blog::orderBy('id' , 'desc')->get()]);
    }
    public function edit($id)
    {
        return view('blogs.edit',['blog' => Blog::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Blog::updateBlog($request, $id);
        return redirect('/manage-blogs')->with('message', 'Blog Update Successfully, Thank you.');
    }
    public function delete($id)
    {
        Blog::deleteBlog($id);
        return redirect('/manage-blogs')->with('message', 'Blog Delete Successfully, Thank you.');
    }
}
