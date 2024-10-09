<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(isset($_POST['login-vol']))
{
    include_once("db_functions.php");
    (new DbGet())->UserCred();
    unset($_POST);
}
?>
<div class="card-body">
    <form class="forms-new" method="post" enctype="multipart/form-data">
        <div class="frm-group">
            <label>Volunteer UID</label>
            <input class="frm-control" type="text" name="vol-log-uid" required autocomplete="off" />
        </div>
        <div class="frm-group">
            <label>Password</label>
            <input class="frm-control" type="password" name="vol-log-pass" required autocomplete="off"/>
        </div>

        <div class="form-group col-md-3">
            <button type="submit" style="float: left;" name="login-vol" class="btn btn-sm btn-primary mr-2 mb-4">Login</button>
        </div>
    </form>
</div>