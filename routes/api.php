<?php

use Illuminate\Http\Request;
use App\Contact;

Route::group(['middleware' => 'api'], function () {
    //Pull all data with latest contacts
    Route::get('contacts', function() {
        return Contact::query()->latest()->get();
    });

    //Pull single contact
    Route::get('contact/{id}', function ($id) {
        return Contact::query()->findOrFail($id);
    });
    
    //Add contact
    Route::post('contacts/store', function (Request $request) {
        return Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
    });

    //Update contact
    Route::patch('contact/{id}', function (Request $request, $id) {
        return Contact::findOrFail($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);
    });

    //Delete
    Route::delete('contact/{id}', function ($id) {
        return Contact::findOrFail($id)->delete();
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
