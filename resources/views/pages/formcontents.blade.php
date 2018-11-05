@extends('layouts.app')
@section('content')
<div class="contact-clean">
    
    
        @if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
	@endif  
        <form method="post">
            {{ csrf_field() }}
            <h2 class="text-center">Kontaktieren Sie uns!</h2>
            <div class="form-group"><input class="form-control" type="text" name="firstname" placeholder="Vorname"></div>
            <div class="form-group"><input class="form-control" type="text" name="givenname" placeholder="Name"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="text" name="subject" placeholder="Betreff"></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="text" placeholder="Nachricht"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Senden</button></div>
        </form>
</div>


@endsection