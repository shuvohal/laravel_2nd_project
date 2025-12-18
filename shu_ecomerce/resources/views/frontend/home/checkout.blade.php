


@extends('frontend.master')

@section('content')
 <div class="content">
    <div class="cart-items">
        <div class="container">
            <h2>My shoping Bag</h2>
            <table class="table table-border">
                <tr>
                    <th>SL</th>
                    <th>image</th>
                    <th>Nmae</th>

                    <th>Qty</th>
                    <th>price</th>
                    <th>total price</th>
                    <th>Action</th>
                </tr>
                     @foreach($carts as $cart)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>

                        <img src="{{asset('/product/'.$cart->product->image)}}" height="150" width="150"/>
                    </td>
                    <td>{{$cart->product->name}}</td>
                    <td>
                        <form action="{{url('/cart/product/update/'.$cart->id)}}" method="post">
                           @csrf
                            <input type="number" name="qty" value="{{$cart->qty}}"/><button type ="submit" class="btn btn-sm btn-primmary">update</button>
                        </form>
                    </td>
                    <td>{{$cart->price}}</td>
                    <td>{{$cart->qty*$cart->price}}</td>
                    <td>
                       
                     <a href="{{url('/cart/product/delete/'.$cart->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-sm btn-danger">Delete</a>
                  </td>

               </tr>
            @endforeach
            </table>
        </div>
    </div>
 </div>

@endsection