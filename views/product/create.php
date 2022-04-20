
<div class="header">

    <a href="<?=App::url("admin/admin")?>" style="margin-left:20px">Home</a>
    <div class="header-right">

        <a href="<?=App::url("user/logout")?>" style="margin-left:20px">Logout</a>
    </div>
</div>
<h1 class="text-center">New Product</h1>

<div style="display: flex;justify-content: center">
  <div style="width: 60%;height: auto">
      <form style='margin-top:50px' method='post' action='<?= App::url('product/create')?>' enctype="multipart/form-data">
          <input type='text' name='name' placeholder='Product Name' class='form-control' required><br>
          <input type='text' name='description' placeholder='Description' class='form-control' required><br>
          <input type='file' name='image'  class='form-control' ><br>

          <button type='submit' name="subb"  style='background:#392a46;color:#fff' class='btn form-control'>Add Product</button>
      </form>
  </div>
</div>

