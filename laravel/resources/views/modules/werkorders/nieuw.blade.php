@extends('layouts.app')

<?php
date_default_timezone_set("Europe/Amsterdam");
?>

<style>
    input {
        background-color: white!important;
    }
</style>

@section('content')
    <div class="container" style="max-width: 90vw!important;">
        <div class="row justify-content-center" style="width:50vw;margin:auto;">
            <h1>Werkorder aanmaken:</h1>

            <form action="{{ url('/f/CreateWerkorder') }}" method="POST">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputOmschrijving">Omschrijving</label>
                    <input type="text" class="form-control" id="inputOmschrijving" aria-describedby="omschrijving" name="inputOmschrijving">
                    <small id="omschrijving" class="form-text text-muted">Vul een duidelijke omschrijving in van het werkorder.</small>
                </div>
                <div class="form-group">
                    <label for="inputKlant">Klant</label>
                    <input type="text" class="form-control" id="inputKlant" aria-describedby="klant" name="inputKlant">
                    <small id="klant" class="form-text text-muted">Type een nieuwe klant of kies er een d.m.v. de bolletjes.</small>
                </div>
                <div class="form-group">
                    <label for="inputPlanDatum">Plandatum</label><br>
                    <input type="date" class="form-control" id="inputPlanDatum" name="inputPlanDatum" aria-describedby="plandatum" value="<?php echo date("Y-m-d");?>" style="display: inline-block;width:49.8%;">
                    <input type="time" class="form-control" id="inputPlanTijd" name="inputPlanTijd" aria-describedby="plantijd" value="00:00" style="display: inline-block;width:49.8%;">
                </div>
                <div class="form-group">
                    <label for="inputOpleverDatum">Opleverdatum</label><br>
                    <input type="date" class="form-control" id="inputOpleverDatum" name="inputOpleverDatum" aria-describedby="opleverdatum" value="<?php echo date("Y-m-d");?>" style="display: inline-block;width:49.8%;">
                    <input type="time" class="form-control" id="inputOpleverTijd" name="inputOpleverTijd" aria-describedby="oplevertijd" value="00:00" style="display: inline-block;width:49.8%;">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Werkorder aanmaken</button>
            </form>
        </div>
    </div>
@endsection
