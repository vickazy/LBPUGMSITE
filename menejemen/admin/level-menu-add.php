﻿<?php
include '../inc/inc-db.php';
session_start();
error_reporting(0);

    $var_levelid = ($_GET['id']); // menangkap id level
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
      <meta charset="UTF-8" />
    <title>LEVEL MENU ADD</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES --> 

    <!-- PAGE LEVEL STYLES -->
    
 <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
   
    <!-- END PAGE LEVEL  STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

       <!-- MAIN WRAPPER -->
    <div id="wrap">


          <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> Joe Romlin</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />   
                    </div>
                        <!-- KONEKSI MENU DINAMIS -->
                         <ul id="menu" class="collapse">
                            <?php 
                             include '../inc/inc-menu.php';
                             ?> 
                     </ul>
           
                    </div>
        <!--END MENU SECTION -->

       <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h3>LABORATORIUM BIOANTROPOLOGI DAN PALEOANTROPOLOGI  </h3>
                </div>
            </div>
                     
                    
                    
                                

<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <h5>Fasilitas</h5>
                <div class="toolbar">   
                </div>
        </header>

        <!-- DIV UNTUK LEVEL MENU ADD -->
        <div id="div-1" class="accordion-body collapse in body">
            <form action="level-menu-add-save.php?id=<?php echo $var_levelid; ?>" method="post" class="form-horizontal">
                    <?php 
        $tampil     = "SELECT level_name FROM ref_level WHERE level_id='".$var_levelid."'";
        $run1       = mysql_query($tampil);
        $var_data   = mysql_fetch_array($run1);

        $var_nama = $var_data['level_name'];

            echo $var_nama;
    ?> <br/>
    Fasilitas <br/>
    <?php 
        $tampil      = "SELECT menu_id, menu_name, menu_url FROM ref_menu";
        $run         = mysql_query($tampil);
        $a = 0; //start looping utk menu (menu1, menu2, menu3 dst)

        while ($fasilitas = mysql_fetch_array($run)) { // perulangan utk menampilkan SEMUA menu yg ada di database
            $var_menuid = $fasilitas['menu_id']; // id menu di TABEL MENU
            $var_menuname = $fasilitas['menu_name']; 
            $a++;
            // ==========================================================================
            $checklistmenu = "SELECT menu_id FROM ref_level_menu WHERE level_id='".$var_levelid."'"; // ambil id menu pada operator yg dipilih
            $runchecklistmenu = mysql_query($checklistmenu);
            while ($datamenu=mysql_fetch_array($runchecklistmenu)) { // perulangan utk menampilkan yg checklist
                $var_menuku = $datamenu['menu_id']; // daftar menu yg didapat ditampung dlm var $menuku 
                
                if ($var_menuid==$var_menuku) { // membandingkan id_menu di TABEL MENU dan TABEL LEVEL_MENU ($id hanya satu dan dibandingkan dgn seluruh hasil $menuku)
                    $notice = 1; // jika cocok diberi nilai 1 (terisi/checklist)
                
                if ($var_menuku==13) { //untuk menu logout jelas pasti terpilih ?> 
                <div class="form-group"> 
                    <!-- <label for="text1" class="control-label col-lg-4">Nama Level</label> -->

                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value=<?php echo $var_menuid ?> name=<?php echo "menu".$a ?> checked /> <?php echo $var_menuname ?> <br/>            
            <?php       $var_newid = $var_menuid; //agar tidak terulang yg sudah dicentang tdk di cetak lg" />
                        }
                    else {
                    ?>
                    <input type="checkbox" value=<?php echo $var_menuid ?> name=<?php echo "menu".$a ?> checked /> <?php echo $var_menuname ?> <br/>                
        <?php           $var_newid = $var_menuid;
                        //peritah diatas perlakuan menu yg non logout dan sudah cocok dgn menuku maka ditampilkan dgn tanda checklist   
                    }// else
                }// if menuid
            
                $notice=0;  
            }// while datamenu

            if ($notice!=1 && $var_menuid!=$var_newid) { //perlakuan default (menu tdk terdaftar dlm menuku)  ?> 
                <input type="checkbox" value=<?php echo $var_menuid ?> name=<?php echo "menu".$a ?> /> <?php echo $var_menuname ?> <br/>                                                                                                    
    <?php
            }//if
        }// while fasilitas (checkbox default)
    ?>
                        </label>
                    </div>
                </div>
                &nbsp
                <div align="center">
                    <input type="submit" name="btn_submit" class="btn btn-success" value="SUBMIT" align="right">
                    <input type="refresh" value="REFRESH" class="btn btn-warning">
                    </div>
                </div>

               
            </form>
        </div>
    </div>
</div>
   
    </div>
            </div>
        </div>
    </div>
</div>

<!-- END COLOR PICKER -->


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END TIME PICKER -->




                    
                    </div>
                    
                    
                  </div>  
        <!-- END PAGE CONTENT -->

                </div>
        
    
       <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->


      <!-- PAGE LEVEL SCRIPT-->
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
        
     <!--END PAGE LEVEL SCRIPT-->
     
</body>
     <!-- END BODY -->
</html>