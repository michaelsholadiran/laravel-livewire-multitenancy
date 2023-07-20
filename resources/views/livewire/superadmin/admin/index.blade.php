<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin</h1>
        <a href="{{route('superadmin.admin.create')}}" class="btn btn-secondary"> Create New</a>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                  
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($list as $l)
                <tr>
                    <th scope="row">{{$l->name}}</th>
                    <th scope="row">{{$l->email}}</th>
                    <th scope="row"> 
                    <a href="{{route('superadmin.admin.edit',['id'=>$l->id])}}" class="btn btn-outline-secondary ">Edit</a> 
                  
                    <a class="btn btn-outline-danger "  wire:click="$emit('destroy',{{$l->id}})">Delete</a> 
                    </th>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
