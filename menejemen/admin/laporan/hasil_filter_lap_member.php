<?php 
		if (isset($_POST['filter'])) {

			 $per1=$_POST['periode1'];
  			 $per2=$_POST['periode2'];
  			 $query ="SELECT * from tbl_member WHERE member_register_date BETWEEN '$per1' AND '$per2'";

		}
 ?>
 <div id="content">
			<div class="inner">
				<div class="row" style="padding-top: 10px; padding-right: 10px; padding-left: 10px;">
                <div class="panel panel-primary" style="border-color: #1ab394;">
                    <div class="panel-heading">
                       <div class="row">
                            <div class="col-md-4">
                             <span class=""></span>
                        </div>
                        <div class="col-md-8">
                            <div class="text-right"><b><i><span class="fa fa-home"></span> Home / <span class="fa fa-list"></span> Laporan / <span class="fa fa-users"> </span> Pembayaran</i></b></div>
                            
                        </div>
                       </div>
                    </div>
                    
                </div>
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary" style="border-color:#f8f8f8;">
                        <div class="panel-heading">
                            <span class=""></span> Laporan Data Rekap Member
                        </div>
                        <div class="panel-body dim_about">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTables-example">
                                    <thead>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>TANGGAL DAFTAR</th>
                                        <th>INSTANSI</th>
                                        <th>FAKULTAS / BIDANG</th>
                                        <th>EMAIL</th>
                                        <th>STATUS</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no =1;
                                            $show = mysql_query($query);
                                            while ($runshow = mysql_fetch_array($show)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $runshow['member_name']; ?></td>
                                                <td><?php echo $runshow['member_register_date']; ?></td>
                                                <td><?php echo $runshow['member_institution']; ?></td>
                                                <td><?php echo $runshow['member_faculty']; ?></td>
                                                <td><?php echo $runshow['member_email']; ?></td>
                                                <td><?php echo $runshow['member_status']; ?></td>
                                            </tr> 
                                            <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            <div align="center">
                                <a href="laporan/export_laporan_pembayaran_exel.php" target="_BLANK" class="btn btn-success"><span class="fa fa-file-excel-o"></span> Export to Excel</a>
                                <a href="laporan/cetak_laporan_pembayaran_pdf.php" target="_BLANK" class="btn btn-warning"><span class="fa fa-file-pdf-o"></span> Export to PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>