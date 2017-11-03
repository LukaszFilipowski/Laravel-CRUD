<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Insta;

class InstaController extends Controller
{
    public function index() {
        $instas = Insta::all(); 
        
        return view('admin.instas.index', compact('instas'));
    }
    
    public function create() {
        
        return view('admin.instas.form');
    }
    
    public function store(Request $request, $id = null) {
        $rules = array(
            'name' => 'required',
        );
        $this->validate($request, $rules); 
        
        if ($id != null) {
            $insta = Insta::find($id); 
        } else {
            $insta = new Insta;
        }
        
        $insta->fill($request->only('name'));
        if ($insta->save()) {
            return redirect()->route('admin.instas.index')->withSuccess('Pomyślnie '.($id != null ? 'edytowano' : 'dodano').' konto insta!');
        }
        
        return redirect()->route('admin.instas.index')->withErrors('Wystąpił błąd podczas '.($id != null ? 'edycji' : 'dodawania').' konta insta! Spróbuj ponownie.');
    }
    
    public function edit($id) {
        $insta = Insta::find($id);
        
        return view('admin.instas.form', compact('insta'));
    }
    
    public function delete($id) {
        if (Insta::find($id)->delete()) {
            return redirect()->route('admin.instas.index')->withSuccess('Pomyślnie usunięto konto insta!');
        }
        
        return redirect()->route('admin.instas.index')->withErrors('Wystąpił błąd podczas usuwania konta insta! Spróbuj ponownie.');
    }
}
