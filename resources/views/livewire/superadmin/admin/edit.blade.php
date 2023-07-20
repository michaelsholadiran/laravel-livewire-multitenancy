<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin</h1>
    <a href="{{route('superadmin.admin.index')}}" class="btn btn-secondary"> Back</a>
</div>

<div>
    <div class="w-75 mx-auto">
     <form wire:submit.prevent="update" class="user">
        <div class="form-group row">
      
            <div class="col-sm-6 col-5 mb-3 mb-sm-0">
                <input wire:model="name" type="text" class="form-control form-control-user " id="exampleFirstName"
                    placeholder="Name">
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
            </div>
             <div class="col-sm-6 col-5 mb-3 mb-sm-0">
                <input wire:model="email" type="email" class="form-control form-control-user " id="exampleFirstName"
                    placeholder="Email">
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
            </div>
             
            
           
        </div>

         <div class="form-group row">
             <div class="col-sm-6 col-5 mb-3 mb-sm-0">
           
                <select multiple wire:model="tenant_ids" type="text" class="form-control form-control-user " id="exampleFirstName"
                    placeholder="password">
                    @foreach($domains as $d)
                     {{-- @if(in$d->tenant_id ==) @endif --}}
                          <option value="{{$d->tenant_id}}">{{$d->tenant_id}}</option>
                    @endforeach
                  
                    </select>
                    @error('password')
                    <span>{{$message}}</span>
                    @enderror
            </div>
        </div>


     
     
        <button type="submit"  class="btn btn-dark btn-user">
          Submit
        </button>
      
    </form>
    </div>
</div>


</div>