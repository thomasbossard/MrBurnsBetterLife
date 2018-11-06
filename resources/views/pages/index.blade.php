@extends('layouts.app')
@section('content')



<main class="page lanidng-page">
        <section class="portfolio-block block-intro" style="padding-top: 0px;padding-bottom: 50px;">
            <div class="container" style="background-color: #ffffff;">
                <div class="avatar" style="background-image: url(&quot;assets/img/Mr.%20Burns.png&quot;);"></div>
                <div class="about-me">
                    <p>Hallo! Ich bin&nbsp;<strong>Mr Burns</strong>, Eigentümer der Mr Burns Betterlife AG. Wir vermieten die schönsten Anwesen, Häuser und Wohnungen in ganz Springfield und dies zu besten Konditionen.</p><a class="btn btn-outline-primary"
                        role="button" href="rentableobjects">Zu den Objekten</a></div>
            </div>
        </section>
        <section class="portfolio-block photography">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="assets/img/Springfield_bachelor_apartments2.png"></a></div>
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="assets/img/Bachelor_arms.png"></a></div>
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="assets/img/Springfield_arms.png"></a></div>
                </div>
            </div>
        </section>
        <section class="portfolio-block skills" style="padding-top: 100px;padding-bottom: 0px;">
            <div class="container">
                <div class="heading">
                    <h2 style="height: 12px;">Diesen Mehrwert bieten wir</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Springfield's beste Immobilien</h3>
                                <p class="card-text">Wir bieten die exklusivsten Wohnungen in ganz Springfield an. Neben den rarenImmobilien an der Springfielder Küste, gibt es auch attraktive Wohnmöglichkeiten direkt neben dem Kraftwerk.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Atmostrom direkt ab Werk</h3>
                                <p class="card-text">Sämtliche Kunden freuen sich über 100% unterbruchsfreie Stromversorgung welche wir durch einen direkten Werkanschluss sicherstellen.&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Massgeschneiderte Lösungen</h3>
                                <p class="card-text">Bei uns wird jeder Kundenwunsch erfüllt. Gefällt Ihnen etwas an der Liegenschaft nicht? Wir kümmern uns um diese Angelegenheit damit es Ihnen in Ihrem Zuhause an nichts fehlt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <section class="portfolio-block website gradient">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-5 offset-lg-1 text">
                    <h3>Lebe Deinen Traum</h3>
                    <p>Das Gefühl Zuhause zu sein - einfach unbezahlbar.</p>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="portfolio-laptop-mockup">
                        <div class="screen" style="background-color: #055ada;"><img class="img-fluid" src="assets/img/simpsons_couch.jpg" style="background-color: #023785;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection