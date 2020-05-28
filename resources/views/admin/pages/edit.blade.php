@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.pages.index')}}">Torna alla index</a>
                    </li>
                </ul>
                <form class="" action="{{route('admin.pages.update', $page->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" class="form-control" value="{{old('title') ?? $page->title}}">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="summary">Sommario</label>
                        <input type="text" name="summary" class="form-control" value="{{old('summary') ?? $page->summary}}">
                    </div>
                    @error('summary')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="body">Testo</label>
                        <textarea name="body" rows="8" cols="80" class="form-control">{{old('body') ?? $page->body}}</textarea>
                    </div>
                    @error('body')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <h4>Categoria</h4>
                        <label for="category_id">Categoria</label>
                        <select name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(!empty(old('category_id')) || $category->id == $page->category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <h4>Tags</h4>
                        @foreach ($tags as $key => $tag)
                            <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                            <input type="checkbox" name="tags[]" id="tags-{{$tag->id}}" value="{{$tag->id}}" {{((is_array(old('tags')) && in_array($tag->id, old('tags'))) || $page->tags->contains($tag->id)) ? 'checked' : ''}}>
                        @endforeach
                    </div>
                    @error('tags')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <h4>Photos</h4>
                        @foreach ($photos as $photo)
                            <label for="photos">{{$photo->name}}</label>
                            <input type="checkbox" name="photos[]" value="{{$photo->id}}" {{((is_array(old('photos')) && in_array($photo->id, old('photos'))) || $page->photos->contains($photo->id)) ? 'checked' : ''}}>
                        @endforeach
                    </div>
                    @error('photos')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <input type="submit" value="Salva" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
