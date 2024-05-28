<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una nueva sesión de CURL; ch = cURL handle
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);

//una alternativa seria utilizar file_get_contents
//$result = file_get_contents(API_URL)

// Verificar si hubo algún error en la ejecución de la petición
if ($result === false) {
    die('Error en la petición: ' . curl_error($ch));
}

// Cerrar la sesión de CURL
curl_close($ch);

// Decodificar el resultado JSON
$data = json_decode($result, true);

// Verificar si la decodificación JSON tuvo éxito
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error al decodificar JSON: ' . json_last_error_msg());
}

// Mostrar los datos
//var_dump($data);
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Proxima Pelicula de Marvel</title>
    
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
   
<section>

<h2>La Proxima Pelicula de Marvel</h2>
<img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"];?> />" style="border-radius: : 16px;" />

</section>

<hgroup>
    <h2><?= $data["title"];?> Se estrena en <?= $data["days_until"];?> Dias</h2>
    <p>Fecha de estreno: <?= $data["release_date"];?></p>
    <p> La siguiente pelicula es <?=$data["following_production"]["title"];?> </p>
</hgroup>



</main>

<style>

    :root {
        color-scheme: light dark;

    }

    body{
        display: grid;
        place-content: center;

    }

    section{
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    img{
        margin: 0 auto;

    }

    hgroup{
        display: flex;
        flex-direction: column;
        align-items: center;
        
    }


</style>
