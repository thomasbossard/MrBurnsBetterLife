@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
