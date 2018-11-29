@extends('layouts.app')
@section('content')



    <div class="container" style="padding-bottom: 25px;">
        <h4>Meine Dokumente &nbsp;<img class="img-fluid" src="assets/img/documents.svg" width="32" height="32"></h4>
    </div>


    <div class="container">
        <div class="table-responsive" style="margin-bottom: 50px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datei</th>
                        <th>Name</th>                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($file as $file)
                    <tr>                                            
                        <td><a href="/downloadinvoice/{{$file->id}}">Herunterladen</a></td>
                        <td>{{$file->filename}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container"><a href="/myobject" class="btn btn-primary">Zurück zu Verwalten...</a></div>


@endsection
