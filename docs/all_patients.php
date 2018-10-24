<?php 
    include('connection.php');
    include('head.php');
    include('header.php');
    include('sidebar.php');

 ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> All Patients</h1>
          <p>Table to display all patients</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">patient Lists</li>
          <li class="breadcrumb-item active"><a href="#">All Patients</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="tile">
            <div class="tile-body" >
              <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" onClick='printHtml();'>Print Page</button>
              <table class="table table-hover table-bordered" id="sampleTable"><br>
                <thead>
                  <tr >
                  <th colspan="8" style="padding-top: 50px;">
                   <p style="text-align: center; line-height: 10px;">
                      <span style="font-size: 22px;"> Ulfat</span> <span style="font-size: 36px;font-weight: bold;"> Life Care Trust </span><span  style="font-size: 22px; "> Hospital</span><br>
                       <p  style="font-size: 22px;text-align: center;">Chak 126 J.B Jhumra road Chiniot<br>041-8790777</p>
                   </p>
                    </span>
                  </th>
                  </tr>
                  <tr>
                    <th>Sr.#</th>
                     <th>Patient Name </th>
                      <th>S/O,W/O,D/O</th>
                      <th>Contact No</th>
                      <th>CNIC NO</th>
                      <th>Address</th>
                      <th>Disease</th>
                      <th>Treatmetns</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                         $nmbr=1;
                          $selectQ="SELECT patient_name, patient_father_name, CNIC_No, patient_dob, patient_cell_no, disease, patient_stars, patient_cell_no, p_address FROM patients ORDER BY patient_id  DESC ";
                          $rslt=mysqli_query($con,$selectQ);
                          while ($row=mysqli_fetch_assoc($rslt)) 
                          {
                            $disease=$row['disease'];
                            $stars=$row['patient_stars'];
                            ?>
                              <tr>
                                <td ><?php echo $nmbr ?></td>
                                <td><?php echo $row['patient_name']; ?></td>
                                <td><?php echo $row['patient_father_name']; ?></td>
                                <td><?php echo $row['patient_cell_no']; ?></td>
                                <td><?php echo $row['CNIC_No']; ?></td>
                                <td><?php echo $row['p_address']; ?></td>
                                <td><?php echo $row['disease']; ?></td>
                                <td><?php 
                                if ($disease=='Hepatitis_B') 
                                {
                                  if ($stars==3) 
                                  {
                                    echo 'Completed';
                                  }
                                  else
                                    {
                                      for ($i=1; $i <= $stars; $i++) 
                                      { 
                                        echo "<span class='glyphicon glyphicon-star' style='color: red;'></span>";
                                      }
                                      echo "<br><span>Continue</span>";
                                    }
                                }
                                else if($disease=='Hepatitis_C')
                                {
                                   if ($stars==6) 
                                  {
                                    echo "Completed";
                                  }
                                  else
                                    {
                                      for ($i=1; $i <= $stars; $i++) 
                                      { 
                                        echo "<span class='glyphicon glyphicon-star' style='color: red;'></span>";
                                      }
                                      echo "<br><span>Continue</span>";
                                    }
                                }


                               
                                  ?>
                                 </td>
                              </tr>
                          <?php
                          $nmbr+=1;
                          }
                         ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
     <script type="text/javascript">
      $(document).ready(function(){
      $('.app-menu__item').removeClass('active');
      $('.treeview-item').filter(function(){return this.href==location.href}).addClass('active');
      $('.done_it').addClass('active');
    });
  </script>
 <script src='./dist/print.min.js'></script>

         <script type="text/javascript">

            function printHtml() {
              printJS('sampleTable', 'html');
            }

         </script>
</script>

  <?php include('footer.php'); ?>