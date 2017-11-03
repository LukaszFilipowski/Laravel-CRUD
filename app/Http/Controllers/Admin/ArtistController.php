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
        $artist->save();
        
        $i = 0;
        while ($request->has('achievement_name'.$i)) {
            $a = new Achievement;
            $a->name = $request->get('achievement_name'.$i);
            $a->content = $request->get('achievement_content'.$i);
            $artist->achievements()->save($a);
            $i++;
        }
        
        $i= 0;
        while ($request->has('item_name'.$i)) {
            $item = new Portfolio;
            $item->name = $request->get('item_name'.$i);
            $item->content_type = $request->get('item_content_type'.$i);
            if ($request->get('item_content_type'.$i) == 0) {
                $item->addImage($request->file('item_content'.$i));
            } else {
                $item->content = $request->get('item_content'.$i);
            }
            $artist->portfolioItems()->save($item);
            $i++;
        }
        
        if ($artist->save()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie dodano artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas dodawania artysty! Spróbuj ponownie.');
    }
    
    public function edit($id) {
        $artist = Artist::find($id);
        
        return view('admin.artists.form', compact('artist'));
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, Artist::validation()); 
        
        $artist = Artist::find($id); 
        $artist->fill($request->only(['name', 'category', 'contact_mail', 'contact_instagram', 'contact_facebook', 'description']));
        
        $i = 0;
        while ($request->has('achievement_name'.$i)) {
            if ($request->has('achievement_id'.$i)) {
                $a = Achievement::find($request->get('achievement_id'.$i));
            } else {
                $a = new Achievement;
            }
            $a->name = $request->get('achievement_name'.$i);
            $a->content = $request->get('achievement_content'.$i);
            $artist->achievements()->save($a);
            $i++;
        }
        
        $i= 0;
        while ($request->has('item_name'.$i)) {
            if ($request->has('item_id'.$i)) {
                $item = Portfolio::find($request->get('item_id'.$i));
                $oldContentType = $item->content_type;
            } else {
                $item = new Portfolio;
                $oldContentType = -1;
            }
            $item->name = $request->get('item_name'.$i);
            $item->content_type = $request->get('item_content_type'.$i);
            if ($request->get('item_content_type'.$i) == 0) {
                $item->addImage($request->file('item_content'.$i), $oldContentType == 0 && $request->has('item_id'.$i));
            } else {
                $item->content = $request->get('item_content'.$i);
            }
            $artist->portfolioItems()->save($item);
            $i++;
        }
        
        if ($artist->save()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie edytowano artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas edycji artysty! Spróbuj ponownie.');
    }
    
    public function delete($id) {
        if (Blog::Artist($id)->delete()) {
            return redirect()->route('admin.artists.index')->withSuccess('Pomyślnie usunięto artystę!');
        }
        
        return redirect()->route('admin.artists.index')->withErrors('Wystąpił błąd podczas usuwania artysty! Spróbuj ponownie.');
    }
}
