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
    
    public function store(Request $request) {
        $this->validate($request, Artist::validation()); 
        
        $artist = new Artist;
        $artist->accepted = 1;
        $artist->fill($request->only(['name', 'category', 'contact_mail', 'contact_instagram', 'contact_facebook', 'description']));
        
        if ($artist->save()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie dodano artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas dodawania artysty! Spróbuj ponownie.');
    }
    
    public function update(Request $request, $id) {
        
        $this->validate($request, Artist::validation()); 
        
        $artist = Artist::find($id); 
        $artist->fill($request->only(['name', 'category', 'contact_mail', 'contact_instagram', 'contact_facebook', 'description']));
        
        if ($artist->save()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie edytowano artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas edycji artysty! Spróbuj ponownie.');
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
