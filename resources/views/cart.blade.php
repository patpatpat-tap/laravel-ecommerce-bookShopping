@extends('layouts.app')

@section('content')
<h3>Your Cart</h3>

@if(empty($cart))
    <div class="alert alert-warning">Your cart is empty!</div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($cart as $id => $item)
                @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>₱{{ number_format($item['price'], 2) }}</td>
                    <td>₱{{ number_format($total, 2) }}</td>
                    <td><a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-end">Grand Total: ₱{{ number_format($grandTotal, 2) }}</h4>
    <a href="{{ route('checkout') }}" class="btn btn-primary float-end">Proceed to Checkout</a>
@endif
@endsection
