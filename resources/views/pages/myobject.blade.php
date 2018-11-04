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
                                    <td style="width: 40%;">Adresse</td>
                                    <td style="width: 60%;">Hasliweg 322, 8001 Zürich</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Verwalter</td>
                                    <td style="width: 60%;">Mike Shiva</td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Hauswart</td>
                                    <td>Harry Hasler</td>
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
                                <tr>
                                    <td style="width: 40%;">02.10.2016</td>
                                    <td style="width: 60%;">3900.-</td>
                                </tr>
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
                                <tr>
                                    <td style="width: 40%;">10.09.18</td>
                                    <td><a href="pushmessage/id=32">Link</a></td>
                                </tr>
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
