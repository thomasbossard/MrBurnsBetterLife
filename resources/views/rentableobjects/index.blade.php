@extends('layouts.app')
@section('content')

<h1> Das isch de absoluti Wahnsinns Screen. Minerläbtig no nie sowas tolls gseh </h1>
<br><br>
@foreach ($rentableobject as $rentableobject)
<h3> Dein Name sein Borat und du wohnen in: {{$rentableobject->name}} </h3>
@endforeach

@foreach ($manager as $manager)
<h3> Din Manager: {{$manager->name}} </h3>
@endforeach

@foreach ($invoice as $invoice)
<h3> Du  Arm! Schulden Burns: {{$invoice->openrentalamount}} Geld</h3>
@endforeach

<br><br>
 <ul class = "list-group">
@foreach ($payment as $payment)
  <li class="list-group-item"> <h3> Dini letzi mikrige Zahlige: {{$payment->amount}} Geld am {{date('d.m.Y', strtotime($payment->date))}} </h3></li>
@endforeach

            </ul>

<br><br>
@foreach ($pushmessage as $pushmessage)
<h3> Nachrichten der Verwaltung: {{$pushmessage->text}} </h3>
@endforeach


@endsection
