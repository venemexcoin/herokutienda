@push('title')
    Products
@endpush
<div>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        table {
            border-collapse: collapse;
        }
        td,th {
            padding: 5px 10px;
        }
        .fa-times {
            color: red;
            margin-left: 10px;
            font-size: 25px;
        }
        @media (max-width: 30em) 
        {
            table {
                width: 100%;
                font-size: .9em;
            }
            table tr {
                display: flex;
                flex-direction: column;
                border: 1px solid grey;
                padding: 1em;
                margin-bottom: 1em; 
            }
            table thead {
                display: none;
            }
            table td[data-title] {
                display: flex;
            }
            table td[data-title]::before {
                content: attr(data-title);
                width: 80px;
                color: silver;
                font-weight: bold; 
            }
            table td,
            table th  
            {
                border: none !important;
            }
            
            .panel-default 
            {
                max-width: 98%;
                margin-left: 3px;
            }
        }
    </style>

    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">New Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('messages'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td data-title="Id">{{$product->id}}</td>
                                        <td data-title="Img product"><img src="{{secure_asset('assets/images/products')}}/{{$product->image}}" width="60"></td>
                                        <td data-title="Name">{{$product->name}}</td>
                                        <td data-title="Status">{{$product->stock_status}}</td>
                                        <td data-title="Price">{{$product->regular_price}}</td>
                                        <td data-title="Offer">{{$product->sale_price}}</td>
                                        <td data-title="category">{{$product->category->name}}</td>
                                        <td data-title="Create In">{{$product->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.editproduct',['product_slug' => $product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, Yor want to delete this Product?') || event.stopImmediatePropagation()" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$product->id}})" ><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
