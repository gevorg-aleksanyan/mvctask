
<div class="header">

    <a href="<?=App::url("admin/admin")?>" style="margin-left:20px">Home</a>
    <div class="header-right">
        <a href="<?=App::url("user/logout")?>" style="margin-left:20px">Logout</a>
    </div>
</div>


<div style="display: flex;justify-content: center;padding-top: 50px">
    <div style="width: 80%;height: auto;display: flex;justify-content: space-around">

        <div>
            <img src="<?= App::asset('uploads/'.$product['image']) ?>" style="width: 80%;height: 80%">
        </div>

        <div>
            <h1><?php echo $product['name'] ?></h1>
            <h4><?php echo $product['description'] ?></h4>
        </div>


    </div>


</div>

<div  style="display: flex;justify-content: center;padding-top: 50px">
<div style="width: 80%;">
    <?php foreach ($reviews as $review){?>
        <div style="width: 80%;height: auto;border: solid black 1px">

            <div style="display: flex;width: 30%;justify-content: space-around">
                <p><?= $review['user_name'] ?></p> <p><?= $review['stars'] ?></p> <p>stars</p>
            </div>
            <div style="padding-left: 30px;display: flex;">
                <h6>Comment:</h6>
                <p style="margin-left: 20px"><?= $review['comment'] ?></p>
            </div>


        </div>
    <?php } ?>
</div>

</div>
