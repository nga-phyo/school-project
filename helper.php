<?php 



function redirect($url){

    header("Location: $url");
    die();
}


function dd($data){

    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}


?>

<script>
     function show(){

        var alertBox = document.getElementsByClassName("alert-box");
        alertbox.style.display = "none";
     }
     second = 5000;
     setTimeout(show(),second);
</script>