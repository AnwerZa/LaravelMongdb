<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

use App\book;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id=null)
    {
    	// Get the documents from books collection and return the view as well as
    	// compact version of the collection
    	//$books = Book::all();



        $books = DB::collection('books')->get()->sortBy('title');
       // return $books;

      return view('books/index', compact('books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for adding books
        return view('books/bookadd');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // Create new book object and populate the fields with parameters from POST request
        // Save it in database and return the view as well as compact version of the collection
        $book = new book;
		
		$book->isbn =  $request->input('isbn');
		$book->title =  $request->input('title');
		$book->author =  $request->input('author');
		$book->category = $request->input('category') ;
		$book->save();
		
		$books = DB::collection('books')->get();
        //return 'Book record successfully created with id'. $book->id;

        return view('books/index', compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Get the document of given id and return compact version and the view corresponding to show
        
        $book = DB::collection('books')->where('_id', $id)->get();
		//return $book;

		return view('books/bookview', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the document of given id and return the compact version and view corresponding to edit
        $book = DB::collection('books')->where('_id', $id)->get();
		return view('books/bookedit', compact('book'));
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
        // Update the document of given id with parameters from the PUT or PATCH request and return to index view
        
        DB::collection('books')->where('_id', $id)
				  ->update([
				  	'title' => $request->input('title'),
				  	'isbn' => $request->input('isbn'),
				  	'author' => $request->input('author'),
				  	'category' => $request->input('category')
				  	] );

	//	return 'Success update book # ';

		$books = DB::collection('books')->get();
        return view('books/index', compact('books'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete the document of given id and return to the index view with a compact version of the collection
        
        DB::collection('books')->where('_id', $id)->delete();
        
     //   return 'Book record successfully deleted. ';


		$books = DB::collection('books')->get();
        return view('books/index', compact('books'));
    }
}
