@extends('layouts.app')
@section('content')

<a href="/myobject">Zurück</a>

<div class="card">
        <div class="card-body">
            <h4 class="card-title">Meine Rechnungen &nbsp;<img class="img-fluid" src="assets/img/bill.png" width="32" height="32"></h4>
        </div>
    </div>
    <section>
        <div class="table-responsive" style="width: 75%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Betrag</th>
                        <th>Typ</th>
                        <th>Beschreibung und Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice as $invoice)
                    <tr>
                        <td>{{$invoice->date}}</td>
                        <td>{{$invoice->amount}}</td>
                        <td>{{$invoice->type}}</td>
                        <td><a href="/downloadinvoice/{{$invoice->id}}">{{$invoice->description}}</a></td>
                    </tr>
                    @endforeach
                
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>offener Betrag</td>
                        <td>{{$openamount}}.- Franken</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section style="padding-bottom: 20px;">
        <div class="table-responsive" style="width: 75%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Getätigte Zahlung</th>
                    </tr>
                </thead>
                <tbody>    
                    
                    @foreach ($payment as $payment)
                    
                    
                        <tr>
                            <td style="width: 35%;">{{date('d.m.Y', strtotime($payment->date))}}</td>
                            <td style="width: 65%;">{{$payment->amount}} .- Franken</td>    
                            
                        </tr>
                    @endforeach                    
                 
                    <tr>
                        <td></td>
                        <td><span style="text-decoration: underline;">{{$totalpaid}}.- Franken</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
