<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Domain</h1>
        <a href="{{route('superadmin.domain.create')}}" class="btn btn-secondary"> Create New</a>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                  
                    <th scope="col">Domain</th>
                    <th scope="col">Tenant Id</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($list as $l)
                <tr>
                    <th scope="row">{{$l->domain}}</th>
                    <th scope="row">{{$l->tenant_id}}</th>
                    <th scope="row"> 
                    <a href="{{route('superadmin.domain.edit',['id'=>$l->id])}}" class="btn btn-outline-secondary ">Edit</a> 
                  
                    <a class="btn btn-outline-danger "  wire:click="$emit('destroy',{{$l->id}})">Delete</a> 
                    </th>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
