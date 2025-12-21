




@extends('backend.master')


@section('content')
 <div class="container">

     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product list</h6>
                        </div>
                             @if(session()->has('success'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>success!</strong> {{session()->get('success')}}.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                 @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>Brand Name</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                      
                                       @foreach($products as $product)
<tr>
    <td>{{ $loop->iteration }}</td>

    {{-- Category Name --}}
    <td>{{ optional($product->category)->name ?? 'N/A' }}</td>

    {{-- Brand Name --}}
    <td>{{ optional($product->brand)->name ?? 'N/A' }}</td>

    {{-- Product Name --}}
    <td>{{ $product->name }}</td>

    <td>{{ $product->price }}</td>
    <td>{{ $product->qty }}</td>

    <td>
        <img src="{{ asset('/product/'.$product->image) }}" height="80" width="80" />
    </td>

    <td>
        {{ $product->status == 1 ? 'Active' : 'Inactive' }}
    </td>

    <td>
        <a href="#" class="btn btn-sm btn-info">Edit</a>

        @if($product->status == 1)
            <a href="{{ url('/product/active/'.$product->id) }}" class="btn btn-sm btn-warning">Inactive</a>
        @else
            <a href="{{ url('/product/inactive/'.$product->id) }}" class="btn btn-sm btn-success">Active</a>
        @endif

        <a href="#" class="btn btn-sm btn-danger">Delete</a>
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