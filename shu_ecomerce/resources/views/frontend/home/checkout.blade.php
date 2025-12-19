

@extends('frontend.master')

@section('content')

<div class="content">
    <div class="cart-items">
        <div class="container">
            <h2>My Shopping Bag</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th width="120">Qty</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @php
                    $sum = 0;
                    $qty = 0;
                @endphp

                @forelse($carts as $cart)

                    @php
                        // Ensure numeric values (THIS FIXES YOUR ERROR)
                        $cartQty   = (int) $cart->qty;
                        $cartPrice = (float) $cart->price;
                        $totalPrice = $cartQty * $cartPrice;

                        $sum += $totalPrice;
                        $qty += $cartQty;
                    @endphp

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <img 
                                src="{{ asset('product/' . (optional($cart->product)->image ?? 'no-image.png')) }}"
                                width="100"
                                height="100"
                            >
                        </td>

                        <td>
                            {{ optional($cart->product)->name ?? 'Product not found' }}
                        </td>

                        <td>
                            <form action="{{ url('/cart/product/update/'.$cart->id) }}" method="POST">
                                @csrf
                                <input type="number" name="qty" value="{{ $cartQty }}" min="1" class="form-control mb-1">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>

                        <td>{{ number_format($cartPrice, 2) }}</td>

                        <td>{{ number_format($totalPrice, 2) }}</td>

                        <td>
                            <a href="{{ url('/cart/product/delete/'.$cart->id) }}"
                               onclick="return confirm('Are you sure you want to delete this item?')"
                               class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger">
                            Your cart is empty
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Billing Section --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h3 class="text-center mb-4">Billing Address</h3>

                <form action="{{ url('/order/place') }}" method="POST">
                    @csrf

                    <input type="hidden" name="total_price" value="{{ $sum }}">
                    <input type="hidden" name="total_qty" value="{{ $qty }}">

                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group mb-2">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Address</label>
                        <textarea name="address" rows="4" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Place Order
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
