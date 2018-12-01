@extends('layouts.app')

@section('js')

<script type="text/javascript">
    
    function validateForm()
    {
        var contactform = document.contactform;        
        var text=document.forms["contactform"]["text"].value;

        
        if (contactform.firstname.value == "" || contactform.firstname.value == null) {
            alert("Bitte geben Sie Ihren Vornamen an");
            return false;
            
        }
        
        else if (contactform.givenname.value == "" || contactform.givenname.value == null) {
            alert("Bitte geben Sie Ihren Nachnamen an");
            return false;
            
        }
        
        else if (contactform.email.value == "" || contactform.email.value == null) {
            alert("Bitte geben Sie Ihre Email an");
            return false;
            
        }
        
        else if (contactform.subject.value == "" || contactform.subject.value == null) {
            alert("Bitte geben Sie einen Betreff an");
            return false;
            
        }
        
        if (text==null || text=="")
        {
            alert("Bitte geben Sie eine Nachricht ein");
            return false;
        } 
        
        else{
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