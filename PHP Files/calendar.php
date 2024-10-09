
<?php
session_start();
include_once("db_functions.php");
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


if(!isset($_SESSION['acVID']))
{
    header('location:index.php');
    die();
}
else{

if(isset($_POST["bid"])) {
    $bid = $_POST['bid'];
    $_SESSION['bid'] = $_POST['bid'];
}
else
    $bid = 0;
unset($_SESSION['cid'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERRER MANAGEMENT SYSTEM | VIEW ALL APPOINTMENTS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php include('header.php');?>


        <script src="assets/css/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script>
            $(document).ready(function() {

                var calendar = $('#calendar').fullCalendar({
                    firstDay: 1,
                    editable:true,
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    businessHours: {
                        daysOfWeek: [ 1, 2, 3, 4 ],
                        startTime: '10:00', // a start time (10am in this example)
                        endTime: '18:00', // an end time (6pm in this example)
                    },
                    minTime: "08:00:00",
                    maxTime: "18:00:00",
                    height: 'auto',
                    events: 'calendar_load.php',
                    selectable:true,
                    selectHelper:true,
                    select: function(start, end)
                    {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                        $.ajax({
                         url:"calendar_new.php",
                         type:"post",
                          data:{cal_start:start,cal_end:end},
                           success:function(data){
                              $("#info_cal_new").html(data);
                               $("#mod_cal_new").modal('show');
                            }
                    });
                    },
                    editable:true,
                    eventResize:function(event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"calendar_update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function(){
                                calendar.fullCalendar('refetchEvents');
                                alert('Event Update');
                            }
                        })
                    },
                    eventDrop:function(event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"calendar_update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated");
                            }
                        });
                    },
                    eventClick:function(event)
                    {
                        if(confirm("Are you sure you want to edit it?"))
                        {
                            var cal_id = event.id;
                            $.ajax({
                                url:"calendar_edit.php",
                                type:"post",
                                data:{aid:cal_id},
                                success:function(data){
                                    $("#info_cal_new").html(data);
                                    $("#mod_cal_new").modal('show');
                                }
                            });
                        }
                    },
                });
            });
        </script>

    <body>
    <div class="content-wrapper">
        <div class="container">
            <h4 class="header-line">ADMIN | MANAGE BRANCHES </h4>
        </div>
    <div class="container">
        <div class="col-a4">
            <div class="frm-group">
                <form method="POST" action="">
                    <select class="frm-control" type="text" name="bid" id="bid" onchange="this.form.submit()">

                        <?php
                        if($bid!=0)
                        { ?>
                            <option value=0>ALL</option> <?php
                        }
                        (new DbOptions())->Branch("$bid"); ?>
                    </select>
                </form>
            </div>
        </div>
        <div id="calendar"></div>
    </div>

    <div id="mod_cal_new" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content frm1-type3">
                <div class="frm1-heading">
                    NEW CALENDAR APPOINTMENT
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info_cal_new">
                    <?php @include("calendar_new.php"); ?>
                </div>
            </div>
        </div>
    </div>

    <div id="mod_cal_edit" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content frm1-type3">
                <div class="frm1-heading">
                    EDIT CALENDAR APPOINTMENT
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info_cal_edit">
                    <?php @include("calendar_edit.php"); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/css/js/bootstrap-select.min.js"></script>
    <script src="assets/css/js/bootstrap.min.js"></script>
    <script src="assets/css/js/dataTables.bootstrap.min.js"></script>
    </body>
</html><?php } ?>
