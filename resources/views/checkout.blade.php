@extends('layouts.app')

@section('content')
<h3>Checkout</h3>

@if(empty($cart))
    <div class="alert alert-warning">Your cart is empty!</div>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($cart as $item)
                @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>₱{{ number_format($item['price'], 2) }}</td>
                    <td>₱{{ number_format($total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-end">Total: ₱{{ number_format($grandTotal, 2) }}</h4>

    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success float-end">Place Order</button>
    </form>
@endif
@endsection
