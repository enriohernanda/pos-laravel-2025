@extends('app')
@section('content')
@section('title', 'Data Categories')
{{-- @dd($users) --}}
<div class="d-flex justify-content-end my-2">
    <a href="{{ route('order.create') }}" class="btn btn-primary">Add Order <i class="bi bi-plus-circle"></i></a>
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Order Number</th>
        <th>Amount</th>
        <th>Change</th>
        <th>Subtotal</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach ($datas as $i => $data)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $data->order_name }}</td>
        <td>{{ $data->order_amount }}</td>
        <td>{{ $data->order_change }}</td>
        <td>{{ $data->order_subtotal }}</td>
        <td>{{ $data->order_status }}</td>
        <td>{{ $data->order_date }}</td>
        <td>
            <a href="{{ route('order.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
            <form action="{{ route('order.destroy', $data->id) }}" class="d-inline" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
