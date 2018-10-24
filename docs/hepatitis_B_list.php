<?php 
    include('connection.php');
    include('head.php');
    include('header.php');
    include('sidebar.php');

 ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Hepatitis_B</h1>
          <p>Table to display Hepatitis_B Patients list</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Patient Lists</li>
          <li class="breadcrumb-item active"><a href="#">Hepatitis_B</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr.#</th>
                     <th>Patient Name </th>
                      <th>S/O</th>
                      <th>Contact No</th>
                      <th>CNIC NO</th>
                      <th>Address</th>
                      <th>Disease</th>
                      <th>Treatments</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                         $nmbr=1;
                          $selectQ="SELECT patient_name, patient_father_name, CNIC_No, patient_dob, patient_cell_no, disease, patient_stars, patient_cell_no, p_address FROM `patients` WHERE disease='Hepatitis_B' ORDER BY `patient_id`  DESC ";
                          $rslt=mysqli_query($con,$selectQ);
                          while ($row=mysqli_fetch_assoc($rslt)) 
                          {
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
                                  for ($i=1; $i <= $stars; $i++) { 
                                    echo "<span class='glyphicon glyphicon-star' style='color: red;'></span>";
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
 <?php include('footer.php'); ?>