@extends('layouts.app')

@section('content')
    @if (session('success_delete'))
    <div class="alert alert-success">
        {{-- {{ session('success_delete') }} --}}
        La category "{{ session('success_delete')->name }}" e' statoa eliminata correttamente
    </div>
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Slug</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">View</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($categories as $category)
            <tr>
                <th class="text-center" scope="row">{{ $category->id}}</th>
                <td class="text-center">{{ $category->slug}}</td>
                <td class="text-center">{{ $category->name}}</td>
                <td class="text-center"><a href="{{ route('admin.categories.show', ['category' => $category]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                <td class="text-center"><a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a></td>
                <td class="text-center">
                    <button class="btn btn-danger btn-delete-me" data-id="{{ $category->slug }}"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @include('admin.partials.delete_confirmation', ['delete_name' => 'category'])
@endsection
