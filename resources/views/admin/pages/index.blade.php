@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="justify-content-center">
                    <li class="nav-item">
                        <a href="{{route('admin.pages.create')}}" class="nav-link active">Aggiungi Pagina</a>
                    </li>
                </ul>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Titolo</th>
                            <th>Categoria</th>
                            <th>Tags</th>
                            <th>Data Creazione</th>
                            <th>Ultimo aggiornamento</th>
                            <th colspan="3">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->category->name}}</td>
                                <td>
                                    @foreach ($page->tags as $tag)
                                        <div>
                                            {{$tag->name}}
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{$page->created_at}}</td>
                                <td>{{$page->updated_at}}</td>
                                <td><a href="{{route('admin.pages.show', $page->id)}}" class="btn btn-primary">Visualizza</a></td>
                                <td><a href="{{route('admin.pages.edit', $page->id)}}" class="btn btn-secondary">Modifica</a></td>
                                @if (Auth::id() == $page->user_id)
                                    <td>
                                        <form action="{{route('admin.pages.destroy', $page->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Elimina">
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
