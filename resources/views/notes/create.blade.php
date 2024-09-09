@extends('layout')

@section('content')
    <h1>Add Note</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
    
        </div>
        <div class="form-group">
            <label for="description">Email</label>
            <input name="email" id="email" class="form-control" value="{{ old('email') }}"></input>
            @error('email')
                <small class="text-danger">{{ $message }}</small> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
@endsection
