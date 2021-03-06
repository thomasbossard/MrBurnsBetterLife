@extends('layouts.app')
@section('content')

    <div class="container" style="margin-bottom: 10px;">
        <a href="/myobject" class="btn btn-link"><i class="fa fa-reply"></i>&nbsp;&nbsp;Zurück zu Objekt</a>
    </div>

    <div class="container">
        <h3>Meine Dokumente</h3>
        <hr class="style13">
    </div>


    <div class="container">
        <div class="table-responsive" style="margin-bottom: 25px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Datei</th>                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($file as $file)
                    <tr>    
                        <td>{{$file->filename}}</td>
                        <td><a href="/downloadfile/{{$file->id}}">Herunterladen</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
