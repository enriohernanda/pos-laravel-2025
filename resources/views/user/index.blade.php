@extends('app')
@section('content')
{{-- @dd($users) --}}
<div class="d-flex justify-content-end my-2">
    <a href="{{ route('user.create') }}" class="btn btn-primary">ADD <i class="bi bi-plus-circle"></i></a>
</div>
<table class="table table-bordered">
    <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    @foreach ($users as $i => $user)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
            <form action="{{ route('user.destroy', $user->id) }}" class="d-inline" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
