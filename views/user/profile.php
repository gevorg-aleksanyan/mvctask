
<div class="header">

    <a href="<?=App::url("user/profile")?>" style="margin-left:20px">User</a>
    <div class="header-right">

           <a  style="margin-left:20px;color: white;font-size: 25px"><?= $user['surname'] ?></a>
           <a  style="margin-left:20px;color: white;font-size: 25px"><?= $user['name'] ?></a>

        <a href="<?=App::url("user/logout")?>" style="margin-left:20px">Logout</a>
    </div>
</div>


<div style="padding-top: 80px">

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>AVG Review</th>
            <th>Review</th>
            <th>Product page</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $prod){ ?>
        <tr>
            <td>   <img src="<?= App::asset('uploads/'.$prod['image']) ?>" style="width:50px;height:50px" alt=""></td>
            <td><?php echo $prod['name'] ?></td>
            <td><?php echo $prod['description'] ?></td>
            <td><?php echo $prod['avg_review'] ?></td>
            <td><a href="<?=App::url("review/reviewProduct/prod_id/".$prod['id'])?>">Review</a></td>
            <td><a href="<?=App::url("product/singlProduct/prod_id/".$prod['id'])?>">See more</a></td>
        </tr>
        <?php } ?>

        </tbody>


    </table>

</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script
