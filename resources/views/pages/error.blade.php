@extends('layouts.app')
@section('content')


<body class="text-center">
    <section>
        <div class="container" style="margin-bottom: 20px;"><img class="img-fluid" src="assets/img/error_screen.png"></div>
        
            <div class="container" style="margin-bottom: 20px;">
                    <h2>{{$errormessage}}</h2>
            </div>
        
    </section>
</body>

@endsection
