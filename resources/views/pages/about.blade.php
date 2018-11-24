@extends('layouts.app')
@section('content')

    <main class="page lanidng-page"></main>
    <div style="padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8"><img class="img-fluid" src="assets/img/about_us.jpg" style="padding-top: 5px;"></div>
                <div class="col-md-4">
                    <p class="text-left" style="padding-top: 5px;"><strong>Unsere Vision</strong></p>
                    <p class="text-left">Wir möchten Ihnen den Lifestyle powered by Atomstrom vermitteln. Vertrauen Sie uns wenn es um Atomstrom wie auch Immobilien geht! Dank unserem breiten Tätigkeitsfeld können wir Ihr Haus direkt an das Atomkraftwerk anschliessen.<br>Spätestens
                        damit, bringen wir auch Sie zum strahlen.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Unsere Mitarbeiter</h2>
            </div>
            <div class="row people" style="padding-top: 0px;">
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="assets/img/mrburns.jpg">
                        <h3 class="name">Mr. Burns</h3>
                        <p class="title">Geschäftsführer</p>
                        <p class="description">Alter: Unbekannt<br>Motto: Ausgezeichnet!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="assets/img/lisasimpson.png">
                        <h3 class="name">Lisa Simpson</h3>
                        <p class="title">Verwaltung</p>
                        <p class="description">Alter: 8<br>Motto: Carpe diem</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="assets/img/cletus_spuckler.png">
                        <h3 class="name">Cletus Spuckler</h3>
                        <p class="title">Hauswart & Strahlenschutz</p>
                        <p class="description">Alter: 37<br>Motto: Beweis es!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
