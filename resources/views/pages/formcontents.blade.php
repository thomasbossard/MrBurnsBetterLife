@extends('layouts.app')

@section('js')

<script type="text/javascript">
    function validateForm()
    {
        var firstname=document.forms["contactform"]["firstname"].value;
        var givenname=document.forms["contactform"]["givenname"].value;
        var subject=document.forms["contactform"]["subject"].value;
        var text=document.forms["contactform"]["text"].value;

        
        if (firstname==null || firstname=="",givenname==null || givenname=="",subject==null || subject=="",text==null || text=="")
        {
            alert("Bitte füllen Sie alle Felder aus");
            return false;
        } 
        
        else {
            
            return true;
        }
        
        
    }
</script>

@endsection


@section('content')
        
        @if(session('message'))
	<div class='alert alert-success'>
		{{ session('message') }}
	</div>
	@endif 
        
<div class="contact-clean">
 
        <form method="post" name ="contactform" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <h2 class="text-center">Kontaktieren Sie uns!</h2>
            <div class="form-group"><input class="form-control" type="text" name="firstname" placeholder="Vorname"></div>
            <div class="form-group"><input class="form-control" type="text" name="givenname" placeholder="Name"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="text" name="subject" placeholder="Betreff"></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="text" placeholder="Nachricht"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit">Senden</button></div>
        </form>
</div>


@endsection