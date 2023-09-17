<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $authors = Author::all();
       return AuthorResource::collection($authors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
	$authors = Author::create($request->all());

        return new AuthorResource($authors);


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
	$author = Author::where('id',$id)->get();
	return $author;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
	$author = Author::where('id',$id)->get();
	$author->update($request->all());

	return new AuthorResource($author); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
	//$author->delete();

        //return response(null,204);
    }
}
