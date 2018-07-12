<?php

use Illuminate\Http\Request;
use App\Contact;

Route::group(['middleware' => 'api'], function(){
	// fetch Contacts

	Route::get('contacts', function() {
		return Contact::latest()->orderBy('created_at', 'desc')->get();
	});

	// get single contact
	Route::get('contact/{id}', function($id) {
		return Contact::findOrFail($id);
	});

	// add contact
	Route::post('contact/store', function(Request $request) {
		return Contact::create(['name' => $request->input(['name'])
								,'email' => $request->input(['email'])
								,'phone' => $request->input(['phone'])
							]);
	});

	// update contact
	Route::patch('contact/{id}', function(Request $request, $id){
		Contact::findOrFaild($id)->update(['name' => $request->input(['name'])
								,'email' => $request->input(['email'])
								,'phone' => $request->input(['phone'])
							]);
	});

	// delete contact
	Route::delete('contact/{id}', function() {
		return Contact::destroy($id);
	});
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
