@extends('layouts.app')

@section('content')

                     <?php
         echo Form::open(array('url' => 'formcontents'));
            echo Form::text('firstname','First Name');
            echo '<br/>';
            
            echo Form::text('givenname','Given Name');
            echo '<br/>';
            
            echo Form::text('email', 'example@gmail.com');
            echo '<br/>';
            
            echo Form::text('subject', 'Subject');
            echo '<br/>';
            
            echo Form::text('text', 'Text');
            echo '<br/>';
            echo '<br/>';
     
            echo Form::submit('Submit');
         echo Form::close();
      ?>
               
@endsection
