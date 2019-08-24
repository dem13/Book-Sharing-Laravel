@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Add Book') }}</div>

                <div class="card-body">


                    @if($errors->any())
                       @foreach ($errors->all() as $error)
                          <div class="alert alert-danger" >{{ $error }}</div>
                      @endforeach
                    @endif

                    <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('author') is-invalid @enderror" name="author_id" >
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" >
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="page_count" class="col-md-4 col-form-label text-md-right">{{ __('Page Count') }}</label>

                            <div class="col-md-6">
                                <input id="page_count" type="number" class="form-control @error('page_count') is-invalid @enderror" name="page_count" value="{{ old('page_count') }}" required autocomplete="page_count" autofocus>

                                @error('page_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="short_description" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') }}" required autocomplete="short_description" autofocus>
                                </textarea>

                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <image-select-component name="image" ></image-select-component>

                        <div class="dropdown-divider"></div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
