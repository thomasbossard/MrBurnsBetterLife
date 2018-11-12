@extends('layouts.app')
@section('content')
{{$message}}
@if(Session::has($message))
		{{$message}}
@endif  


@endsection