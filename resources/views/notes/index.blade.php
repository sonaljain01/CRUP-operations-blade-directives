@extends('layout')

@section('content')
    <h1>All Notes</h1>
    <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Add Note</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
           
            </tr>
        </thead>
        <tbody>
            @forelse($notes as $note)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->description }}</td>
                    <td>{{ $note->email }}</td>
                    

                    <td>
                        @switch($note->status)
                            @case('completed')
                                <span class="badge badge-success">Completed</span>
                            @break
                            @case('pending')
                                <span class="badge badge-warning">Pending</span>
                            @break
                            @default
                                <span class="badge badge-secondary">Unknown</span>
                        @endswitch
                    </td>

                    <td>
                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No notes found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
