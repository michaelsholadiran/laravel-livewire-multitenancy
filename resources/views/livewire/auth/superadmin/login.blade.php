 <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                         
                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form wire:submit.prevent="store"  class="user">
                                        <div class="form-group">
                                            <input type="email" wire:model="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                                 @error('email')
                                            <span>{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input wire:model="password" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                                 @error('password')
                                            <span>{{$message}}</span>
                                            @enderror
                                        </div>
                                      
                                        <button class="btn btn-secondary btn-user btn-block">
                                            Login
                                        </button>
                                       
                                    </form>
                                   <hr>
                                   <div class="text-center">
                                        <a class="small" href="{{route('register')}}">Create an Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>