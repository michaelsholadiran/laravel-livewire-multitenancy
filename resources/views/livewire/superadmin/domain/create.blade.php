<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Domain</h1>
    {{-- <a href="{{route('superadmin.domain.create')}}" class="btn btn-secondary"> </a> --}}
</div>

<div>
    <div class="w-75 mx-auto">
    <form wire:submit.prevent="store" class="user">
        <div class="form-group row">
      
            <div class="col-sm-6 col-5 mb-3 mb-sm-0">
                <input wire:model="domain" type="text" class="form-control form-control-user text-center" id="exampleFirstName"
                    placeholder="Domain">
                    @error('domain')
                    <span>{{$message}}</span>
                    @enderror
            </div>
            
            <div class="col-sm-6 col-7 mt-2">
              <b>.{{config('app.url')}}</b>
            </div>
        </div>
    
     
        <button type="submit"  class="btn btn-dark btn-user">
          Submit
        </button>
      
    </form>
    </div>
</div>


</div>