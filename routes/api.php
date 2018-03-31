<?php

use Illuminate\Http\Request;
use App\Contact;

Route::group(['middleware' => 'api'], function () {
    //Pull all data with latest contacts
    Route::get('contacts', function() {
        return Contact::query()->latest()->orderBy('created_at', 'desc')->get();
    });

    //Pull single contact
    Route::get('contact/{id}', function ($id) {
        return Contact::query()->findOrFail($id);
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
