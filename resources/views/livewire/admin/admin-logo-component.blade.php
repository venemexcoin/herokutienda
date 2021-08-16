@push('title')
    Logo tienda
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
                            Logo Tienda   
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addlogo')}}" class="btn btn-success pull-right">Add New logo</a>
                        </div>
                    </div>
                </div>
                <div class="panel body">
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logos as $logo)
                                <tr>
                                    <td>{{$logo->id}}</td>
                                    <td>{{$logo->name}}</td>
                                    <td>{{$logo->link}}</td>
                                    <td><img src="{{secure_asset('assets/images/Logo')}}/{{$logo->image}}" width="120"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

