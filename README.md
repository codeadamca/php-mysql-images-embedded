# Using PHP to Display Images from a MySQL Database

A basic sample of integrating images into a MySQL database. In this example the images are added to the links table using binary fields. 

## The End Goal

The `links.sql` file in the repository includes a list of social media links and logos that can be imported into your MySQL database. There are no image files in this examples as the images are inside the links table. 

There are multiple methods of retrieving data from a MySQL database using PHP. For simplicity sake the example below will use a series of `mysqli` PHP functions. 

## Steps

1. Open up phpMyAdmin.

    If you're using a local server phpMyAdmin can usually be accessed by starting your server and then clicking on the phpMyAdmin link. If you're using a hosting account there will be a link to phpMyAdmin in your control panel. 

    Once you have phpMyAdmin open, click on the import tab and select the `links.sql` file from this repository. This will create a table called `links` and populate it with some sample data. 

2. Create a new file and name it `index.php`. In that file place the following code:

    ```php
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
    ```

4. Duplicate `.env.sample` and rename it to `.env`. Update it with your database credentials. You can probably remove the socket information in the `.env` file:

    ```php
    DB_HOST=localhost
    DB_DATABASE=php_mysql_images_embedded
    DB_USERNAME=root
    DB_PASSWORD=root
    DB_PORT=3306
    ```
    
    And in the `connect.php` file:
    
    ```php
    <?php

    $env = file(__DIR__.'/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach($env as $value)
    {
      $value = explode('=', $value);  
      define($value[0], $value[1]);
    }

    $connect = mysqli_connect(
      DB_HOST, 
      DB_USERNAME, 
      DB_PASSWORD, 
      DB_DATABASE,
      DB_PORT);
    ```
    

5. The finished result should look like this:

    ![Final Result](https://raw.githubusercontent.com/codeadamca/php-mysql-images-embedded/main/_readme/screenshot-images.png)

***

## Repository Resources

* [Visual Studio Code](https://code.visualstudio.com/) or [Brackets](http://brackets.io/) (or any code editor)
* [Filezilla](https://filezilla-project.org/) (or any FTP program)

Full tutorial URL: https://codeadam.ca/learning/php-mysql-images.html

<a href="https://codeadam.ca">
<img src="https://codeadam.ca/images/code-block.png" width="100">
</a>


