@extends('layouts.app')

@section('content')
    @if (session('success_delete'))
    <div class="alert alert-success">
        {{-- {{ session('success_delete') }} --}}
        Il post con id {{ session('success_delete') }} e' stato eliminato correttamente
    </div>
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Image</th>
            <th class="text-center" scope="col">Category</th>
            {{-- serve per non far vedere l'array se e' vuoto --}}
            @if ($post->tags->all())
                <th class="text-center" scope="col">Tags</th>
            @endif
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <h1>{{ $post->title }}</h1>
                <td class="text-center" scope="row">{{ $post->id}}</td>
                <td class="text-center" scope="row"><img src="{{ $post->image}}" alt="{{ $post->title }}" width="100px" height="100px"></td>
                <td class="text-center">
                    @if ($post->category)
                        <a href="{{ route('admin.categories.show', ['category' => $post->category]) }}">{{ $post->category->name ?? '' }}</a>
                    @endif
                </td>
                <td class="text-center">
                    @foreach ($post->tags as $tag)
                    {{-- {{ route('admin.tags.show', ['tag' => $post->tag] )}} --}}
                        <a href="">{{ $tag->name }}{{ $loop->last ? '' : ', ' }}</a>
                    @endforeach
                </td>
                {{-- <th class="text-center" scope="row"><img src="{{ asset('storage/' . $post->uploaded_img )}}" width="100px" height="100px"></th> --}}
                <td class="text-center"><a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td>
                <td class="text-center">
                    <button class="btn btn-danger btn-delete-me" data-id="{{ $post->slug }}"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <p><strong>Contenuto: </strong>{{ $post->content }}</p>
    <td class="text-center"><a href="{{ route('admin.posts.index', ['post' => $post]) }}" class="btn btn-primary">Torna indietro</a></td>

    @include('admin.partials.delete_confirmation',['delete_name' => 'post'])
@endsection
