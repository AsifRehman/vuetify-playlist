
  
 <?php 
  session_start();
    include('connection.php');
    include('head.php');
    include('header.php');
    include('sidebar.php');
  if (!isset($_SESSION['admin_email'])) 
  {
    ?>
    <script type="text/javascript">
      window.location="page-login.php";
    </script>
    <?php
  }


  ?>
    <!-- Navbar-->
    
    <!-- Sidebar menu-->
    <style type="text/css">
      #h_c{
        display: none;
      }
    </style>
   
    <main class="app-content" >
      <div class="app-title">
        <div>
          <h1><i class="fa fa-plus-square-o"></i> New Patient</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">New Patient</a></li>
        </ul>
      </div>
      <div class="row"  >
        <div class="offset-lg-1 col-lg-8" style="border: 1px solid white; padding: 50px;background-color: white;">
        <?php
              if(isset($_POST['submit']))
              {
                $p_name=$_POST['p_name'];
                $rel_type =$_POST['rel_type'];
                $p_father_name=$_POST['p_father_name'];
                $disease=$_POST['disease'];
                $p_cnic=$_POST['p_cnic'];
                $p_cell_no=$_POST['p_cell_no'];
                $Savera_q=$_POST['Savera_q'];
                $XOLOX_q=$_POST['XOLOX_q'];
                $DAKLANA_q=$_POST['DAKLANA_q'];
                $p_gender=$_POST['p_gender'];
                $p_age=$_POST['p_age'];
                $p_address=$_POST['p_address'];

                $insertquery="INSERT INTO patients (patient_name,rel_type,patient_father_name,disease,CNIC_No,patient_cell_no,Savera_q, XOLOX_q, DAKLANA_q, p_gender, p_age, p_address) VALUES('$p_name','$rel_type','$p_father_name','$disease','$p_cnic','$p_cell_no','$Savera_q', '$XOLOX_q', '$DAKLANA_q','$p_gender', '$p_age', '$p_address')";
               
                if(mysqli_query($con,$insertquery))
                {
                  echo "<div class='alert alert-success'>Patient add successfully !</div>";
                }
                else
                {
                  echo "<div class='alert alert-danger'>Error accured !</div>";
                }           
             }

              ?>

              <form method="POST" action="">
              <div class="form-group">
                <label for="title">Patient Name:</label>
                <input type="text" id="title" name="p_name" class="form-control">
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="catagory">Relation_Type:</label>
                  <select name="rel_type" class="form-control" style="height: 35px;">
                    <option selected="selected" value="S/O">S/O</option>
                    <option value="W/O">W/O</option>
                    <option value="D/O">D/O</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="catagory">Father/Husband Name:</label>
                <input type="text" name="p_father_name" id="catagory" class="form-control">
              </div>
               <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="catagory">Age:</label>
                    <input type="number" name="p_age" id="catagory" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="catagory">Gender:</label>
                    <select name="p_gender" class="form-control" style="height: 35px;">
                      <option selected="selected" value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
              </div>
               <div class="form-group">
                    <label for="disease"> Disease:</label>
                    <div>
                       <select id="slct" name="disease" class="form-control" onblur="d_quantity()" style="height: 35px;">
                        <option selected="" value="Hepatitis_B">Hepatitis_B</option>
                        <option value="Hepatitis_C">Hepatitis_C</option>
                      </select>
                    </div>
                  </div>
                  <div class="" id="h_c" style="height: 50px;">
                    <div class="col-lg-4"> 
                    <div class="form-group">
                      <label for="name" class="col-md-6 control-label">Savera:</label>
                      <div class="col-md-6">
                        <input type="number" name="Savera_q" class="form-control">
                      </div>
                    </div>
                    </div>
                    <div class="col-lg-4"> 
                    <div class="form-group">
                      <label for="name" class="col-md-6 control-label">XOLOX:</label>
                      <div class="col-md-6">
                        <input type="number" name="XOLOX_q" class="form-control">
                      </div>
                    </div>
                    </div>
                    <div class="col-lg-4"> 
                    <div class="form-group">
                      <label for="name" class="col-md-6 control-label">DAKLANA:</label>
                      <div class="col-md-6">
                        <input type="number" name="DAKLANA_q" class="form-control">
                      </div>
                    </div>
                    </div>
                  </div>
             
                  <div class="form-group">
                    <label for="cnic">CNIC NO:</label>
                    <input type="CNIC" maxlength="15" name="p_cnic" id="cnic" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="cell_no">Contact No:</label>
                    <input type="number" maxlength="13" name="p_cell_no" class="form-control" id="cell_no">
                  </div>
                   <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="p_address" class="form-control" id="address">
                  </div>
              
              <input type="submit" name="submit" value="submit" class="btn btn-info btn-block">
            </form>
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
      function d_quantity(){
        var quantity=$('#slct').val();
        if (quantity=='Hepatitis_C') 
        {
          $('#h_c').show();
        }
      }
    </script>
    <script type="text/javascript">
  $(document.ready(function(){
    $('.app-menu a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active');

  }));
  </script>

 <?php include('footer.php'); ?>