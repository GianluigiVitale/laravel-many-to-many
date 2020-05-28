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
                <h2>{{$page->title}}</h2>
                <h3>Categoria: {{$page->category->name}}</h3>
                <small>Scritto da: {{$page->user->name}}</small>
                <small>Aggiornato il: {{$page->updated_at}}</small>
                <div>
                    {{$page->body}}
                </div>
                @if ($page->tags->count() > 0)
                    <h4>Tags</h4>
                    <ul>
                        @foreach ($page->tags as $tag)
                            <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>
                @endif
                @if ($page->photos->count() > 0)
                    <h4>Photos</h4>
                    <ul>
                        @foreach ($page->photos as $photo)
                            <li>{{$photo->name}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
