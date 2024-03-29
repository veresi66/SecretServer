@extends('layouts.main')

@section('content')
        <div class="row">
            <div class="col">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Minden adat lekérésének tesztelése</div>
                        <div class="card-body"><button id="allSecrets" class="btn btn-info">Kérés elküldése</button></div>
                    </div>
                </div>
                <div class="col ter-elotte">
                    <div class="card" id="postForm">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">Adatfelvitel tesztelése</div>
                                <div class="col text-md-right">
                                    A válasz típusa:
                                    <select name="reqTypePost" id="reqTypePost">
                                        <option value="JSON">JSON</option>
                                        <option value="XML">XML</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="secret" class="col-md-4 col-form-label text-md-right">Secret:</label>
                                <div class="col">
                                    <input type="text" id="secret" name="secret" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="expireAfterViews" class="col-md-4 col-form-label text-md-right">Expire after view:</label>
                                <div class="col">
                                    <input type="text" id="expireAfterViews" name="expireAfterViews" class="form-control num-control" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="expireAfter" class="col-md-4 col-form-label text-md-right">Expire after (minutes)*:</label>
                                <div class="col">
                                    <input type="text" id="expireAfter" name="expireAfter" class="form-control num-control" value="" />
                                    <small id="expireAfterHelp" class="form-text text-muted">Ha 0, akkor nem évül el a tétel.</small>
                                </div>
                            </div>
                            <div class="text-md-center"><button id="postSecret" class="btn btn-info">Kérés elküldése</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-md ter-elotte">
                    <div class="card" id="getForm">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">Egyedi adat lekérésének tesztelése</div>
                                <div class="col text-md-right">
                                    A válasz típusa:
                                    <select name="reqTypeGet" id="reqTypeGet">
                                        <option value="JSON">JSON</option>
                                        <option value="XML">XML</option>
                                    </select>
                                </div>
                            </div>
                        </div>                            
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="hash" class="col-md-4 col-form-label text-md-right">Hash:</label>
                                <div class="col-md">
                                    <input type="text" id="hash" name="hash" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="text-md-center"><button id="getSecretHash" class="btn btn-info">Kérés elküldése</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="valasz" class="col overflow-auto"></div>
        </div>
@endsection