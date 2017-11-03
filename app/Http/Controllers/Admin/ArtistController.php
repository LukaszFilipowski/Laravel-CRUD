<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artist;
use App\Achievement;
use App\Portfolio;

class ArtistController extends Controller
{
    public function index() {
        $artists = Artist::all();
        
        return view('admin.artists.index', compact('artists'));
    }
    
    public function create() {
        
        return view('admin.artists.form');
    }
    
    public function store(Request $request, $id = null) {
        $rules = array(
            'name' => 'required',
            'category' => 'required',
            'contact_mail' => 'required',
            'contact_instagram' => 'required',
            'contact_facebook' => 'required',
            'description' => 'required',
        );
        $this->validate($request, $rules); 
        
        if ($id != null) {
            $artist = Artist::find($id); 
        } else {
            $artist = new Artist;
            $artist->accepted = 1;
        }
        
        $artist->fill($request->only(['name', 'category', 'contact_mail', 'contact_instagram', 'contact_facebook', 'description']));
        
        if ($artist->save()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie dodano artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas dodawania artysty! Spróbuj ponownie.');
    }
    
    public function edit($id) {
        $artist = Artist::find($id);
        
        return view('admin.artists.form', compact('artist'));
    }
    
    public function delete($id) {
        if (Blog::Artist($id)->delete()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie usunięto artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas usuwania artysty! Spróbuj ponownie.');
    }
}
