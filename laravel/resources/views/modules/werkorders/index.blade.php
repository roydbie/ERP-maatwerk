@extends('layouts.app')

<?php
use App\Http\Controllers\WerkordersController;
?>

@section('content')
    <style>
        .form-control {
            background-color: white;
        }
    </style>
    <div id="container" class="container" style="max-width: 90vw!important;">
        <div class="row justify-content-center">
            <p style="padding: 0!important;">
                <a href="/werkorders/nieuw" class="btn btn-success" style="width: 200px;">Nieuw werkorder</a>
                <button class="btn btn-danger" style="width: 200px;" onclick="zoekbalkenLeeg()">Leeg zoekbalken</button>
            </p>
            <?php
            $werkorders = WerkordersController::GetAlleWerkorders();

            print "<div><table style='margin-bottom:5px;width:calc(100% - 15px);'><tr>";
            $i = 0;
            foreach($werkorders[0] as $key=>$value)
            {
                if ($key == "created_at" || $key == "updated_at"){
                    // niks
                } else {
                    print "<td scope=\"col\"><input type=\"text\"  class=\"form-control\" id=\"inputFilter" . $key . "\" onkeyup=\"filter('$key', $i)\" placeholder=\"" . ucfirst($key) . "\"></td>";
                }
                $i++;
            }
            print "</tr></table></div>";

            print "<div style=\"max-height:70vh!important;overflow-y:scroll;\"><table id=\"werkordersTabel\" class=\"table table-striped table-hover bg-white\" style=\"border:1px solid grey;table-layout: fixed;;\"><thead><tr>";
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
            print "</tbody></table></div>";
            ?>
        </div>
    </div>

    <script>
        function filter(kolom, nummer) {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("inputFilter" + kolom);
            if (input.value != null){
                filter = input.value.toUpperCase();
                table = document.getElementById("werkordersTabel");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[nummer];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

        }

        function zoekbalkenLeeg(){
            var i;
            var container = document.getElementById("container");
            var inputs = container.getElementsByTagName("input");
            for (i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                input.value = "";
            }
            filter("id", 1);
        }

    </script>
@endsection
