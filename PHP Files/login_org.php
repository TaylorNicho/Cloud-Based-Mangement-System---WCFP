<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if(isset($_POST['login-org']))
{
    include_once("db_functions.php");
    (new DbGet())->OrganisationCred();
}
?>
<div class="card-body">
    <form class="forms-new" method="post" enctype="multipart/form-data">
        <div class="frm-group">
            <label>PIN</label>
            <input class="frm-control" type="Password" name="o-pin" autocomplete="off" required />
        </div>

        <div class="form-group col-md-3">
            <button type="submit" style="float: left;" name="login-org" class="btn btn-sm btn-primary  mr-2 mb-4">Login</button>
        </div>
    </form>
</div>