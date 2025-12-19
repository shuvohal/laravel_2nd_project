





@extends('backend.master')


@section('content')
 <div class="container">

     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order list</h6>
                        </div>
                            

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Customer Name</th>
                                            <th>phone</th>
                                            <th>Price</th>
                                            
                                            <th>Qty</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                      @foreach( $orders as  $order)
                                       <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{$order->total_qty}}</td>
                                        <td>{{$order->billing_address}}</td>
                                        <td>
                                            <a href="{{url('/order/view'.$order->id)}}" class="btn btn-sm btn-info">view</a>
                                            <a href="{{url('/order/delete'.$order->id)}}" class="btn btn-sm btn-danger">delete</a>

                                        </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                

</div>



@endsection