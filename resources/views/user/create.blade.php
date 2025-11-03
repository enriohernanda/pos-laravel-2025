@extends('app')
@section('content')
@if ($errors->any())
        <ul>
            @foreach ($errors->all() as $er)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> {{ $er }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
        </ul>
@endif
<form action="{{ route('user.store') }}" method="post">
    @csrf
    <label for="" class="form-label mt-2">Username</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    <label for="" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    <label for="" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" required>
    <button type="submit" class="btn btn-primary mt-2">Create</button>
</form>
@endsection
