@extends('layouts.app')

@section('content')
    <form class="row g-3 needs-validation" action="{{ route('admin.categories.store')}}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}">
            <div class="invalid-feedback">
                @error('name')
                    <ul>
                        @foreach ($errors->get() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label for="slug" class="form-label">slug</label>
            <div class="col-9">
                <input type="text" class="form-control col-9 @error('slug') is-invalid @enderror" id="slug" slug="slug" value="{{ old('slug')}}">
                <div class="invalid-feedback">
                    @error('slug')
                        <ul>
                            @foreach ($errors->get() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @enderror
                </div>
                <div class="col-3">
                    <button class="btn btn-primary"  type="button">Generate slug</button>
                </div>
            </div>

        </div>

        <div class="mb-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="description" name="description">{{ old('description')}}</textarea>
            <div class="invalid-feedback">
                @error('description')
                    <ul>
                        @foreach ($errors->get() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Crea</button>
        </div>
    </form>
@endsection
