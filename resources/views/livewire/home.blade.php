{{-- <div>

    <main class="profile-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <form wire:submit.prevent='submit'>

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Full
                                        Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control"
                                            wire:model.defer='full_name' name="full_name" value="{{$full_name}}"
                                            required autofocus>
                                        @if ($errors->has('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>
                                    <div class="col-md-6">
                                        <input type="file" id="picture" wire:model.defer='picture' name="picture">
                                        @if($path)
                                        <img src="{{ asset($path) }}" width="100px" height="100px" />
                                        @endif
                                        @if ($errors->has('picture'))
                                        <span class="text-danger">{{ $errors->first('picture') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                                    <div class="col-md-6">
                                        <textarea rows="3" cols="40" name="bio"
                                            wire:model.defer='bio'> @if($bio) {{$bio}} @endif</textarea>
                                        @if ($errors->has('bio'))
                                        <span class="text-danger">{{ $errors->first('bio') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Date of
                                        birth</label>
                                    <div class="col-md-6">
                                        <input type="date" id="date_of_birth" class="form-control"
                                            wire:model.defer='date_of_birth' name="date_of_birth" @if
                                            ($date_of_birth)value="{{$full_name}}" @endif>
                                        @if ($errors->has('date_of_birth'))
                                        <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                        @endif
                                    </div>
                                </div>

                                @if (session()->has('error_message'))
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4 text-danger">
                                        {{session()->get('error_message')}}
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div> --}}
<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a>Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Password</div>
                        </div>
                        <div class="card-body">
                            <div class="text-center chat-image mb-5">
                                <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                    <a class="" href="#"><img alt="avatar"
                                            src="{{ $path ? asset($path) : '../assets/images/users/7.jpg' }}"
                                            class="brround"></a>
                                </div>
                                <div class="main-chat-msg-name">
                                    <a href="#">
                                        <h5 class="mb-1 text-dark fw-semibold">{{$name}}</h5>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 pt-0 fs-13">Web Designer</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                    <a class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 form-control" type="password" @error('password.current')
                                        is-invalid @enderror wire:model.defer='password.current'
                                        placeholder="Current Password" autocomplete="current-password">
                                </div>
                                @error('password.current')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message
                                        }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                    <a class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100  form-control" type="password"
                                        wire:model.defer='password.new' placeholder="New Password"
                                        @error('password.new') is-invalid @enderror autocomplete="new-password">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                    <a class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                    </a>
                                    <input
                                        class="input100 @error('password.confirm') is-invalid  @enderror form-control"
                                        type="password" wire:model.defer='password.confirm'
                                        placeholder="Confirm Password" autocomplete="new-password">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <a wire:click='updatePassword' class="btn btn-primary">Update</a>
                            <a wire:click='cancelPassword' class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    {{-- <div class="card panel-theme">
                        <div class="card-header">
                            <div class="float-start">
                                <h3 class="card-title">Contact</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body no-padding">
                            <ul class="list-group no-margin">
                                @if ($email)
                                <li class="list-group-item d-flex ps-3">
                                    <div class="social social-profile-buttons me-2">
                                        <a class="social-icon text-primary"><i class="fe fe-mail"></i></a>
                                    </div>
                                    <a class="my-auto">{{$email}}</a>
                                </li>
                                @endif
                                @if ($website)
                                <li class="list-group-item d-flex ps-3">
                                    <div class="social social-profile-buttons me-2">
                                        <a class="social-icon text-primary"><i class="fe fe-globe"></i></a>
                                    </div>
                                    <a class="my-auto">{{$website}}</a>
                                </li>
                                @endif
                                @if ($contact_number)
                                <li class="list-group-item d-flex ps-3">
                                    <div class="social social-profile-buttons me-2">
                                        <a class="social-icon text-primary"><i class="fe fe-phone"></i></a>
                                    </div>
                                    <a class="my-auto">{{$contact_number}}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">First Name</label>
                                        <input type="text" class="form-control" wire:model.defer='first_name'
                                            id="exampleInputname" placeholder="First Name">
                                        @include('includes.check-error-message',['error'=>'first_name'])
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname1">Last Name</label>
                                        <input type="text" class="form-control" wire:model.defer='last_name'
                                            id="exampleInputname1" placeholder="Enter Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input type="file" class="form-control" wire:model.defer='picture'
                                    id="picture">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputnumber">Contact Number</label>
                                <input type="number" class="form-control" wire:model.defer='contact_number'
                                    id="exampleInputnumber" placeholder="Contact number">
                            </div>
                            <div class="form-group">
                                <label class="form-label">About Me</label>
                                <textarea wire:model.defer='bio' class="form-control" rows="6">
                                        My bio.........
                                  </textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input class="form-control" wire:model.defer='website' placeholder="http://splink.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Date Of Birth</label>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <select wire:model.defer='day' class="form-control select2 form-select">
                                            @for ($i=1; $i<=31; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <select wire:model.defer='month' class="form-control select2 form-select">
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <select wire:model.defer='year' class="form-control select2 form-select">
                                            @for ($i=1960; $i<=2023; $i++) <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a wire:click='submit' class="btn btn-success my-1">Save</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Delete Account</div>
                        </div>
                        <div class="card-body">
                            <p>Its Advisable for you to request your data to be sent to your Email.</p>
                            <label class="custom-control custom-checkbox mb-0">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                    value="option1" checked>
                                <span class="custom-control-label">Yes, Send my data to my Email.</span>
                            </label>
                            <div class="text-center">
                                {!! QrCode::size(250)->generate(route('user.profile', ['id'=>$user->id])) !!}
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            @if ($status == 1)
                            <a wire:click='deactivateAccount' href="javascript:void(0)" class="btn btn-primary my-1">Deactivate</a>
                            @else
                            <a wire:click='activateAccount' href="javascript:void(0)" class="btn btn-primary my-1">Activate</a>
                            @endif
                            <a wire:click='deleteAccount' href="javascript:void(0)" class="btn btn-danger my-1">Delete Account</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
        <!--CONTAINER CLOSED -->

    </div>
</div>
<!--app-content open-->