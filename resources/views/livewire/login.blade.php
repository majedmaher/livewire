<div>
    <!-- PAGE -->
    <div class="page">
        <div class="">
            <!-- Theme-Layout -->

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <a href="index.html"><img src="{{asset('assets/images/brand/logo-white.png')}}"
                            class="header-brand-img" alt=""></a>
                </div>
            </div>

            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form class="login100-form validate-form" wire:submit.prevent='submit'>
                        <span class="login100-form-title pb-5">
                            Login
                        </span>
                        <div class="panel panel-primary">
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <div class="wrap-input100 validate-input input-group"
                                            data-bs-validate="Valid email is required: ex@abc.xyz">
                                            <a class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input
                                                class="input100 border-start-0 @error('email') is-invalid @enderror form-control ms-0"
                                                type="email" wire:model.defer='email' name="email" placeholder="Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message
                                                    }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input
                                                class="input100 border-start-0 @error('password') is-invalid @enderror form-control ms-0"
                                                wire:model.defer='password' name="password" type="password"
                                                placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message
                                                    }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="text-end pt-4">
                                            <p class="mb-0"><a href="#" class="text-primary ms-1">Forgot Password?</a>
                                            </p>
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <button type="submit" class="login100-form-btn btn-primary">
                                                Login
                                            </button>
                                        </div>
                                        <div class="text-center pt-3">
                                            <p class="text-dark mb-0">Not a member?<a href="{{route('register')}}"
                                                    class="text-primary ms-1">Sign UP</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- End PAGE -->

</div>
<!-- BACKGROUND-IMAGE CLOSED -->