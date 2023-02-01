@extends('layouts.app')

@section('content')
    @if (session('success_delete'))
    <div class="alert alert-success">
        {{-- {{ session('success_delete') }} --}}
        Il post con id "{{ session('success_delete') }}" e' stato eliminato correttamente
    </div>
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Slug</th>
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Category</th>
            <th class="text-center" scope="col">Tags</th>
            <th class="text-center" scope="col">View</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($posts as $post)
            <tr>
                <th class="text-center" scope="row">{{ $post->id}}</th>
                <td class="text-center">{{ $post->slug }}</td>
                <td class="text-center">{{ $post->title }}</td>
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
                <td class="text-center"><a href="{{ route('admin.posts.show', ['post' => $post]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                <td class="text-center"><a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td>
                <td class="text-center">
                    <button class="btn btn-danger btn-delete-me" data-id="{{ $post->slug }}"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $posts->links()}}
    </div>

    @include('admin.partials.delete_confirmation', ['delete_name' => 'post'])
@endsection
