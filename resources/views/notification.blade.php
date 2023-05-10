@include('partials.navbarAuth')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/notification.css">
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>\
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

</head>
<body>
    <main>
        <div class="position-absolute py-vh-5  w-100 h-50 top-0 start-0">
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <h1 class="mt-5 text-center">Notification</h1>
                        <button id="showtoast" class="btn btn-primary">Show Toast geh</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="assets/plugins/global/plugins.bundle.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
};

    toastr.success("New order has been placed!");
</script>
</html>
