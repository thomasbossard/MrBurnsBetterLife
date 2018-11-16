@extends('layouts.app')
@section('content')
   

<div class="card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Mein Objekt</h4>
        </div>
    </div>
    <section style="padding-bottom: 20px;">
        <div class="row">
            <div class="col">
                <div class="table-responsive" style="width: 75%;">
                    <table class="table">
                        <thead>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <tr>                             
                                @foreach ($rentableobject as $rentableobject)
                                <td style="width: 35%;">Adresse:</td>
                                <td style="width: 65%;">{{$rentableobject->street}} {{$rentableobject->housenumber}}, {{$rentableobject->zipcode}} {{$rentableobject->city}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($manager as $manager)
                                <td style="width: 35%;">Verwalter</td>
                                <td style="width: 65%;">{{$manager->name}} {{$manager->givenname}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($groundkeeper as $groundkeeper)
                                <td style="width: 35%;">Hauswart</td>
                                <td style="width: 65%"> {{$groundkeeper->name}} {{$groundkeeper->givenname}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="row">
            <div class="col">
                <h3 class="text-left">Services</h3>
            </div>
        </div>
    </section>
    <div class="text-center" style="padding-bottom: 20px;width: 75%;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"><img src="assets/img/bill.png"><a href="invoices"><br>Rechnungen<br><br></a></div>
                <div class="col-md-3"><img src="assets/img/file.png"><a href="files"><br>Dokumente<br><br></a></div>
                <div class="col-md-3"><img src="assets/img/chat.png"><a href="messages"><br>Nachrichten Hauswart<br><br></a></div>
                <div class="col-md-3"><img src="assets/img/chat.png"><a href="messages"><br>Nachrichten Verwaltung<br><br></a></div>
            </div>
        </div>
    </div>
    <section style="width: 75%;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Push Nachrichten</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pushmessage as $pushmessage)
                    <tr>
                        <td style="width: 25%;">{{$pushmessage->date}}</td>
                        <td style="width: 75%">{{$pushmessage->text}}</td>
                    </tr>
                    @endforeach
                                        
                </tbody>
            </table>
        </div>
    </section>
@endsection

