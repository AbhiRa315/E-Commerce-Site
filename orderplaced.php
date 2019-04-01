<?php

include_once 'header.php';
include_once 'admin/db.php';

if(isset($_GET['orderid']))
{
$pid = $_GET['orderid'];




}




?>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
          <h1 class="mt-4 mb-3">Order Placed</h1>
		  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Order Complete</li>
      </ol>
	  
	  
	  
<?php

echo <<<_END
<div class="container">
	<div class="row my-4">
        
        <!-- /.col-lg-8 -->
        <div class="col-lg-8">
          <h1>Order #:$pid</h1>
          <p>To track your order visit the order tracking page.</p>
          
        </div>
        <!-- /.col-md-4 -->
      </div>

</div>

_END;
?>



<?php

include_once 'footer.php';

?>