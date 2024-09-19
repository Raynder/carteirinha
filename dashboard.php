<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFG MOBILE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
        }
        .pag {
            position: absolute;
            width: 100vw;
            height: 100vh;
        }
        .click {
            width: 100vw;
            height: 50%;
            position: absolute;
            top: 20%;
        }

        .loading-container {
            position: fixed;
            width: 100vw;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            height: 100vh;
        }

        #loadingContainer > img {
            width: 15vw;
            top: 50%;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        p {
            color: black;
            margin: 0;
            position: absolute;
            top: 16vh;
            font-size: 12px;
            font-family: 'Montserrat';
            left: 6vw;
            font-weight: 500;
            margin-left: 2px;
        }
    </style>
</head>
<body>
    <div id="loadingContainer" class="loading-container" style="display: none;">
        <img src="imgs/loading.gif" alt="">
    </div>
    <img src="imgs/info.png" alt="" class="pag">
    <p><?php echo $_SESSION['user_nome']; ?></p>
    <div class="click"></div>
    <script>
        var loadingContainer = document.getElementById('loadingContainer');
        document.querySelector('.click').addEventListener('click', function(){
            loadingContainer.style.display = 'block';
            setTimeout(function(){
                window.location.href = 'carteira.php';
            },2000)
        });

        setTimeout(function() {
            if (loadingContainer) {
                loadingContainer.style.display = 'none';
            }
        }, 2000);
    </script>
</body>
</html>