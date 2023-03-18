<?php

include('connect.php');

$query = 'SELECT *
    FROM links';
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adam Thomas</title>

    <link rel="icon" href="/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>

        body {
            background-color: #000;
        }

        main {
            width: 100vw;
            height: 100vh;
        }

        video {
            z-index: 50;
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            margin: 0;
            opacity: 0.3;
        }

        div {
            z-index: 100;
            position: relative;
        }

        h1 {
            font-family: "PT Sans Narrow",sans-serif;
            font-weight: 400;
            font-size: 4vmax;
            line-height: 4.2vmax;
        }

        h2 {
            font-family: "PT Sans Narrow",sans-serif;
            font-weight: 400;
            font-size: 5vmax;
            line-height: 5vmax;
        }

        p {
            font-family: "PT Sans Narrow",sans-serif;
            font-size: 1.8vmax;
            line-height: 2.2vmax;
            margin: 3px;
        }

        span {
            background-color: #000;
            display: inline-block;
            padding: 2px 5px;
        }

    </style>

</head>
<body>

    <main class="w3-cell w3-cell-middle w3-container w3-center">
        
        <div class="">
            <h1 class="w3-text-white ca-font-medium ca-pt-sans">
                <span>Adam Thomas</span>
            </h1>
            <h2 class="w3-text-red ca-font-large ca-pt-sans">
                <span>php-mysql-images-embedded</span>
            </h2>
            <p class="w3-text-white ca-font-small ca-pt-sans w3-center">
                <span><a href="https://github.com/codeadamca/php-mysql-images-embedded">https://github.com/codeadamca/php-mysql-images-embedded</a></span>
            </p>

            <?php while($record = mysqli_fetch_assoc($result)): ?>

                <div class="w3-margin-top">
                    <p class="w3-text-white ca-font-small ca-pt-sans w3-center">
                        <img src="data:image/jpeg;base64,<?=base64_encode($record['image'])?>"/>
                        <span><a href="<?=$record['url']?>"><?=$record['url']?></a></span>
                    </p>
                </div>

            <?php endwhile; ?>

            </div>

        </div>

        <video preload="auto" autoplay="true" muted loop="true">
            <source src="https://codeadam.ca/static/media/home-video.6057a6c8ab306b428d78.mp4">
        </video>

    </main>

    <script src="index.js"></script>
    
</body>
</html>
