
<div class="header">

    <a href="<?=App::url("user/profile")?>" style="margin-left:20px">Home</a>
    <div class="header-right">
        <a href="<?=App::url("user/logout")?>" style="margin-left:20px">Logout</a>
    </div>
</div>
<h1 class="text-center">Review</h1>
<div style="display: flex;justify-content: center">
    <div style="width: 300px;display: flex;justify-content: space-around">
        <div class="star1"> <img src="<?= App::asset('image/star.png')?>" style="width: 50px;height: 50px"></div>
        <div class="star2"> <img src="<?= App::asset('image/star.png')?>" style="width: 50px;height: 50px"></div>
        <div class="star3"> <img src="<?= App::asset('image/star.png')?>" style="width: 50px;height: 50px"></div>
        <div class="star4"> <img src="<?= App::asset('image/star.png')?>" style="width: 50px;height: 50px"> </div>
        <div class="star5"> <img src="<?= App::asset('image/star.png')?>" style="width: 50px;height: 50px"></div>
    </div>
</div>
<div style="display: flex;justify-content: center"><h3 class="star"></h3></div>
<div style="display: flex;justify-content: center">
    <div style="width: 60%;height: auto">
        <form style='margin-top:50px' method='post' action='<?= App::url('review/createReview')?>'>
            <input class="star_number" name="star" type="hidden" value="">
            <input type="hidden" value="<?= $prod_id ?>" name="prod_id" >
            <input type='text' name='comment' placeholder='Comment' value="" class='form-control' required><br>


            <button type='submit' name="submitEditProduct"  style='background:#392a46;color:#fff' class='btn form-control'>Add</button>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $( document ).ready(function() {
        $( ".star1" ).click(function() {
            $(".star_number").val("1");
            $(".star").html("1 star");
        });
        $( ".star2" ).click(function() {
           $(".star_number").val("2");
            $(".star").html("2 star");
        });
        $( ".star3" ).click(function() {
            $(".star_number").val("3");
            $(".star").html("3 star");
        });

        $( ".star4" ).click(function() {
            $(".star_number").val("4");
            $(".star").html("4 star");
        });
        $( ".star5" ).click(function() {
            $(".star_number").val("5");
            $(".star").html("5 star");
        });



    });


</script>




