<?php
  error_reporting(0);
  session_start();
  $status = $_SESSION['status'];
  $username = $_SESSION['username'];

  if ($status !=="admin") {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi E-Schedule</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome-4.4.0/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap.css">

  </head>
  <body class="hold-transition skin-green sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <?php
        include 'include/header.php';
        // <!-- Left side column. contains the logo and sidebar -->
        include 'include/menu.php';
      ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Small boxes (Stat box) -->
            <?php
              $page = $_REQUEST['page'];
              if (empty($page)) {
                include 'include/content.php';
              } else {
                include 'include/'.$page;
              }
            ?>
          <!-- Main row CONTENT-->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright 2015</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- <script src="plugins/valid.js"></script> -->
    <!-- fullCalendar -->
    <script src="bower_components/moment/moment.js"></script>
    <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="plugins/captcha.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script type="text/javascript">

      $(function(){
        //Initialize Select2 Elements
        $(".select2").select2();
        //Initialize datepicker Elements
        $("#datepicker").datepicker();
      });

    $(document).ready(function() {
      $("#tgl1").on('change', function(event){
        var tgl1 = $("#tgl1").val();
        var time1 = $("#time1").val();
        var time2 = $("#time2").val();
        // console.log('Jam 1 = ' + time1);
        // console.log('Jam 2 = ' + time2);

        $("#isi2").load('include/jadwal/valid.php', {"tgl1":tgl1, "time1":time1, "time2":time2});
      });
    });
    </script>

    <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function init_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex        : 1070,
              revert        : true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            })

          })
        }

        init_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
        $('#calendar').fullCalendar({
          header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week : 'week',
            day  : 'day'
          },
          //Random default events
          events    : [
            <?php 
              include 'include/koneksi.php';
              $sql = "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi ORDER BY id_jadwal DESC";
              $query = mysqli_query($db, $sql);
              $no = 1;
              while ($ambil = mysqli_fetch_array($query)) {
                $id = $ambil['id_jadwal'];
                $nama = $ambil['nama_jadwal'];
                $nama_kegiatan = $ambil['nama_kegiatan'];
                $nama_lokasi = $ambil['nama_lokasi'];
                $tgl1 = $ambil['tgl_mulai'];
                $jam1 = $ambil['jam_mulai'];
                $jam2 = $ambil['jam_selesai'];
                $tgl2 = $ambil['tgl_selesai'];
                $pembicara = $ambil['pembicara'];
                $status = $ambil['status'];

                if ($status == "publish") {
                  $color = "green";
                } else {
                  $color = "blue";
                }

                $tgl1 = explode('-', $tgl1);
                $tahun1 = $tgl1[0];
                $bulan1 = $tgl1[1];
                $hari1  = $tgl1[2];

                $tgl2 = explode('-', $tgl2);
                $tahun2 = $tgl2[0];
                $bulan2 = $tgl2[1];
                $hari2  = $tgl2[2];
            ?>
              {
                title          : '<?php echo $nama; ?>',
                start          : new Date('<?php echo $tahun1; ?>, <?php echo $bulan1; ?>,  <?php echo $hari1; ?>'),
                end            : new Date('<?php echo $tahun2; ?>, <?php echo $bulan2; ?>,  <?php echo $hari2; ?>'),
                url            : '?page=jadwal/jadwal.php&j=<?php echo $status; ?>&id=<?php echo $id; ?>',
                backgroundColor: '<?php echo $color; ?>', //red
                borderColor    : '#f56954' //red
              },
            <?php }; ?>
            //,
            // {
            //   title          : 'Long Event',
            //   start          : new Date(y, m, d - 5),
            //   end            : new Date(y, m, d - 2),
            //   backgroundColor: '#f39c12', //yellow
            //   borderColor    : '#f39c12' //yellow
            // },
            // {
            //   title          : 'Meeting',
            //   start          : new Date(y, m, d, 10, 30),
            //   allDay         : false,
            //   backgroundColor: '#0073b7', //Blue
            //   borderColor    : '#0073b7' //Blue
            // },
            // {
            //   title          : 'Lunch',
            //   start          : new Date(y, m, d, 12, 0),
            //   end            : new Date(y, m, d, 14, 0),
            //   allDay         : false,
            //   backgroundColor: '#00c0ef', //Info (aqua)
            //   borderColor    : '#00c0ef' //Info (aqua)
            // },
            // {
            //   title          : 'Birthday Party',
            //   start          : new Date(y, m, d + 1, 19, 0),
            //   end            : new Date(y, m, d + 1, 22, 30),
            //   allDay         : false,
            //   backgroundColor: '#00a65a', //Success (green)
            //   borderColor    : '#00a65a' //Success (green)
            // },
            // {
            //   title          : 'Click for Google',
            //   start          : new Date(y, m, 28),
            //   end            : new Date(y, m, 29),
            //   url            : 'http://google.com/',
            //   backgroundColor: '#3c8dbc', //Primary (light-blue)
            //   borderColor    : '#3c8dbc' //Primary (light-blue)
            // }
          ],
          editable  : true,
          droppable : true, // this allows things to be dropped onto the calendar !!!
          drop      : function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject')

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject)

            // assign it the date that was reported
            copiedEventObject.start           = date
            copiedEventObject.allDay          = allDay
            copiedEventObject.backgroundColor = $(this).css('background-color')
            copiedEventObject.borderColor     = $(this).css('border-color')

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove()
            }

          }
        })

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault()
          //Save color
          currColor = $(this).css('color')
          //Add color effect to button
          $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
        })
        $('#add-new-event').click(function (e) {
          e.preventDefault()
          //Get value and make sure it is not null
          var val = $('#new-event').val()
          if (val.length == 0) {
            return
          }

          //Create events
          var event = $('<div />')
          event.css({
            'background-color': currColor,
            'border-color'    : currColor,
            'color'           : '#fff'
          }).addClass('external-event')
          event.html(val)
          $('#external-events').prepend(event)

          //Add draggable funtionality
          init_events(event)

          //Remove event from text input
          $('#new-event').val('')
        })
      })
    </script>
  </body>
</html>
