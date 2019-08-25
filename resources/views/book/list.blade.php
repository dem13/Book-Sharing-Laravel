@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12">
            
            <div class="container book-list">

                <div class="book-list-pages">
                    {{ $books->links() }}
                </div>
                
                <div class="row justify-content-md-center">
                    @if($books->isEmpty())
                        <div class="book-list-empty">
                            <h1>No books yet :(</h1>
                            <div>But you can create one <a href="{{ route('book.add') }}">here</a></div>
                        </div>
                    @endif
                    @foreach($books as $book)
                        <!-- <a class="book-list-link" href="{{ route('book.show', ['id' => $book->id]) }}"> -->
                            <a href="{{ route('book.show', ['id' => $book->id]) }}" class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 book-list-item tooltipc">

                                <div class="book-list-item-image">
                                    <img src="{{ asset($book->img) }}">
                                </div>

                                <div class="book-list-item-info">
                                    <div class="book-list-item-title" >
                                        {{ $book->title}}
                                    </div>
                                </div>

                                <span class="tooltiptextv">
                                    <div>{{ $book->title }}</div>
                                    <div><b>By {{ $book->author->name }}</b></div>
                                </span>
                            </a>
                        <!-- </a> -->
                    @endforeach
                </div>

                
                <div class="book-list-pages">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
