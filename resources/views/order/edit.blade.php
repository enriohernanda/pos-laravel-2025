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
<form action="{{ route('category.update', $edit->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="" class="form-label mt-2">Name</label>
    <input type="text" name="category_name" class="form-control" value="{{ $edit->category_name ?? '' }}" placeholder="Enter your category name" required>
    <button type="submit" class="btn btn-primary mt-2">Save Change</button>
</form>
@endsection
