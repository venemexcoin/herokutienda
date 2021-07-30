@push('title')
    Admin Category
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
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">New Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                <strong>Success</strong> {{Session::get('message')}}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Category name</th>
                                <th>Slug</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td data-title="ID">{{$category->id}}</td>
                                    <td data-title="category">{{$category->name}}</td>
                                    <td data-title="Slug">{{$category->slug}}</td>
                                    <td>
                                        <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" wire:click.prevent="deleteCategory({{$category->id}})" ><i class="fa fa-times "></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
