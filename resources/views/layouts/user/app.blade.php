
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Green Laef Restaurant</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('user') }}/images/fav-icon.jpg" type="image/x-icon" /><!--favicon-->
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap.min.css" /><!--bootstrap css link-->
    <link rel="stylesheet" href="{{ asset('user') }}/css/style.css" /> <!--row code css file-->
    <script src="https://kit.fontawesome.com/ba78558982.js" crossorigin="anonymous"></script>
</head>
<body>

    <!--full wrapper start here-->
    <section class="full-wrapper" >
    <!--navsection start here-->
        @include('layouts.user.partial.header')
    <!--navsection end here-->

        @yield('content')

    <!--footer area start here-->
    @include('layouts.user.partial.footer')
    <!--end of footer-->

    </section>
    <!--full wrapper end here-->





    <!--Bootstrap javascript start here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('user') }}/js/jquery.min.js"></script>
    <script src="{{ asset('user') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('user') }}/js/index.js"></script>
    <!--Bootstrap Javascript end here-->
</body>
</html>
