@extends('layouts.app')
@section('content')
<div class="contact-clean">
        <form method="post">
            <h2 class="text-center">Kontaktieren Sie uns!</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Vorname"></div>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Betreff"></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="message" placeholder="Nachricht"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Senden</button></div>
        </form>
</div>
@endsection