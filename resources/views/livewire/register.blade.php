<div>

    <!-- PAGE -->
    <div class="page">
        <div class="">
            <!-- Theme-Layout -->

            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <a href="#"><img src="{{asset('assets/images/brand/logo-white.png')}}" class="header-brand-img m-0"
                            alt=""></a>
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form method="post" class="login100-form validate-form" wire:submit.prevent='register'>
                        @csrf
                        <span class="login100-form-title">
                            Registration
                        </span>
                        <div class="wrap-input100 validate-input input-group"
                            data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a class="input-group-text bg-white text-muted">
                                <i class="mdi mdi-account" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" autocomplete="on" type="text"
                                wire:model.defer='user.name' placeholder="User name">
                        </div>
                        <div class="wrap-input100 validate-input input-group"
                            data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" autocomplete="on" type="email"
                                wire:model.defer='user.email' placeholder="Email">
                        </div>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 ms-0 form-control" type="password"
                                wire:model.defer='user.password' placeholder="Password">
                        </div>
                        <label class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label">Agree the <a href="terms.html">terms and
                                    policy</a></span>
                        </label>
                        <div>
                            <div wire:loading>
                                <i class="fas fa-sync fa-spin"></i>
                                Loading please wait ...
                            </div>
                        </div>
                        <div class="container-login100-form-btn">
                            <button wire:loading.attr="disabled" type="submit" class="login100-form-btn btn-primary">
                                Register
                            </button>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0 d-inline-flex">Already have account ?<a href="{{route('login')}}"
                                    class="text-primary ms-1">Sign In</a></p>
                        </div>

                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!-- END PAGE -->

</div>