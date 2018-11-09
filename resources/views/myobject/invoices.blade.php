@extends('layouts.app')
@section('content')



<div class="card">
        <div class="card-body">
            <h4 class="card-title">Meine Rechnungen &nbsp;<img class="img-fluid" src="assets/img/bill.png" width="32" height="32"></h4>
        </div>
    </div>
    <section>
        <div class="table-responsive" style="width: 75%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Betrag</th>
                        <th>Beschreibung</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cell 1</td>
                        <td>Cell 2</td>
                        <td><a href="#">Link</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
