
  
 <?php 
    include('connection.php');
    include('head.php');
    include('header.php');
    include('sidebar.php');

  ?>
    <!-- Navbar-->
    
    <!-- Sidebar menu-->
   
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-medkit"></i> Treatment</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Treatment</a></li>
        </ul>
      </div>
      <div class="row" >
        <div class="offset-lg-1 col-lg-10  " style="border: 1px solid white; padding: 20px;">
        <?php
             if (isset($_POST['Treat'])) 
        {
           $tr_patient_id=$_POST['p_id'];
           $tr_cnic_no=$_POST['p_cnic'];
           $trt_date=$_POST['trt_date'];
           $tr_disease=$_POST['p_disease'];
          $insertQ="INSERT INTO treatment (tr_patient_id,tr_cnic_no,tr_date ) values ('$tr_patient_id', '$tr_cnic_no', '$trt_date') ";
          if (mysqli_query($con,$insertQ))
          {
            echo "<div class='alert alert-success'>Treated Successfully !</div>";
          }
          else
          {
            echo "<div class='alert alert-danger'>Problem accured !</div>";
          }
            $updateQ="UPDATE patients SET patient_stars=patient_stars+1 WHERE CNIC_No='$tr_cnic_no'";
            mysqli_query($con,$updateQ);



          if ($tr_disease=='Hepatitis_C') 
          {
            $selectQ="SELECT Savera_q, XOLOX_q, DAKLANA_q FROM patients WHERE CNIC_No='$tr_cnic_no'";
            $rslt=mysqli_query($con,$selectQ);
            $rr=mysqli_fetch_assoc($rslt);
            $Savera_q= $rr['Savera_q'];
            $XOLOX_q= $rr['XOLOX_q'];
            $DAKLANA_q= $rr['DAKLANA_q'];
              $updateQ="UPDATE stocks SET drug_quantity=drug_quantity-$Savera_q WHERE drug_id=1";
              mysqli_query($con,$updateQ);
              $updateQ="UPDATE stocks SET drug_quantity=drug_quantity-$DAKLANA_q WHERE drug_id=2";
              mysqli_query($con,$updateQ);
               $updateQ="UPDATE stocks SET drug_quantity=drug_quantity-$XOLOX_q WHERE drug_id=3";
              mysqli_query($con,$updateQ);
          }
          else if ($tr_disease=='Hepatitis_B') 
          {
              $updateQ="UPDATE stocks SET drug_quantity=drug_quantity-30 WHERE drug_id=4";
              mysqli_query($con,$updateQ);
          }
              
              
        }


       ?>

        <div style="padding: 0px;margin: 0px">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h2>
                    Search Patient
                  </h2>
                </div>
                <div class="panel-body">
                  <form action="Treatment.php" method="post">
                    <div class="form-group">
                      <label for="p_cnic" class="control-label col-md-2">CNIC NO:</label>
                      <div class="col-md-6" >
                        <input type="CNIC" name="p_cnic" id="cnic" maxlength="15" class="form-control">
                      </div>
                    </div>
                    <input type="submit" name="Search" value="Search" id="search" class="btn btn-info ">
                  </form>
                  
                  <div class="panel panel-info" style="margin-top: 20px;">
                    <div class="panel-heading">
                      <h2>Patient Info</h2>
                    </div>
                    <div class="panel-body">
                      <?php 
                        if (isset($_POST['Search']))
                        {
                          $p_cnic=$_POST['p_cnic'];

                          $selectQ="SELECT patient_id, patient_name, rel_type, patient_father_name,
                          disease, patient_cell_no, CNIC_No, patient_stars, Savera_q, XOLOX_q, DAKLANA_q from patients WHERE CNIC_No='$p_cnic' ";
                          $result=mysqli_query($con,$selectQ);
                          $row=mysqli_fetch_assoc($result);
                          $p_id=$row['patient_id'];
                          $Ten=0;
                          if ($row['disease']=='Hepatitis_B') 
                          {
                            $Ten=30;
                          }

                        ?>
                      <form method="post" action="treatment.php">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="title">Patient Name:</label>
                              <?php 
                                $star=1;
                                $p_stars=$row['patient_stars'];

                                while ($star<= $p_stars) 
                                {
                               ?>
                                  <span  class="glyphicon glyphicon-star pull-right " style="color: red;">  </span>
                                  <?php 
                                  $star+=1;
                                    }
                                   ?>
                              <input type="CNIC" readonly="readonly" id="title" name="p_name" class="form-control" value="<?php echo $row['patient_name']; ?>">
                              <input type="hidden" name="p_id" value="<?php echo $row['patient_id']; ?>" >
                            </div> 
                            <div class="form-group">
                              <label for="rel_type">Relation Type:</label>
                              <input type="text" readonly="readonly" name="rel_type" id="rel_type" class="form-control" value="<?php echo $row['rel_type']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="catagory">Patient Father Name:</label>
                              <input type="text" readonly="readonly" name="p_father_name" id="catagory" class="form-control" value="<?php echo $row['patient_father_name']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="#disease">Disease:</label>
                              <input type="text"  id="disease" readonly="readonly" name="p_disease"  value="<?php echo $row['disease']; ?>" class="form-control">
                            </div>
                               <div class="row" id="h_c" style="height: 50px; margin-bottom: 20px;">
                                <div class="col-lg-3"> 
                                <div class="form-group">
                                  <label for="name" class="col-md-4 control-label">Sav:</label>
                                    <input type="number" name="Savera_q" readonly="readonly" class="form-control" value="<?php echo $row['Savera_q']; ?>">
                                </div>
                                </div>
                                <div class="col-lg-3"> 
                                <div class="form-group">
                                  <label for="name" class="col-md-4 control-label">XOL:</label>
                               
                                    <input type="number" name="XOLOX_q"  readonly="readonly" class="form-control" value="<?php echo $row['XOLOX_q']; ?>">
                             
                                </div>
                                </div>
                                <div class="col-lg-3"> 
                                <div class="form-group">
                                  <label for="name" class="col-md-4 control-label">DAK:</label>
                                  
                                    <input type="number" name="DAKLANA_q"   readonly="readonly" class="form-control" value="<?php echo $row['DAKLANA_q']; ?>">
                                  
                                </div>
                                </div>
                                <div class="col-lg-3"> 
                                <div class="form-group">
                                  <label for="name" class="col-md-4 control-label">Ten:</label>
                               
                                    <input type="number" name="XOLOX_q"  readonly="readonly" class="form-control" value="<?php echo $Ten ?>">
                             
                                </div>
                                </div>
                              </div>
                            <div class="form-group">
                              <label for="cnic">CNIC NO:</label>
                              <input type="CNIC" readonly="readonly" name="p_cnic" id="cnic" class="form-control" value="<?php echo $row['CNIC_No']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="cell_no">Contact No:</label>
                              <input type="number" readonly="readonly" name="p_cell_no" class="form-control" id="cell_no" value="<?php echo $row['patient_cell_no']; ?>">
                            </div>
                             <div class="form-group">
                              <label for="trt_date">Treatment Date:</label>
                              <input type="date" name="trt_date" class="form-control" id="trt_date">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <?php 
                              $nm=1;
                              $selectQ="SELECT tr_date from treatment where tr_cnic_no='$p_cnic'";
                              $rslt=mysqli_query($con,$selectQ);
                              while ($rw=mysqli_fetch_assoc($rslt)) 
                              {
                            ?>
                                <div class="form-group">
                                  <label for="tr_date"><?php echo $nm; ?> treatment Date:</label>
                                  <input type="date" readonly="readonly" name="tr" class="form-control" id="tr_date" value="<?php echo $rw['tr_date']; ?>">
                                </div>
                            <?php
                              $nm+=1;
                              }

                             ?>
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3" >
                            <?php 
                              if ($p_stars>='6')
                              {
                                
                                echo "<input type='submit' disabled='disabled' name='Treat' value='Treat' class='btn btn-info btn-block' style='font-size: 20px;'>";
                              }
                              else
                              {
                                echo "<input type='submit' name='Treat' value='Treat' class='btn btn-info btn-block' style='font-size: 20px;'>";
                              }

                             ?>
                             
                            
                          </div>
                        </div>

                        
                        
                      </form>
                      <?php } ?>
                      
                    </div>
                  </div>




                </div>
                  
              </div>
            </div>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
     
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
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
    <script>
 
      $('#cnic').keydown(function(){

        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9 
                          || event.keyCode == 27 || event.keyCode == 13 
                          || (event.keyCode == 65 && event.ctrlKey === true) )
                              return;
        if((event.keyCode < 48 || event.keyCode > 57))
         event.preventDefault();

        var length = $(this).val().length; 
                    
        if(length == 5 || length == 13)
         $(this).val($(this).val()+'-');

       });
    </script>
     <script type="text/javascript">
      $(document).ready(function(){
      $('li a').removeClass('active');
      $('.app-menu__item').filter(function(){return this.href==location.href}).addClass('active');
    });
  </script>
  <?php include('footer.php'); ?>