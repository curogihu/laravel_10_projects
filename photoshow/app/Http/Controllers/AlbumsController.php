<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{
	public function index() {
		return view('albums.index');
	}

	public function create() {
		return view('albums.create');
	}

	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'cover_image' => 'image|max:1999'
		]);

		// show file name with file extension
		// return $request->file('cover_image')->getClientOriginalName();
		$filenameWithExt = $request->file('cover_image')->getClientOriginalName();

		// get just the filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// get just the file extension
		$extension = $request->file('cover_image')->getClientOriginalExtension();

		$filenameToStore = $filename . '_' . time() . '.' . $extension;

		$path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

		return $path;
	}
}
