@extends('layouts.app')

<?php
use App\Http\Controllers\WerkordersController;
?>

@section('content')
    <div class="container" style="max-width: 90vw!important;">
        <div class="row justify-content-center">
            <p style="padding: 0!important;">
                <a href="/werkorders/nieuw" class="btn btn-success" style="width: 200px;">Nieuw werkorder</a>
            </p>
            <?php
            $werkorders = WerkordersController::GetAlleWerkorders();
            print "<table class=\"table table-striped table-hover bg-white\" style=\"border:1px solid grey;\"><thead><tr>";
            if ($werkorders != null){
                foreach($werkorders[0] as $key=>$value)
                {
                    if ($key == "created_at" || $key == "updated_at"){
                        // niks
                    } else {
                        print "<th scope=\"col\">" . str_replace("_", " ", ucfirst($key)) . "</th>";
                    }
                }
                print "</tr></thead><tbody>";
                foreach ($werkorders as $werkorder)
                {
                    print "<tr>";
                    foreach($werkorder as $key=>$value)
                    {
                        if ($key == "plantijd" && $value == "00:00:00"){
                            print "<td>-</td>";
                        } else if ($key == "oplevertijd" && $value == "00:00:00"){
                            print "<td>-</td>";
                        } else if($key == "created_at" || $key == "updated_at"){
                            //niks
                        } else {
                            print "<td>" . $value . "</td>";
                        }

                    }
                    print "</tr>";
                }
            }
            print "</tbody></table>"
            ?>
        </div>
    </div>
@endsection
