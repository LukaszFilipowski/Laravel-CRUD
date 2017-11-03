<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PagesController extends Controller
{
    public function index() {
        $pages = Page::all();
        
        return view('admin.pages.index', compact('pages'));
    }
    
    public function create() {
        
        return view('admin.pages.form');
    }
    
    public function store(Request $request, $id = null) {
        $rules = array(
            'name' => 'required',
            'code' => 'required',
            'content' => 'required',
        );
        $this->validate($request, $rules); 
        
        if ($id != null) {
            $page = Page::find($id); 
        } else {
            $page = new Page;
        }
        
        $page->fill($request->only(['name', 'code', 'content']));
        if ($page->save()) {
            return redirect()->route('admin.pages.index')->withSuccess('Pomyślnie '.($id != null ? 'edytowano' : 'dodano').' stronę!');
        }
        
        return redirect()->route('admin.pages.index')->withErrors('Wystąpił błąd podczas '.($id != null ? 'edycji' : 'dodawania').' strony! Spróbuj ponownie.');
    }
    
    public function edit($id) {
        $page = Page::find($id);
        
        return view('admin.pages.form', compact('page'));
    }
    
    public function delete($id) {
        if (Page::find($id)->delete()) {
            return redirect()->route('admin.pages.index')->withSuccess('Pomyślnie usunięto stronę!');
        }
        
        return redirect()->route('admin.pages.index')->withErrors('Wystąpił błąd podczas usuwania strony! Spróbuj ponownie.');
    }
}
