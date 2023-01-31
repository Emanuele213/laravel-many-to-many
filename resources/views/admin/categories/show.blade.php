@extends('layouts.app')

@section('content')
    @if (session('success_delete'))
    <div class="alert alert-success">
        {{-- {{ session('success_delete') }} --}}
        La category {{ session('success_delete')->name }} e' stata eliminata correttamente
    </div>
    @endif
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-sm-6 col-md-4 g-2">
                <div class="card h-100">
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text flex-grow-1">{{ $post->excerpt }}</p>
                        <a href="{{ route('admin.posts.show', ['post' => $post])}}" class="btn btn-primary">leggi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('admin.categories.index', ['post' => $post]) }}" class="btn btn-primary mt-3">Torna indietro</a>
    {{ $posts->links() }}
    @include('admin.partials.delete_confirmation', ['delete_name' => 'category'])
@endsection
