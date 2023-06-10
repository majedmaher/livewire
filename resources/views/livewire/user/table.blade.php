<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">User List</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User List</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW OPEN -->
            <div class="row row-cards">
                <div class="col-lg-12 col-xl-12">
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-text btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="e-table px-5 pb-5">
                            <div class="table-responsive table-lg">
                                <table class="table border-top table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Photo</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="align-middle text-center"><img alt="image" class="avatar avatar-md br-7" src="{{isset($user->profile->picture) ? asset($user->profile->picture) : '../assets/images/users/16.jpg'}}"></td>
                                            <td class="text-nowrap align-middle">{{$user->name}}</td>
                                            <td class="text-nowrap align-middle">{{$user->status == 1 ? 'activate' : 'deactivate'}}</td>
                                            <td class="text-nowrap align-middle"><span>{{date('d M Y', strtotime($user->created_at));}}</span></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!-- ROW CLOSED -->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>