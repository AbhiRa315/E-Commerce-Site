<?php

include_once 'header.php';
include_once 'admin/db.php';

?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
          <h1 class="mt-4 mb-3">Order Tracking</h1>
		  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Order Tracking</li>
      </ol>
          <form name="sentMessage" action="track_order.php" method="get" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Order #:</label>
                <input type="text" class="form-control" name="order" id="uname" required data-validation-required-message="Please enter your username.">
                <p class="help-block"></p>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-black" id="sendMessageButton" onclick="this.disabled=true;this.form.submit();">Track</button>
          </form>
		    <div class="control-group form-group">
              <div class="controls"><br>
                
              </div>

            </div>
			<div id="success"><?php 
if(isset($_GET['order'])){
$order = $_GET['order'];
$q = "SELECT * FROM orders WHERE id='$order'";
$r = mysqli_query($db,$q);

$res = mysqli_fetch_assoc($r);

$order_status = $res['order_status'];

if($order_status == 1)
{
echo 'Current status of your order is: Pending';
}
else if($order_status == 2)
{
echo 'Current status of your order is: Shipped';
}
else if($order_status == 3)
{
echo 'Current status of your order is: Delivered';
}
else
{
echo 'Current status of your order is: Unknown';
}

}
			?></div>
        </div>

	</div>

</div>


<?php

include_once 'footer.php';

?>