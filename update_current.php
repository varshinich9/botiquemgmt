<?php
/* Project by CppBuzz.com 
*/

session_start();
include("inc/db.php");
if(!isset($_SESSION['username'])){
	header("Location: index.php");
	exit();
} 

if(isset($_GET['upcid']) and !empty($_GET['upcid']) and is_numeric($_GET['upcid'])){
	$editId = $_GET['upcid'];
	$edit_qry = "select * from customer where c_id='$editId' limit 1";
	$edit_run = mysqli_query($con,$edit_qry);
	if(mysqli_num_rows($edit_run)>0){
			$custrows = mysqli_fetch_array($edit_run);
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
		}else{
			echo 'Sorry No records found';
		}
}

if(isset($_POST['update'])){
	
	$update_id = mysqli_real_escape_string($con,$_POST['custid']);
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$lname = mysqli_real_escape_string($con,$_POST['lname']);
	$contno = mysqli_real_escape_string($con,$_POST['contno']);
	$addrs = mysqli_real_escape_string($con,$_POST['addrs']);
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
		$update_query = "update customer set fname='$fname', lname='$lname', contno='$contno', address='$addrs', email='$emailid', chestc='$chestc', waistc='$waistc', hipc='$hipc', arml='$arml', inseam='$inseam', legl='$legl' where c_id='$update_id'";
		$update_run = mysqli_query($con,$update_query);
		if($update_run){
			//echo "Records Updated successfully";
			header("Location: home.php?update_msg=Records Updated successfully");
			exit();
		}else{
			echo mysqli_error($con);
			$error = "Unable to Update, try after some time.";
		}
	}	
}
?>

<?php include('inc/header.php'); ?>

<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
  	  <h4 class="display-6 font-italic">Update Customer</h4><hr style='background:white;'>
      <p class="lead my-3">Please edit form to update customer.</p>
    <div class="col-md-6 px-0 fleft">      
      <form action="update_current.php" method="post" style="border:1px solid #ccc;">

	  
		<div class="container"><br>
        	
            <div class="form-label-group"> 
            <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" value="<?php if(isset($custfname)){echo $custfname;}?>" required autofocus>
            <label for="fname">First Name</label>
            </div>

			<div class="form-label-group">
            <input type="text" placeholder="Last Name" class="form-control" name="lname" id="lname"  value="<?php if(isset($custlname)){echo $custlname;}?>" required>
            <label for="lname">Last Name</label>
            </div>

			<div class="form-label-group">
            <input type="tel" placeholder="Contact No." name="contno" class="form-control" id="contno"  value="<?php if(isset($custno)){echo $custno;}?>" required>
            <label for="contno">Contact No.</label>
            </div>
	
			<div class="form-label-group">
            <textarea placeholder="Address" name="addrs" class="form-control" id="addrs" rows="4" cols="30" required><?php if(isset($custaddrs)){echo htmlspecialchars($custaddrs);}?></textarea>            
            <label for="addrs">Address</label>
            </div>
	
			<div class="form-label-group">
            <input type="email" placeholder="Email" name="emailid" id="emailid" class="form-control"  value="<?php if(isset($custemail)){echo $custemail;}?>" required>            
            <label for="emailid">Email</label>
            </div>
	
			<div class="form-label-group">
			<input type="number" placeholder="Chest Circumference" class="form-control" name="chestc" id="chestc"  value="<?php if(isset($custchest)){echo $custchest;}?>" required><label for="chestc">Chest Circumference</label>
			</div>
	
			<div class="form-label-group">
            <input type="number" placeholder="Waist Circumference" class="form-control" name="waistc" id="waistc"  value="<?php if(isset($custwaist)){echo $custwaist;}?>" required><label for="waistc">Waist Circumference</label>
            </div>
	
			<div class="form-label-group">
            <input type="number" placeholder="Hip Circumference" class="form-control" name="hipc" id="hipc"  value="<?php if(isset($custhip)){echo $custhip;}?>" required> <label for="hipc">Hip Circumference</label>
            </div>
	
			<div class="form-label-group">
            <input type="number" placeholder="Arm Length" class="form-control" name="arml" id="arml"  value="<?php if(isset($custarm)){echo $custarm;}?>" required><label for="arml">Arm Length</label>
            </div>
	
			<div class="form-label-group">
            <input type="number" placeholder="Inseam" class="form-control" name="inseam" id="inseam"  value="<?php if(isset($custinseam)){echo $custinseam;}?>" required> <label for="inseam">Inseam</label>
            </div>
    
			<div class="form-label-group">
            <input type="number" placeholder="Leg Length" class="form-control" name="legl" id="legl"  value="<?php if(isset($custleg)){echo $custleg;}?>" required> <label for="legl">Leg Length</label>
            </div>
			
			<input type="hidden" name="custid" value="<?php if(isset($custid)){echo $custid;}?>" required>

			<div class="clearfix" style="text-align:center;">
              <button type="reset" class="cancelbtn btn btn-light">Cancel</button>&nbsp;&nbsp;&nbsp;
              <button type="submit" name="update" class="signupbtn btn btn-light">Update</button><br><br>
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