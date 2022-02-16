<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllData()
    {
        return Books::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $book = new Books;
        $book->name = $req->name;
        $book->title  = $req->title;
        $book->author_name = $req->author_name;
        $book->total_pages = $req->total_pages;
        $book->published_date = $req->published_date;
        $book->ratings = $req->ratings;
        $result = $book->save();
        if ($result) {
            return ["res" => "data saved"];
        } else {
            return ["res" => "error occured"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Books::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Books = Books::findOrFail($id);
        $Books->update($request->all());
        return $Books;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Books = Books::findOrFail($id);
        $Books->delete();
        return 204;
    }
}
