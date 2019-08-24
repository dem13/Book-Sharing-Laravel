@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header book-title">
                    <div class="tooltipc"><h2>{{ $book->title }}</h2>
                        <span class="tooltiptextc">{{ $book->title }}</span>
                    </div> 
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 book-image">
                                <img src="{{ asset($book->img) }}" style="width: 100%">
                            </div>
                            <div class="col-md-8 ">
                                
                                <div class="book-desc">
                                {{ $book->short_description }}
                                </div>
                                <hr>
                                <div class="book-author">
                                    By <b>{{$book->author->name}}</b>    
                                </div>
                                <hr>
                                <div class="book-pages">
                                    This book contains <b>{{ $book->page_count }}</b> {{ $book->page_count == 1 ? "page": "pages" }} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
