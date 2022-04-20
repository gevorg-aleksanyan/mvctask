
<div class="header">

    <a href="<?=App::url("admin/admin")?>" style="margin-left:20px">Admin</a>
    <a href="<?=App::url("product/create_index")?>" style="margin-left:20px">New Product</a>
    <a href="<?=App::url("admin/adduser")?>" style="margin-left:20px">Add User</a>
    <div class="header-right">


        <a  style="margin-left:20px;color: white;font-size: 25px"><?= $user['surname'] ?></a>
        <a  style="margin-left:20px;color: white;font-size: 25px"><?= $user['name'] ?></a>

        <a href="<?=App::url("user/logout")?>" style="margin-left:20px">Logout</a>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<div style="padding-top: 80px">

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>AVG Review</th>
            <th>Edit</th>
            <th>Delete</th>
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
                <td><a href="<?=App::url("product/editProduct/prod_id/".$prod['id'])?>">Edit</a></td>
                <td> <a onclick="return confirm('Are you sure?')" href="<?=App::url("product/deleteProduct/prod_id/".$prod['id']) ?>">Delete</a></td>
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

