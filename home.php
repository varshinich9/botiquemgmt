<?php 
/* Project by CppBuzz.com */
include('inc/header.php'); ?>

<!--Message Pop-ups-->
<?php 
	if(isset($_GET['update_msg'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['update_msg']."');}</script>";
	}elseif(isset($_GET['register_msg'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['register_msg']."');}</script>";
	}elseif(isset($_GET['register_error'])){
		echo "<script type='text/javascript'>window.onload = function(){ alert('".$_GET['register_error']."');}</script>";
	}
?>

  <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark scroll_auto">
    <div class="col-md-6 px-0 fleft">
      <h1 class="display-4 font-italic" style="font-family:slinkedFont;text-shadow: 2px 3px #000000;">A PHP Application useful for Tailor shops</h1>
      <p class="lead my-3" style="font-family:mixStitchFont;font-size:145%;text-shadow: 2px 2px #000000;">Shops owner can keep track of their customers and their sizes for sewing.</p>
    </div>
	
	<div class="col-md-5 px-0 fright">
     <img src="img/tailor_bnr.jpg" alt="" class="img-thumbnail" width="100%" height="auto">
    </div>
   
    <div id="mySidenav" class="sidenav">
        <a class="" href="https://www.cppbuzz.com/" target="_new"><img src="img/add_space1.jpg"></a>
    </div>
  
  </div>  
</div>
<!--container -->

<?php include('inc/footer.php'); ?>