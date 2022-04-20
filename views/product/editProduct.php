
<div class="header">

    <a href="<?=App::url("admin/admin")?>" style="margin-left:20px">Admin</a>>
    <a href="<?=App::url("product/index")?>" style="margin-left:20px">Product</a>
    <a href="<?=App::url("product/create_index")?>" style="margin-left:20px">New Product</a>
    <div class="header-right">


        <a  style="margin-left:20px;color: white;font-size: 25px"><?= $user['surname'] ?></a>
        <a  style="margin-left:20px;color: white;font-size: 25px"><?= $user['name'] ?></a>

        <a href="<?=App::url("user/logout")?>" style="margin-left:20px">Logout</a>
    </div>
</div>
<h1 class="text-center">Edit Product</h1>

<div style="display: flex;justify-content: center">
    <div style="width: 60%;height: auto">
        <form style='margin-top:50px' method='post' action='<?= App::url('product/editProduct')?>' enctype="multipart/form-data">
            <input type='text' name='name' placeholder='Product Name' value="<?= $prodEdit['name'] ?>" class='form-control' required><br>
            <input type='text' name='description' placeholder='Description'  value="<?= $prodEdit['description'] ?>" class='form-control' required><br>
            <input type='file' name='image'  class='form-control'  value="<?= $prodEdit['image'] ?>" ><br>

            <input type='hidden' name='prod_id'  value="<?= $prodEdit['id'] ?>" ><br>

            <button type='submit' name="submitEditProduct"  style='background:#392a46;color:#fff' class='btn form-control'>Edit Product</button>
        </form>
    </div>
</div>

