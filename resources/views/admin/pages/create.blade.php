@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="" action="{{route('admin.pages.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="summary">Sommario</label>
                        <input type="text" name="summary" class="form-control">
                    </div>
                    @error('summary')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="body">Testo</label>
                        <textarea name="body" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                    @error('body')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <h4>Categoria</h4>
                        <label for="category_id">Categoria</label>
                        <select name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <h4>Tags</h4>
                        @foreach ($tags as $tag)
                            <label for="tags">{{$tag->name}}</label>
                            <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                        @endforeach
                    </div>
                    @error('tags')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <h4>Photos</h4>
                        @foreach ($photos as $photo)
                            <label for="photos">{{$photo->name}}</label>
                            <input type="checkbox" name="photos[]" value="{{$photo->id}}">
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