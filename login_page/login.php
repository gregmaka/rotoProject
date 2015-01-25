<?php  ini_set('display_errors', '0'); ?>
<link rel="stylesheet" type="text/css" href="/roto/main.css" />
<div id="mainScreen">
<h1>Login</h1>
   <form action="." method="POST">
    <p><label>User Name : </label>
    <input id="username" type="text" name="username" placeholder="username" /></p>

     <p><label>Password : </label>
     <input id="password" type="password" name="password" placeholder="password" /></p>
     <input type="hidden" name="action" value="login" />
    <input type="submit" name="submit" value="Login" />
    </form>
</div>
