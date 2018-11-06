@extends('layouts.app')
@section('content')
   

<div class="card">
        <div class="card-body">
            <h4 class="card-title">Mein Objekt</h4>
        </div>
    </div>
    <div style="padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-left: 0px;padding-right: 30px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Objektdetails</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($rentableobject as $rentableobject)
                                    <td style="width: 40%;">Adresse</td>
                                    <td style="width: 60%;">{{$rentableobject->street}} {{$rentableobject->housenumber}}, {{$rentableobject->zipcode}} {{$rentableobject->city}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($manager as $manager)
                                    <td style="width: 40%;">Verwalter</td>
                                    <td style="width: 60%;">{{$manager->name}} {{$manager->givenname}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                     @foreach ($groundkeeper as $groundkeeper)
                                    <td style="width: 40%;">Hauswart</td>
                                    <td> {{$groundkeeper->name}} {{$groundkeeper->givenname}}</td>
                                        @endforeach
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Getätigte Zahlungen</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment as $payment)
                                <tr>
                                    <td style="width: 40%;">{{date('d.m.Y', strtotime($payment->date))}}</td>
                                    <td style="width: 60%;">{{$payment->amount}} .- Franken</td>
                                
                                </tr>
                                    @endforeach
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="padding-right: 30px;padding-left: 0px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Rechnung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>03.10.18</td>
                                    <td><a href="invoice/ID=10">Link</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center" style="padding-right: 30px;font-size: 18px;font-family: Lato, sans-serif;">Meine Rechnungen</p>
                </div>
                <div class="col-md-3" style="padding-left: 10px;padding-right: 20px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Dokument</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="mietvertrag/id=10">Link</a></td>
                                </tr>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center" style="padding-right: 0px;font-size: 18px;font-family: Lato, sans-serif;">Meine Dokumente</p>
                </div>
                <div class="col-md-3" style="padding-right: 10px;padding-left: 20px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Nachricht</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>06.08.17</td>
                                    <td><a href="message/id=10">Link</a></td>
                                </tr>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center" style="padding-right: 0px;font-size: 18px;font-family: Lato, sans-serif;">Hauswart</p>
                </div>
                <div class="col-md-3" style="padding-left: 30px;padding-right: 0px;">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Nachricht</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>11.02.17</td>
                                    <td><a href="message/id=02">Link</a></td>
                                </tr>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center" style="padding-right: 0px;font-size: 18px;font-family: Lato, sans-serif;">Verwalter</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-left: 0px;">
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
                                    <td style="width: 40%;">{{$pushmessage->date}}</td>
                                    <td>{{$pushmessage->text}}</td>
                                </tr>
                                @endforeach
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
@endsection

