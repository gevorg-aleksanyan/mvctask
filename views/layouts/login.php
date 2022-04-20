
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= App::asset('css/main.css');  ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title><?= Controller::$currentAction ?></title>
</head>
<body>

<div class="header">
    <a href="<?=App::url("index")?>" class="logo">CompanyLogo</a>
    <div class="header-right">
        <a href="<?=App::url("user/login")?>">Siginin </a>
        <a href="<?=App::url("user/register")?>">Signup</a>
    </div>
</div>



<!--    <div class="box" style="position:fixed;width:100%;top:0;color:#9031f0">-->
<!--        <div style="padding:10px;display:flex;justify-content:space-between;" class="header container">-->
<!--            <div class="d-flex">-->
<!--                <a href=""><img src="--><?//= App::asset('images/paravel_icon.png');  ?><!--" style="width:50px;height:50px" alt="icon"></a>-->
<!--                <p style="font-family: 'Comfortaa', cursive;margin-left: 26px;font-size: 37px;">Paravel</p>-->
<!--            </div>-->
<!--            <div>-->
<!--                <a href="--><!--" style="margin-left:20px">Login</a>-->
<!--                <a href="--><!--" style="margin-left:20px">Registration</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<div class="main container" >

    <?= $content ?>

</div>
</body>
</html>