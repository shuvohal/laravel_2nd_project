


@extends('backend.master')


@section('content')
 <div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2"></div>
             <div class="col-md-8">

             @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>success!</strong> {{session()->get('success')}}.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if ($errors->any())

               <div class="alert alert-danger">

                  <ul>

               @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

          </ul>

        </div>

@endif
                <div class="card">
                    <div class="card-header">Add Product</div>
                    <div class="card-body">
                        <form action="{{url('/product/store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                             <div class="form-group">
                                <label>Category</label>
                               <select class="form-control" name="category_id"> 
                                <option selected disabled>-------Select A Category---------</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                
                                
                               </select>
                            </div>

                            <div class="form-group">
                                <label>Brand</label>
                               <select class="form-control" name="brand_id"> 
                                <option selected disabled>-------Select A Brand---------</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                                
                                
                               </select>
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type ="text" name="name" value="{{ old('name') }}" class="form-control" placeholder ="Enter category name"/>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type ="text" name="price" value="{{ old('price') }}" class="form-control" placeholder ="Enter product price"/>
                            </div>

                             <div class="form-group">
                                <label>Discount Price {optional}</label>
                                <input type ="text" name="discount_price" value="{{ old('discount_price') }}" class="form-control" placeholder ="Enter product discount price"/>
                            </div>

                             <div class="form-group">
                                <label>Qty</label>
                                <input type ="number" name="qty" value="{{ old('qty') }}" class="form-control" placeholder ="Enter product qty"/>
                            </div>

                             <div class="form-group">
                                <label>Color</label>
                                <input type ="text" name="color" value="{{ old('color') }}" class="form-control" placeholder ="Enter product color"/>
                            </div>

                             <div class="form-group">
                                <label>Size</label>
                                <input type ="text" name="size" value="{{ old('size') }}" class="form-control" placeholder ="Enter product size"/>
                            </div>

                             <div class="form-group">
                                <label>Short Description</label>
                                <textarea class ="form-control" rows="5" name="short_description" placeholder="Short description">{{ old('short_description') }} </textarea>
                            </div>

                             <div class="form-group">
                                <label>Long Description</label>
                                <textarea class ="form-control"  name="long_description" id="long_description" placeholder="Long description">{{ old('long_description') }} </textarea>
                            </div>

                             <div class="form-group">
                                <label>Image</label>
                                <input type ="file" name="image"  class="form-control" />
                            </div>

                             <div class="form-group">
                                <label>Gallery Image</label>
                                <input type ="file" name="images[]" multiple  class="form-control" />
                            </div>


                             <div class="form-group">
                                <label>Publication Status</label>
                               <select class="form-control" name="status"> 
                                <option selected disabled>-------Select A Status---------</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                               </select>
                            </div>
                            <button type ="submit" class="btn btn-block btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
             </div>
              <div class="col-md-2"></div>
        </div>
    </div>
 </div>






@endsection