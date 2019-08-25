<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Create new controller instanse
     */
    public function __construct()
    {
    	$this->middleware('auth')->except(['show', 'list']);
    }

    /**
     *  Display book by id
     * 
     * @param  $id int
     */
    public function show($id)
    {
    	$book = Book::with(['author', 'user'])->findOrFail($id);

    	if(empty($book->author) || empty($book->user)){
    		//Author or User are probably deleted
    		abort(404);
    	}

    	return view('book.show', compact('book'));
    }

    /**
     * List of all books
     * 
     * @param  \Illuminate\Http\Request $request
     */
    public function list(Request $request)
    {
    	$query = Book::with(['author']);

    	$query->orderBy('id', 'desc');

    	$books = $query->paginate(config('book.booksPerPage'));

    	return view('book.list', compact('books'));
    }

    /**
     * Display book creating form
     */
    public function add()
    {
    	$authors = Author::get()->all();

    	return view('book.store', compact('authors'));
    }

    /**
     * Store book
     * 
     * @param  \App\Http\Requests\StoreBook
     */
    public function store(StoreBook $request)
    {
    	$book = $request->validated();

        if(!empty($request->image)){
            $book['image'] = $request->image->store(config('book.uploadImagePath'), 'public');
        }

    	$book['user_id'] = auth()->user()->id;

    	$book = Book::create($book);

    	if(!$book->exists){
    		return redirect()->back()->withErrors(['error' => 'Unable to add a book']);
    	}

    	return redirect()->route('book.show', ['id' => $book->id]);
    }
}
