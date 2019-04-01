<?php

include_once 'header.php';
include_once 'admin/db.php';

if(isset($_GET['id']))
{
$pid = $_GET['id'];

$q = "SELECT * FROM product WHERE id='$pid'";
$r = mysqli_query($db,$q);

$res = mysqli_fetch_assoc($r);

$name = $res['name'];
$desc = $res['description'];
$price = $res['product_price'];
$image = $res['image'];



}




?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
          <h1 class="mt-4 mb-3">Checkout</h1>
		  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Checkout</li>
      </ol>
	  
	  
	  
<?php

echo <<<_END
<div class="container">
	<div class="row my-4">
        <div class="col-lg-8">
          <img class="img-fluid rounded" src="$image" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1>$name</h1>
          <p>$desc</p>
          <a class="btn btn-primary btn-lg" href="#">Total &#8377; $price</a>
        </div>
        <!-- /.col-md-4 -->
      </div>

</div>

_END;
?>
          <form name="sentMessage" action="checkout_pro.php" method="post" id="contactForm">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="fullname" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Mobile No.:</label>
                <input type="text" class="form-control" name="phone" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Address:</label>
                <input type="text" class="form-control" name="address" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>City:</label>
                <input type="text" class="form-control" name="city" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>State:</label>
                <input type="text" class="form-control" name="state" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Pincode:</label>
                <input type="text" class="form-control" name="pincode" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Payment Mode:</label>
                <input type="radio"  name="paymode" id="uname" value="cod" required data-validation-required-message="Please enter your username.">Cash On Delivery
                <p class="help-block"></p>
              </div>
            </div>
			<input type="hidden" name="pid" value="<?php echo $pid;?>">
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-black" id="sendMessageButton" onclick="this.disabled=true;this.form.submit();">Place Order</button>
          </form>
		    <div class="control-group form-group">
              <div class="controls"><br>
                
              </div>

            </div>

        </div>

	</div>

</div>


<?php

include_once 'footer.php';

?>