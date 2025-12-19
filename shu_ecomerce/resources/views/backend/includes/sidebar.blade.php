
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/admin/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Category"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Category</span>
                </a>
                <div id="Category" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{url('/category/add')}}">Add Category</a>
                        <a class="collapse-item" href="{{url('/category/manage')}}">Manage Category</a>
                    </div>
                </div>
            </li>


             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Brand"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Brand</span>
                </a>
                <div id="Brand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{url('/brand/add')}}">Add Brand</a>
                        <a class="collapse-item" href="{{url('/brand/manage')}}">Manage Brand</a>
                    </div>
                </div>
            </li>



             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Product"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Product</span>
                </a>
                <div id="Product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{url('/product/add')}}">Add Product</a>
                        <a class="collapse-item" href="{{url('/product/manage')}}">Manage Product</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Order"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Order</span>
                </a>
                <div id="Order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        
                        <a class="collapse-item" href="{{url('/orders')}}">Manage Order</a>
                    </div>
                </div>
            </li>


              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Users"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Users</span>
                </a>
                <div id="Users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        
                        <a class="collapse-item" href="cards.html">Manage Users</a>
                    </div>
                </div>
            </li>



            <!-- Nav Item - Utilities Collapse Menu -->
           

            <!-- Sidebar Message -->
           
        </ul>