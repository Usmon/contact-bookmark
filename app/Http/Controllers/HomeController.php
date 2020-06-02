<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('home', compact('contacts'));
    }

    public function toggleBookmark($contact_id)
    {
        //Check exists contact 
        Contact::findOrFail($contact_id);
        //Get current user index and User
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        //Toggle conditions
        if ($user->contacts->contains($contact_id)) {
            $message = 'Removed from bookmark!';
            $user->contacts()->detach($contact_id);
        }
        else {
            $message = 'Added to bookmark!';
            $user->contacts()->attach($contact_id);
        }
        //Redirect to home page
        return redirect()->route('home')->with('status', $message);
    }
}
