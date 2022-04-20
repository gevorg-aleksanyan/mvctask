<h1 class="text-center">Login</h1>
<div>
    <form style='margin-top:50px' method='post' action='<?= App::url('user/login')?>'>
        <input type='email' name='email' placeholder='Email' class='form-control'><br>
        <input type='password' name='password' placeholder='Password' class='form-control'><br>
        <button type='submit' style='background:#392a46;color:#fff' class='btn form-control'>Login</button>
    </form>
</div>
