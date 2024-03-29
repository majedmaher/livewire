<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet">
    <link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <livewire:styles />

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    {{ isset($slot) ? $slot : null }}

    <!-- JQUERY JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('assets/js/show-password.min.js')}}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{asset('assets/js/generate-otp.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- Custom-switcher -->
    <script src="{{asset('assets/js/custom-swicher.js')}}"></script>

    <!-- Switcher js -->
    <script src="{{asset('assets/switcher/js/switcher.js')}}"></script>

    <livewire:scripts />

    <script>
        window.livewire.on('alertSuccess', (message) => {
            Swal.fire({
                title: message,
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        })
    
    </script>

</body>

</body>

</html>