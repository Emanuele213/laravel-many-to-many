@extends('layouts.app')

@section('content')
    <form class="row g-3 needs-validation" action="{{ route('admin.posts.update', ['post' => $post])}}" method="post" novalidate enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-12">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            <div class="invalid-feedback">
                @error('title')
                    <ul>
                        @foreach ($errors->get() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <label for="slug" class="form-label">Sugl</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
            <div class="invalid-feedback">
                @error('slug')
                    <ul>
                        @foreach ($errors->get() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                @foreach ($categories as $category)
                {{-- TODO: controllare che la categoria non sia nulla --}}
                    <option value="{{ $category->id }}" @if ($category->id == old('category_id', $post->category->id)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('category_id')
                    <ul>
                        @foreach ($errors->get('category_id') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <fieldset>
                <legend>Tags</legend>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input
                            class="form-check-input @error ('tags') is-invalid @enderror"
                            name="tags[]"
                            @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->all())))
                                checked
                            @endif
                            type="checkbox"
                            value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}"
                        >
                        <label class="form-check-label" for="tag-{{$tag->id}}">
                            {{ $tag->name }}
                        </label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                        @error('tags')
                            <ul>
                                @foreach ($errors->get('tags') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @enderror
                        </div>
                    </div>
                @endforeach
            </fieldset>
        </div>

        <div class="col-md-12">
            <label for="image" class="form-label">URL Image</label>
            <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}">
            <div class="invalid-feedback">
                @error('image')
                    <ul>
                        @foreach ($errors->get() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="mb-12">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Content" name="content">{{ old('content', $post->content) }}</textarea>
            <div class="invalid-feedback">
                @error('content')
                    <ul>
                        @foreach ($errors->get() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="mb-12">
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" placeholder="Excerpt" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
            <div class="invalid-feedback">
                @error('excerpt')
                    <ul>
                        @foreach ($errors->get() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
@endsection
