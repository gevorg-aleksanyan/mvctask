<h1 class="text-center">Registration</h1>
<?php if($message) {  ?>
    <p> <?= $message ?> </p>
<?php } ?>
<div>
    <form style='margin-top:50px' method='post' action='<?= App::url('user/register')?>'>
        <input type='text' name='firstname' placeholder='First Name' class='form-control' required><br>
        <input type='text' name='surname' placeholder='Last Name' class='form-control' required><br>
        <input type='number' name='age' placeholder='Age' class='form-control' required><br>
        <input type='email' name='email' placeholder='Email' class='form-control' required><br>
        <input type='password' name='password' placeholder='Password' class='form-control' required><br>
        <input type='password' name='confpassword' placeholder='Cinfirm Password' class='form-control' required><br>
        <button type='submit' name="register" value="1" style='background:#392a46;color:#fff' class='btn form-control'>Register</button>
    </form>
</div>


