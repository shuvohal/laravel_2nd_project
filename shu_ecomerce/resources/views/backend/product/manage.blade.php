




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
                                      
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                

</div>



@endsection