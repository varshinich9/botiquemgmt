<?php

/* Project by CppBuzz.com */

session_start();
include('inc/db.php');

if(!isset($_SESSION['username'])){
	header('Location: index.php');
	exit();
}
?>

<?php include('inc/header.php'); ?>  

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Search Customer</h4><hr style='background:white;'>
      <p class="lead my-3">Please, search customer by first name or contact no to view his record.</p>
    <div class="col-md-6 px-0 fleft">      
      <form method="post" action="search.php" style="border:1px solid #ccc;">
          <div class="container"><br>
        	
            <div class="form-label-group">
            <input class="form-control mr-sm-2" type="text" placeholder="First Name OR Contact No." name="custinfo" aria-label="Search" autofocus>
            <label for="custinfo">First Name OR Contact No.</label>
            </div>
                    
            <div class="clearfix" style="text-align:center;">
              <button type="submit" name="searchcust" class="signupbtn btn btn-light">Search</button><br><br>
            </div>
          </div>
        </form>				
    </div>
    
    <!--<div class="col-md-5 px-0 fright">
     <img src="img/newcust2.jpg" alt="" class="img-thumbnail" width="100%" height="auto">
    </div>-->
	<div class="col-md-12 px-0 fleft"><br><br>
		<?php
			if(isset($_POST['searchcust'])){
				$custinfo = trim(mysqli_real_escape_string($con,$_POST['custinfo']));
				
				if(empty($custinfo)){
					echo $error = 'Please, fill the customer\'s first name or contact no.';
				}else{
					$custinfo_query = "select * from customer where fname='$custinfo' or contno='$custinfo'";
					$custinfo_query_run = mysqli_query($con,$custinfo_query);
					if(mysqli_num_rows($custinfo_query_run)>0){
						?>
							<h3>List of matching customers</h3>
							<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class='table table-striped table-responsive-md wht_txt'>
								<thead>
								<tr>
								<td>Sr. No.</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td>Contact No.</td>
								<td>Address</td>
								<td>Email</td>
								<td>Chest</td>
								<td>Waist</td>
								<td>Hip</td>
								<td>Arm</td>
								<td>Inseam</td>
								<td>Leg</td>
							  </tr>
							  </thead><tbody>
						<?php
						$srno = 0;
						while($custrows = mysqli_fetch_array($custinfo_query_run)){
						$srno++;	
						$custid = $custrows['c_id'];
						$custfname = $custrows['fname'];
						$custlname = $custrows['lname'];
						$custno = $custrows['contno'];
						$custaddrs = $custrows['address'];
						$custemail = $custrows['email'];
						$custchest = $custrows['chestc'];
						$custwaist = $custrows['waistc'];
						$custhip = $custrows['hipc'];
						$custarm = $custrows['arml'];
						$custinseam = $custrows['inseam'];
						$custleg = $custrows['legl'];
						
						echo "<tr>
								<td>$srno</td>
								<td>$custfname</td>
								<td>$custlname</td>
								<td>$custno</td>
								<td>$custaddrs</td>
								<td>$custemail</td>
								<td>$custchest</td>
								<td>$custwaist</td>
								<td>$custhip</td>
								<td>$custarm</td>
								<td>$custinseam</td>
								<td>$custleg</td>
							  </tr>
							  ";
						}
						?>
							</tbody></table>
						<?php
						
					}
					else{ 
							//echo mysqli_error($con);
							echo $error = 'Sorry, no records found.';
						}			
				}
			}
			?>
		</div>
	</div>
       
     <div id="mySidenav" class="sidenav">
        <a class="" href="https://www.cppbuzz.com/" target="_new"><img src="img/add_space1.jpg"></a>
    </div>
  
  </div> 
</div>
<!-- /.container -->

<?php include('inc/footer.php'); ?>
