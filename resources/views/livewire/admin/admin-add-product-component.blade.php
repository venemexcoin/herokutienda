@push('title')
    Add Products
@endpush

<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product 
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">

                            <div class="form-group">
                                <label for="productName" class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name"class="form-control input-md" id="productName" 
                                    wire:model="name"
                                    wire:keyup="generateSlug"
                                    />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="slug" class="col-md-4 control-label">Product slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product slug"class="form-control input-md" id="slug" wire:model="slug"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="shortdescription" class="col-md-4 control-label">Short Decription Name</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Short Description" id="shortdescription"
                                    wire:model="short_description"
                                    >
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Decription Name</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description" id="description"
                                    wire:model="description"
                                    >
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular Price"class="form-control input-md" id="price" wire:model="regular_price" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="saleprice" class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale Price"class="form-control input-md" id="saleprice" wire:model="sale_price" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sku" class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU"class="form-control input-md" id="sku" wire:model="SKU" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="stock" class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select  class="form-control" id="stock" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="feactured" class="col-md-4 control-label">Feactured</label>
                                <div class="col-md-4">
                                    <select  class="form-control" id="feactured" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="quantity" class="col-md-4 control-label">Quantitylabel</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity"class="form-control input-md" id="quantity" wire:model="quantity" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" id="image" wire:model="image"/>
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120" alt="imagen Previa de producto">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="category" class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select  class="form-control" id="category" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush