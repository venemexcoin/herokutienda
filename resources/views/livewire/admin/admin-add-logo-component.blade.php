@push('title')
    Logo add tienda
@endpush

<div>
    <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New logo
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.homelogo')}}" class="btn btn-success pull-right">All logo</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                    <form class="form-horizontal" wire:submit.prevent="saveLogo">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text" paceholder="Title" class="form-control input-md" wire:model="name" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Link</label>
                            <div class="col-md-4">
                                <input type="text" paceholder="link" class="form-control input-md" wire:model="link" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Image</label>
                            <div class="col-md-4">
                                <input type="file" class="input-file" accept="image/*" wire:model="image"/>
                                @if($image)
                                    <img src="{{$image->temporaryUrl()}}" alt="120">
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
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