<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\User;
use App\Http\Requests\StoreArtRequest;
use App\Http\Requests\UpdateArtRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$arts = Art::all();
         $query = request()->query('q');

        if ($query === 'digital') {
        $arts = Art::where('art_type', 'digital art')->latest()->get();
    } elseif ($query === 'traditional') {
        $arts = Art::where('art_type', 'traditional art')->latest()->get();
    } else {
        $arts = Art::latest()->get();
    }
        $user = User::first();

        return view('arts.index', ['arts' => $arts, 'user' => $user, 'query' => $query]);
    }

    public function dashboard(Request $request) 
    {
        //$arts = Art::all();

           $query = request()->query('q');

    if ($query === 'digital') {
        $arts = Art::where('art_type', 'digital art')->latest()->get();
    } elseif ($query === 'traditional') {
        $arts = Art::where('art_type', 'traditional art')->latest()->get();
    } else {
        $arts = Art::latest()->get();
    }

        return view('arts.dashboard', ['arts' => $arts, 'query' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('arts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // Validate form input
    $attributes = request()->validate([
        'title' => ['required'],
        'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        'art_type' => ['required', Rule::in(['digital art', 'traditional art'])],
    ]);

    // Store the uploaded image
    $imagePath = request()->file('image')->store('images', 'public');

    // Save to database
    Art::create([
        'title' => $attributes['title'],
        'image_path' => $imagePath,
        'art_type' => $attributes['art_type'],
    ]);

    return redirect('/dashboard')->with('success', 'Artwork uploaded! 🥰');
}

     public function upload(Request $request) {
        

    // // Retrieve file
    $file = request()->file('logo');

    // // Store it (inside storage/app/public/logos)
    $path = $file->store('logos', 'public');

    /// Update the user's logo
     User::first()->update(['logo' => $path]);

         return redirect('/');
     }

   


    public function destroy(Art $art)
    {
        if($art->image_path && Storage::disk('public')->exists($art->image_path)) {
             Storage::disk('public')->delete($art->image_path);
            // Delete the image file from storage
           
        }

        $art->delete();

        return redirect('/dashboard')->with('success', 'Why you delete me? ☹️');
    }
}
