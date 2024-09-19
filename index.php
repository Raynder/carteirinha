<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>IFG MOBILE</title>
</head>
<body>
    <img src="imgs/home.png" alt="">
    <div class="click"></div>
</body>

<style>
    body{
        margin: 0;
    }
    img{
        position: absolute;
        width: 100vw;
        height: 100vh;
    }
    .click{
        width: 100vw;
        height: 30%;
        position: absolute;
        top: 70%;
    }
</style>
<script>
    document.querySelector('.click').addEventListener('click', function(){
        window.location.href = 'login.php';
    })
</script>
</html>