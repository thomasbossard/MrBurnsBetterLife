@extends('layouts.app')
@section('content')


<body class="text-center">
    <section>
        <div class="container" style="margin-bottom: 20px;"><img class="img-fluid" src="assets/img/error_screen.png"></div>
        <div class="container" style="margin-bottom: 20px;">
            <h2>Unauthorized Access. Please Login.</h2>
        </div>
        <div class="container"><a class="btn btn-primary btn-lg" role="button" href="login">Login</a></div>
    </section>
</body>

@endsection
