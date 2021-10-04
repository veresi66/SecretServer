@extends('layouts.main')

@section('content')
            <h1 class="alert alert-info row">SecretServer API teszt</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md2">
                        Minden adat lekérésének tesztelése:
                        <button id="allSecrets" class="button button-info">Kérés elküldése</button>
                    </div>
                </div>
                <div id="valasz" class="col-md-6"></div>
            </div>
@endsection