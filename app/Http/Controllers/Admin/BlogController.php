<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{
    public function index() 
    {
        $posts = Blog::all();
        
        return view('admin.blog.index', compact('posts'));
    }
    
    public function create() 
    {
        
        return view('admin.blog.form');
    }
    
    public function store(Request $request, $id = null) 
    {
        $rules = array(
            'name' => 'required',
            'content' => 'required',
        );
        $this->validate($request, $rules); 
        
        if ($id != null) {
            $blog = Blog::find($id); 
        } else {
            $blog = new Blog;
        }
        
        $blog->fill($request->only(['name', 'content']));
        if ($blog->save()) {
            return redirect()->route('admin.blog.index')->withSuccess('Pomyślnie '.($id != null ? 'edytowano' : 'dodano').' post!');
        }
        
        return redirect()->route('admin.blog.index')->withErrors('Wystąpił błąd podczas '.($id != null ? 'edycji' : 'dodawania').' posta! Spróbuj ponownie.');
    }
    
    public function edit($id) 
    {
        $post = Blog::find($id);
        
        return view('admin.blog.form', compact('post'));
    }
    
    public function delete($id) 
    {
        if (Blog::find($id)->delete()) {
            return redirect()->route('admin.blog.index')->withSuccess('Pomyślnie usunięto post!');
        }
        
        return redirect()->route('admin.blog.index')->withErrors('Wystąpił błąd podczas usuwania posta! Spróbuj ponownie.');
    }
}
