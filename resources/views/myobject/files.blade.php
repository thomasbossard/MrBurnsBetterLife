@extends('layouts.app')
@section('content')



<div class="card">
        <div class="card-body">
            <h4 class="card-title">Meine Dokumente &nbsp;<img class="img-fluid" src="assets/img/file.png" width="32" height="32"></h4>
        </div>
    </div>
    <section>
        <div class="table-responsive" style="width: 75%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Beschreibung</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cell 1</td>
                        <td><a href="#">Link</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

@endsection
