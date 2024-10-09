<?php 
session_start();

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include_once("db_functions.php");

if(isset($_POST['save']))
{
    (new DbNew())->Client();
}?>

<form class="forms-new" method="post" enctype="multipart/form-data">


    <div class="row ">
        <div class="form-group col-md-5">
            <label>Organisation</label>
            <input type="text" name="Organisation" class="form-control" value="" id="Organisation" placeholder="Enter Organisation" autocomplete="off" required>
        </div>
        <div class="form-group col-md-3">
            <label >PIN</label>
            <input type="text" name="PIN" value="" placeholder="Enter PIN" class="form-control" id="PIN" autocomplete="off" required>
        </div>
        <div class="form-group col-md-3">
            <label>Active <span style="color:red;"></span></label>
            <select class="frm-control" name="Active">
                <option value=0>No</option>
                <option value=1>Yes</option>
            </select>
        </div>
    </div>


    <div class="form-group col-md-3">
        <button type="submit" style="float: left;" name="save" class="btn btn-primary  mr-2 mb-4">Save</button>
    </div>

</form>