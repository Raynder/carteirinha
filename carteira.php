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
            height: 30%;
            position: absolute;
            top: 0;
        }
        .click2 {
            width: 50vw;
            height: 20%;
            position: absolute;
            top: 80%;
        }
        .click3 {
            left: 50%;
            width: 50vw;
            height: 20%;
            position: absolute;
            top: 80%;
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

        .dados {
            font-family: 'Montserrat';
            left: 23%;
            font-size: 11px;
            top: 19vh;
            z-index: 99999;
            position: absolute;
            transform: rotate(90deg);
            display: flex;
            flex-direction: column;
            gap: 12px;
            font-weight: 500;
            margin-top: 2px;
        }

        .dados > p {
            margin: 0;
        }

        .user_img {
            position: relative;
            width: 19vw;
            height: 32vw;
            z-index: 999999;
            transform: rotate(90deg);
            top: 36vh;
            left: 54vw;
            overflow: hidden; /* Garante que a imagem não transborde */
        }

        .user_img > img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Faz com que a imagem preencha a área mantendo sua proporção */
        }

    </style>
</head>
<body>
    <div id="loadingContainer" class="loading-container" style="display: none;">
        <img src="imgs/loading.gif" alt="">
    </div>
    <img src="imgs/carteira.png" alt="" class="pag">
    <div class="dados">
        <p><?php echo $_SESSION['user_nome']; ?></p>
        <p><?php echo $_SESSION['user_curso']; ?></p>
        <p><?php echo $_SESSION['user_modalidade']; ?></p>
    </div>

    <div class="user_img">
        <img src="<?php echo $_SESSION['user_img']; ?>" alt="">
    </div>
    <div class="click"></div>
    <div class="click2"></div>
    <div class="click3"></div>
    <script>
        var loadingContainer = document.getElementById('loadingContainer');
        document.querySelector('.click').addEventListener('click', function(){
            loadingContainer.style.display = 'block';
            setTimeout(function(){
                window.location.href = 'dashboard.php';
            },2000)
        });

        // document.querySelector('.click2').addEventListener('click', function(){
        //     loadingContainer.style.display = 'block';
        //     setTimeout(function(){
        //         window.location.href = 'logout.php';
        //     },2000)
        // });

        setTimeout(function() {
            if (loadingContainer) {
                loadingContainer.style.display = 'none';
            }
        }, 2000);

        var positionLeft = 23;

        document.querySelector('.click2').addEventListener('click', function() {
            let dadosElement = document.querySelector('.dados');
            dadosElement.style.color = 'black';
            positionLeft = positionLeft - 1;

            dadosElement.style.left = positionLeft + 'vw';
        });

        document.querySelector('.click3').addEventListener('click', function() {
            let dadosElement = document.querySelector('.dados');
            dadosElement.style.color = 'black';
            positionLeft = positionLeft + 1;

            dadosElement.style.left = positionLeft + 'vw';
        });



    </script>
</body>
</html>