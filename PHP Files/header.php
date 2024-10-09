<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
?>
    <style>
        #menu-top a.active {
            background-color: #04AA6D;
            color: white;
        }
    </style>
<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$current_page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo $uri_segments[0];

if(isset($_SESSION['acVID']) && isset($_SESSION['acROL']))

{?>

    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-a5">
                        <ul id="menu-top" class="nav navi-nav navi-right">
                            <li><a class="<?php if($current_page=="/WCFP/dashboard_adm.php"){ ?>active<?php } ?>" href="dashboard_adm.php">Home</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/reports.php"){ ?>active<?php } ?>" href="reports.php">Reports</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/calendar.php"){ ?>active<?php } ?>" href="calendar.php">Appointments</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/branches.php"){ ?>active<?php } ?>" href="branches.php">Branches</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/clients.php" || $current_page=="/WCFP/client_edit.php"){ ?>active<?php } ?>" href="clients.php">Clients</a></li>
							<li><a class="<?php if($current_page=="/WCFP/referrals.php"){ ?>active<?php } ?>" href="referrals.php">Referrals</a></li>
							<li><a class="<?php if($current_page=="/WCFP/organisations.php"){ ?>active<?php } ?>" href="organisations.php">Referrers</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/volunteers.php"){ ?>active<?php } ?>" href="volunteers.php">Volunteers</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/statuses.php"){ ?>active<?php } ?>" href="statuses.php">Status</a></li>
                            <li><a class="<?php if($current_page=="/WCFP/logout.php"){ ?>active<?php } ?>" href="logout.php">Logout</a></li>

                        </ul>
                    </div>
            </div>
        </div>
    </section>
    <?php 
}
elseif(isset($_SESSION['acVID']))
{?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-a5">
                    <ul id="menu-top" class="nav navi-nav navi-right">
                        <li><a class="<?php if($current_page=="/WCFP/dashboard.php"){ ?>active<?php } ?>"href="dashboard.php">Home</a></li>
                        <li><a class="<?php if($current_page=="/WCFP/referrals.php"){ ?>active<?php } ?>"href="referrals.php">Referrals</a></li>
                        <li><a class="<?php if($current_page=="/WCFP/clients.php"){ ?>active<?php } ?>"href="clients.php">Clients</a></li>
                        <li><a class="<?php if($current_page=="/WCFP/logout.php"){ ?>active<?php } ?>"href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
}
elseif(isset($_SESSION['rlogin']))
{?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-a5">
                    <ul id="menu-top" class="nav navi-nav navi-right">
                        <li><a class="<?php if($current_page=="/WCFP/dashboard_rfr.php"){ ?>active<?php } ?>"href="dashboard_rfr.php">Home</a></li>
                        <li><a class="<?php if($current_page=="/WCFP/logout.php"){ ?>active<?php } ?>"href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php
}
else
{?>
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-a5">
                        <ul id="menu-top" class="nav navi-nav navi-right">
                            <li><a class="<?php if($current_page=="/index.php"){ ?>active<?php } ?>"href="index.php">Home</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </section>
    <?php
}?>