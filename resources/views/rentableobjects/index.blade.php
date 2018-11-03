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
<h3> Du  Arm und schulden Burns: {{$invoice->openrentalamount}} Geld</h3>
@endforeach


@endsection
