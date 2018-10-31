@extends('layouts.app')
@section('content')

<h1> Rentable Object </h1>

@foreach ($rentableobjects as $rentableobject)
<h3> {{$rentableobject->name}} </h3>
@endforeach

@endsection
