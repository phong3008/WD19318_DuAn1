<?php
include('header.php');
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Phim đang chiếu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th class="col-md-1">STT</th>
                  <th class="col-md-3">Màn hình</th>
                  <th class="col-md-4">Thời gian</th>
                  <th class="col-md-4">Phim</th>
                </tr>
                <?php 
					$qry8=mysqli_query($con,"select * from tbl_shows where r_status=1 and theatre_id='".$_SESSION['theatre']."'");
					$no=1;
					while($mn=mysqli_fetch_array($qry8))
					{
					 $qry9=mysqli_query($con,"select * from tbl_movie where movie_id='".$mn['movie_id']."'");
					 $mov=mysqli_fetch_array($qry9);
					 $qry10=mysqli_query($con,"select * from tbl_show_time where st_id='".$mn['st_id']."'");
					 $scr=mysqli_fetch_array($qry10);
					 $qry11=mysqli_query($con,"select * from tbl_screens where screen_id='".$scr['screen_id']."'");
					 $scn=mysqli_fetch_array($qry11);
					?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><span class="badge bg-green"><?php echo $scn['screen_name'];?></span></td>
                  <td><span class="badge bg-light-blue"><?php echo $scr['start_time'];?>(<?php echo $scr['name'];?>)</span></td>
                  <td><?php echo $mov['movie_name'];?></td>
                  </tr>
                  <?php
					       $no=$no+1;
					  
					}
                  ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
            
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>