<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class BookmarksController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	return view('home');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'url' => 'required'
    	]);

    	// create bookmark
    	$bookmark = new Bookmark;
    	$bookmark->name = $request->input('name');
    	$bookmark->url = $request->input('url');
    	$bookmark->description = $request->input('description');
    	$bookmark->user_id = auth()->user()->id;	// ログインしたユーザーID

    	$bookmark->save();

    	return redirect('/home')->with('success', 'Bookmark Added');
    }
}
