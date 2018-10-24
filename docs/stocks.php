<?php 
    include('connection.php');
    include('head.php');
    include('header.php');
    include('sidebar.php');

  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-pie-chart"></i> Stocks</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="stocks.php">Stocks</a></li>
        </ul>
      </div>
      <div class="row" >
        <div class="offset-lg-1 col-lg-10  " style="border: 1px solid white; padding: 20px;">
          <?php
               if (isset($_POST['Update'])) 
            {
              $DARKLANA=$_POST['DARKLANA'];
              $Savera=$_POST['Savera'];
              $XOLOX=$_POST['XOLOX'];
              $Tenowin=$_POST['Tenowin'];
          
                $updateQ="UPDATE stocks SET drug_quantity=drug_quantity+$DARKLANA WHERE drug_id=1";
                mysqli_query($con,$updateQ);
                $updateQ="UPDATE stocks SET drug_quantity=drug_quantity+$Savera WHERE drug_id=2";
                mysqli_query($con,$updateQ);
                $updateQ="UPDATE stocks SET drug_quantity=drug_quantity+$XOLOX WHERE drug_id=3";
                mysqli_query($con,$updateQ);
                $updateQ="UPDATE stocks SET drug_quantity=drug_quantity+$Tenowin WHERE drug_id=4";
                mysqli_query($con,$updateQ);
                
            }

            $selectQ="SELECT drug_quantity FROM stocks";
            $reslt=mysqli_query($con,$selectQ);
            $i=1;
            while($row=mysqli_fetch_assoc($reslt))
            {
               $stock[$i]=$row['drug_quantity'];
               $i+=1;
            }
            
            $Savera=$stock[1];
            $DARKLANA=$stock[2];
             $XOLOX=$stock[3];
            $Tenowin=$stock[4];

           ?>
           <script>
window.onload = function () {

var options = {
  title: {
    text: "Stock Available"
  },
  animationEnabled: true,
  data: [{
    type: "pie",
    startAngle: 40,
    toolTipContent: "<b>{label}</b>: {y}",
    showInLegend: "true",
    legendText: "{label}",
    indexLabelFontSize: 18,
    indexLabel: "{label} - {y}",
    dataPoints: [
      { y: <?php echo $DARKLANA ?> ,label: "DARKLANA" },
      { y: <?php echo $Savera ?> ,label: "Savera" },
      { y: <?php echo $XOLOX ?> ,label: "XOLOX" },
      { y: <?php echo $Tenowin ?> ,label: "Tenowin" }
    ]
  }]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>

    <div class="panel panel-info">
      <div class="panel-heading">
        <h2>Stocks Available</h2>
      </div>
      <div class="panel-body">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div> 
      </div>
    </div>
    
    <div class="panel panel-info" style="margin-top: 50px;">

              <div class="panel-heading">
                <h2>Stock Insertion</h2>
              </div>
              <div class="panel-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="" class="col-lg-2 control-label">DARKLANA:</label>
                    <div class="col-lg-4" style="margin-bottom: 5px;">
                      <input type="number" name="DARKLANA" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-2 control-label">Savera:</label>
                    <div class="col-lg-4" style="margin-bottom: 5px;">
                      <input type="number" name="Savera" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-2 control-label">XOLOX:</label>
                    <div class="col-lg-4" style="margin-bottom: 20px;">
                      <input type="number" name="XOLOX" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-2 control-label">Tenowin:</label>
                    <div class="col-lg-4" style="margin-bottom: 20px;">
                      <input type="number" name="Tenowin" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-3" style="margin-bottom:5px;">
                      <input type="submit" name="Update" value="Update" class="btn btn-info form-control">
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
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
  
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
    <script type="text/javascript">
      $(document).ready(function(){
      $('li a').removeClass('active');
      $('.app-menu__item').filter(function(){return this.href==location.href}).addClass('active');
    });
  </script>
  <?php include('footer.php'); ?>