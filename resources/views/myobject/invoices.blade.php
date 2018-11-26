@extends('layouts.app')
@section('content')

    <div class="container" style="padding-bottom: 25px;">
        <h4>Meine Rechnungen &nbsp;<img class="img-fluid" src="assets/img/invoice.svg" width="32" height="32"></h4>
    </div>

    <div class="container">
        <div class="table-responsive" style="margin-bottom: 50px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Betrag</th>
                        <th>Typ</th>
                        <th>Beschreibung und Download</th>
                        <th>Bezahlt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice as $invoice)
                    <tr>
                        <td>{{$invoice->date}}</td>
                        <td>{{$invoice->amount}}</td>
                        <td>{{$invoice->type}}</td>
                        <td><a href="/downloadinvoice/{{$invoice->id}}">{{$invoice->description}}</a></td>
                        <td>@if($invoice->paid == 1) Ja @endif @if($invoice->paid == 0) Nein @endif</td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        
                
                        <td>
                            
                            @if($openamount<0)
                            <font color ="green">Offener Betrag</font>
                            @endif
                            
                            @if($openamount>0)
                            <font color ="red">Offener Betrag</font>
                            @endif
                            
                            @if($openamount==0)
                            <font color ="black">Offener Betrag</font>
                            @endif
                        
                        </td>
                        
                        <td>
                            @if($openamount<0)
                            <font color ="green">{{$openamount}}.- Franken</font>
                            @endif
                            
                            @if($openamount>0)
                            <font color ="red">{{$openamount}}.- Franken</font>
                            @endif
                            
                            @if($openamount==0)
                            <font color ="black">{{$openamount}}.- Franken</font>
                            @endif
                        </td>
                        
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>


    <div class="container" style="margin-bottom: 25px;">
        <div class="table-responsive">
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
                        <td>{{date('d.m.Y', strtotime($payment->date))}}</td>
                        <td>{{$payment->amount}} .- Franken</td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td></td>
                        <td><span style="text-decoration: underline;">{{$totalpaid}}.- Franken</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container"><a href="/myobject" class="btn btn-primary">Zurück</a></div>
    

    


@endsection
