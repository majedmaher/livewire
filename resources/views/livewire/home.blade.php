<div>
    
    <main class="profile-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <form wire:submit.prevent='submit'>
                                
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" wire:model.lazy='full_name' name="full_name" value="{{$full_name}}" required autofocus>
                                        @if ($errors->has('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>
                                    <div class="col-md-6">
                                        <input type="file" id="picture" wire:model.lazy='picture' name="picture">
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
                                        <textarea rows="3" cols="40" name="bio" wire:model.lazy='bio'> @if($bio) {{$bio}} @endif</textarea>
                                        @if ($errors->has('bio'))
                                        <span class="text-danger">{{ $errors->first('bio') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Date of birth</label>
                                    <div class="col-md-6">
                                        <input type="date" id="date_of_birth" class="form-control" wire:model.lazy='date_of_birth' name="date_of_birth" @if ($date_of_birth)value="{{$full_name}}"@endif>
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
</div>
