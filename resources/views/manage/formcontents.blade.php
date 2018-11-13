@extends('layouts.app')
@section('content')
@if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
@endif  
<h1>Nachrichten von Kontaktformular</h1>

@if(!$allnewformcontents->isEmpty())         
    <form action="/processedform" method="post">
                {{ csrf_field() }}
                <TABLE border="1">
                    <TR> 
                        <TD>
                            Name
                        </TD>
                        <TD>
                            Vorname
                        </TD>
                        <TD>
                            E-Mail
                        </TD>
                        <TD>
                            Betreff
                        </TD>
                        <TD>
                            Text
                        </TD>
                        <TD>
                            Verarbeitet
                        </TD>
                    </TR>
                    @foreach ($allnewformcontents as $formcontent)
                    <TR> 
                        <TD>
                            {{$formcontent->givenname}}
                        </TD>
                        <TD>
                            {{$formcontent->firstname}}
                        </TD>
                        <TD>
                            {{$formcontent->email}}
                        </TD>
                        <TD>
                            {{$formcontent->subject}}
                        </TD>
                        <TD>
                            {{$formcontent->text}}
                        </TD>
                        <TD>
                            <input type="checkbox" name="id[]" value="{{$formcontent->id}}">
                        </TD>
                    </TR>
                    @endforeach
                </TABLE>
                <br>
                <input type="submit" value="Verarbeiten">
    </form>
@endif

@if($allnewformcontents->isEmpty()) 
aktuell keine Nachrichten
@endif
 <br>
 
 
 <h1>verarbeitete Nachrichten</h1>

 <TABLE border="1">
                <TR> 
                    <TD>
                        Name
                    </TD>
                    <TD>
                        Vorname
                    </TD>
                    <TD>
                        E-Mail
                    </TD>
                    <TD>
                        Betreff
                    </TD>
                    <TD>
                        Text
                    </TD>
                </TR>
                @foreach ($allprocessedformcontents as $formcontent)
                <TR> 
                    <TD>
                        {{$formcontent->givenname}}
                    </TD>
                    <TD>
                        {{$formcontent->firstname}}
                    </TD>
                    <TD>
                        {{$formcontent->email}}
                    </TD>
                    <TD>
                        {{$formcontent->subject}}
                    </TD>
                    <TD>
                        {{$formcontent->text}}
                    </TD>
                </TR>
                @endforeach
            </TABLE>
            
@endsection