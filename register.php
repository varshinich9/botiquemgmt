<?php
/* Project by CppBuzz.com */
session_start();
include("inc/db.php");
if(!isset($_SESSION['username'])){
	header("Location: index.php");
	exit();
} 

if(isset($_POST['register'])){
	
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$lname = mysqli_real_escape_string($con,$_POST['lname']);
	$contno = mysqli_real_escape_string($con,$_POST['contno']);
	$addrs = trim(htmlentities(mysqli_real_escape_string($con,$_POST['addrs'])));
	$emailid = mysqli_real_escape_string($con,$_POST['emailid']);
	$chestc = mysqli_real_escape_string($con,$_POST['chestc']);
	$waistc = mysqli_real_escape_string($con,$_POST['waistc']);
	$hipc = mysqli_real_escape_string($con,$_POST['hipc']);
	$arml = mysqli_real_escape_string($con,$_POST['arml']);
	$inseam = mysqli_real_escape_string($con,$_POST['inseam']);
	$legl = mysqli_real_escape_string($con,$_POST['legl']);
	
	if(empty($fname) or empty($lname) or empty($contno) or empty($addrs) or empty($emailid) or empty($chestc) or empty($waistc) or empty($hipc) or empty($arml) or empty($inseam) or empty($legl)){
		$error = "Please, fill all the fields.";
	}
	else{
		$new_cstmr_query = "insert into `customer` (`fname`,`lname`,`contno`,`address`,`email`,`chestc`,`waistc`,`hipc`,`arml`,`inseam`,`legl`) VALUES ('$fname','$lname','$contno','$addrs','$emailid','$chestc','$waistc','$hipc','$arml','$inseam','$legl')";
		$cstmr_query_run = mysqli_query($con,$new_cstmr_query);
		if($cstmr_query_run){
			//echo "Records saved successfully";
			header("Location: home.php?register_msg=Records saved successfully.");
			exit();
		}else{
			//echo mysqli_error($con);
			//echo $error = "Unable to register, try after some time.";
			header("Location: home.php?register_error=Unable to register, please try after some time.");
			exit();
		}
	}	
}
?>

<?php include('inc/header.php'); ?>  

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Register New Customer</h4><hr style='background:white;'>
      <p class="lead my-3">Please fill in this form to register new customer.</p>
    <div class="col-md-6 px-0 fleft">      
      <form action="register.php" method="post" style="border:1px solid #ccc;">
          <div class="container"><br>
        	
            <div class="form-label-group"> 
            <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" value="<?php if(isset($fname)){echo $fname;}?>" required autofocus>
            <label for="fname">First Name</label>
            </div>
            
            <div class="form-label-group">
            <input type="text" placeholder="Last Name" class="form-control" name="lname" id="lname"  value="<?php if(isset($lname)){echo $lname;}?>" required>
            <label for="lname">Last Name</label>
            </div>
            
            <div class="form-label-group">
            <input type="tel" placeholder="Contact No." name="contno" class="form-control" id="contno"  value="<?php if(isset($contno)){echo $contno;}?>" required>
            <label for="contno">Contact No.</label>
            </div>
            
             <div class="form-label-group">
            <textarea placeholder="Address" name="addrs" class="form-control" id="addrs" rows="4" cols="30" required><?php if(isset($addrs)){echo htmlspecialchars($addrs);}?></textarea>            
            <label for="addrs">Address</label>
            </div>
            
             <div class="form-label-group">
            <input type="email" placeholder="Email" name="emailid" id="emailid" class="form-control"  value="<?php if(isset($emailid)){echo $emailid;}?>" required>            
            <label for="emailid">Email</label>
            </div>
            
            
            <div class="form-label-group">
           <input type="number" placeholder="Chest Circumference" class="form-control" name="chestc" id="chestc"  value="<?php if(isset($chestc)){echo $chestc;}?>" required><label for="chestc">Chest Circumference</label>
           </div>
            
            
            <div class="form-label-group">
            <input type="number" placeholder="Waist Circumference" class="form-control" name="waistc" id="waistc"  value="<?php if(isset($waistc)){echo $waistc;}?>" required><label for="waistc">Waist Circumference</label>
            </div>
            
           
            <div class="form-label-group">
            <input type="number" placeholder="Hip Circumference" class="form-control" name="hipc" id="hipc"  value="<?php if(isset($hipc)){echo $hipc;}?>" required> <label for="hipc">Hip Circumference</label>
            </div>
            
            
            <div class="form-label-group">
            <input type="number" placeholder="Arm Length" class="form-control" name="arml" id="arml"  value="<?php if(isset($arml)){echo $arml;}?>" required><label for="arml">Arm Length</label>
            </div>
        
           
            <div class="form-label-group">
            <input type="number" placeholder="Inseam" class="form-control" name="inseam" id="inseam"  value="<?php if(isset($inseam)){echo $inseam;}?>" required> <label for="inseam">Inseam</label>
            </div>
        
           
            <div class="form-label-group">
            <input type="number" placeholder="Leg Length" class="form-control" name="legl" id="legl"  value="<?php if(isset($legl)){echo $legl;}?>" required> <label for="legl">Leg Length</label>
            </div>   
        
            <div class="clearfix" style="text-align:center;">
              <button type="reset" class="cancelbtn btn btn-light">Cancel</button>&nbsp;&nbsp;&nbsp;
              <button type="submit" name="register" class="signupbtn btn btn-light">Register</button><br><br>
            </div>
          </div>
        </form>
    </div>
    
    <div class="col-md-5 px-0 fright mtop">
     <img src="img/newcust2.jpg" alt="" class="img-thumbnail" width="100%" height="auto">
    </div>
       
     <div id="mySidenav" class="sidenav">
        <a class="" href="https://www.cppbuzz.com/" target="_new"><img src="img/add_space1.jpg"></a>
    </div>
  
  </div>  
</div>
<!-- /.container -->

<?php include('inc/footer.php'); ?>
