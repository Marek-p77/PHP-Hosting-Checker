<?php
echo("
    <form action='/host' method='get'>
        <input type='text' name='hostname' placeholder='Doména'>
        <input type='submit' name='submit' value='Vyhledat'>
    </form>
    ");

    if(isset($_GET["submit"])) {
        
        echo "
        <style>
            * {
                font-family: Arial;
            }
            form {
                padding: 15px;
                width: 400px;
                border-radius: 10px;
                background-color: #E7F4FF;
                margin: 20px 0 0 20px;
            }
            form input {
                background-color: #DBE7F1;
                border: 2px solid #E7F4FF;
                padding: 10px;
                border-radius: 10px;
                color: #000;
                font-weight: bold;
            }
            form input:hover {
                box-shadow: 2px 2px 2px gray;
            }
            .status {
                padding: 15px;
                width: 400px;
                border-radius: 10px;
                background-color: #E7F4FF;
                margin: 10px 0 0 20px;
            }
            .status p {
                font-weight: bold;
            }
        </style>
        ";
        $host = json_decode(file_get_contents('https://www.who-hosts-this.com/API/Host?key=wju488gyyxqq4fh5d0pvsmmdtego9abmsy7joq6qlqb879qam697l9kryzec4jlk7nasgu&url='.$_GET["hostname"]));
        echo "<div class='status'><h3>Hostname: ".$_GET["hostname"]."</h3>";
        echo "<h3>Společnost: ".$host->results[0]->isp_name."</h3></div>";
    }
