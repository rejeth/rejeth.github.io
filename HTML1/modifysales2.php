<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
if($_SESSION['cat']=="manager")
{
    header ('Location:login.php');
}
?>









    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">



        <title>Sales List</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/materialize.css">
        <link rel="stylesheet" href="css/materialize.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="js/materialize.js"></script>
        <script src="js/materialize.min.js"></script>

        <link rel="stylesheet" href="font/material-design-icons">
        <link rel="stylesheet" href="font/roboto">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <nav>
            <div class="nav-wrapper teal ">
                <a href="#" class="brand-logo">Sales Management System</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="agntoptions.php">Home</a></li>
                    <li><a href="help.html">Help</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <style>
            .error {
                color: #FF0000;
            }
        </style>



    </head>

    <body>

        <?php 
       require 'config.php';
    
       if ($_SERVER["REQUEST_METHOD"] == "GET")
     {
    
    $pid = $agentid = $date = $unit = $cname = $caddr = $salesid =  "";
    
  
             $search=$_GET["sid"];

              $strSQL = "SELECT * FROM sales WHERE SALESID=$search";
              $query=mysql_query($strSQL);
   
              if(mysql_num_rows($query)!=1)
              { 
                  echo "<h3>No Transaction Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=agntoptions.html" );
              }
              else
              {
                  
                  echo "<div>&nbsp</div>
                       <table   class=\"highlight container \" >
                          <tr>
                            <th>SALES ID</th>
                            <th>DATE</th>
                            <th>PRODUCT ID</th>
                            <th>UNITS SOLD</th>
                            <th>CUSTOMER NAME</th>
                            <th>CUSTOMER ADDRESS</th>
                          </tr>";
                  
                  
                  while($runrows= mysql_fetch_assoc($query))
                  { 
                      $date = $runrows['DATE'];
                      $pid = $runrows['PRODUCTID'];
                      $unit = $runrows['UNITSSOLD'];
                      $cname = $runrows['CUSNAME'];
                      $caddr = $runrows['CUSADDR'];
                      $salesid = $runrows['SALESID'];
                     
                      echo " 
                      
                   <tr>
                        <td name='sid'><a href='login.html'>$salesid</a></td>
                        <td>$date</td>
                        <td>$pid</td>
                        <td>$unit</td>
                        <td>$cname</td>
                        <td>$caddr</td>
                      </tr>
                       ";
                  }
              }
    
 
               echo " </table>";                             
                             
  
     }
                 ?>





            <?php

   

    // define variables and set to empty values
   $pidErr = $agentidErr = $dateErr = $unitErr = $cnameErr = $caddrErr = "";
   //$pid = $agentid = $date = $unit = $cname = $caddr = "";
    $f = $q =0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["agentid"])) {
      $agentidErr = "Agent ID is required";
     } else {
      $agentid = test_input($_POST["agentid"]);
      $f++;
   }
    
      
       if (empty($_POST["pid"])) {
      $pidErr = "Product ID is required";
     } else {
      $pid = test_input($_POST["pid"]);
      $f++;
   }
      
      
         if (empty($_POST["date"])) {
      $dateErr = "Date is required";
     } else {
      $date = test_input($_POST["date"]);
      $f++;
   }
      
         if (empty($_POST["unitsold"])) {
      $unitErr = "Number of units sold is required";
     } else {
      $unit = test_input($_POST["unitsold"]);
      $f++;
   }
      
        if (empty($_POST["cusname"])) {
      $cnameErr = "Customer name is required";
     } else {
      $cname = test_input($_POST["cusname"]);
      $f++;
   }
      
      if (empty($_POST["cusaddr"])) {
      $caddrErr = "Customer address is required";
     } else {
      $caddr = test_input($_POST["cusaddr"]);
      $f++;
   }
      
      
      
        $salesid=$_POST["id"];
    
      }
     
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
      
   

    
      
       if($f==6)
    {  
        $remove="DELETE FROM sales WHERE SALESID=$salesid";
         $s=mysql_query($remove);  
        $strSQL = "INSERT INTO sales (AGENTID,PRODUCTID,UNITSSOLD,CUSADDR,CUSNAME,DATE,SALESID) VALUES('$agentid','$pid','$unit','$caddr','$cname','$date','$salesid')";
        $q=mysql_query($strSQL);
    }

	mysql_close();
    
if($q)
{
 sleep(3);
 header ('location: login.html');
}
   
    
    
   
    
   ?>



                <form method="POST" action="modifysales2.php">
                    <feildset>
                        <legend>
                            <h6>Enter Sales details</h6></legend>
                        <div class="row">
                            <div>
                                <div class="col s5">&nbsp;</div>
                                <div class="col s2">
                                    <input type="text" name="pid" placeholder="Product ID" value="<?php echo $pid;?>">
                                    <span class="error">* <?php echo $pidErr;?></span>
                                </div>
                                <br>
                                <div class="col s5">&nbsp;</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s2">
                                <input type="text" name="agentid" value="<?php echo $_SESSION['agentidvalue'];?>" hidden>
                                <!-- <span class="error">* <?php echo $agentidErr;?></span> -->
                            </div>
                            <br>
                            <div class="col s5">&nbsp;</div>
                        </div>

                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s2">
                                <input type="date" name="date" placeholder=" " value="<?php echo $date;?>">
                                <span class="error">* <?php echo $dateErr;?></span>
                            </div>
                            <br>
                            <div class="col s5">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s3">
                                <input type="text" name="unitsold" placeholder="Number of units sold" value="<?php echo $unit;?>">
                                <span class="error">* <?php echo $unitErr;?></span>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s4">
                                <input type="text" name="cusname" placeholder="customer name" value="<?php echo $cname;?>">
                                <span class="error">* <?php echo $cnameErr;?></span>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s4">
                                <input type="text" name="cusaddr" placeholder="customer address" value="<?php echo $caddr;?>">
                                <span class="error">* <?php echo $caddrErr;?></span>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                        <input type="hidden" name="id" value="<?php echo $salesid;?>">


                        <div class="row">
                            <div class="col s6">&nbsp;</div>
                            <div class="col s3">
                                <button class="btn waves-effect wave-light   collection-item  btn modal-trigger" data-target="modal1" onclick="return myfunction()">Done</button>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                    </feildset>

                    </div>






                    <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h5>Add Sales Details</h5>
                            <p>Product ID :
                                <a id="mproductid" value=""> </a>
                                <br> Agent ID :
                                <a id="magentid" value=""></a>
                                <br> Date of Transaction :
                                <a id="mdate" value=""></a>
                                <br> Units Sold :
                                <a id="munits" value=""></a>
                                <br> Customer Name :
                                <a id="mcname" value=""></a>
                                <br> Customer Address :
                                <a id="mcaddr" value=""></a>
                                <br>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " onclick="Materialize.toast('DONE', 1000)">ADD</button>


                        </div>
                    </div>
                </form>




                <script type="text/javascript">
                    function myfunction() {
                        var jagentid = document.getElementsByName("agentid")[0].value;
                        var jpid = document.getElementsByName("pid")[0].value;
                        var jdate = document.getElementsByName("date")[0].value;
                        var junitsold = document.getElementsByName("unitsold")[0].value;
                        var jcusname = document.getElementsByName("cusname")[0].value;
                        var jcusaddr = document.getElementsByName("cusaddr")[0].value;

                        document.getElementById("magentid").innerHTML = jagentid;
                        document.getElementById("mproductid").innerHTML = jpid;
                        document.getElementById("mdate").innerHTML = jdate;
                        document.getElementById("munits").innerHTML = junitsold;
                        document.getElementById("mcname").innerHTML = jcusname;
                        document.getElementById("mcaddr").innerHTML = jcusaddr;

                    }
                </script>





                <script type="text/javascript">
                    $(document).ready(function () {
                        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                        $('.modal-trigger').leanModal();
                    });
                </script>






    </body>

    </html>