<?php require_once"dbconfig.php";
if(isset($_SESSION['adminid']))
{

	
}
else
{
	header("location:login.php");
}

if (!isset($_REQUEST["orderid"])){
  header("location:index.php");
}
$customer_result = select("SELECT * FROM user WHERE userid IN (SELECT customerid FROM orders WHERE orderid='".$_REQUEST["orderid"]."')");
$customer_details = mysqli_fetch_assoc($customer_result);
?>
<!DOCTYPE HTML>
<html>
<head>
<?php include"head.php";?> 
<script type="text/javascript" src="js/nicEdit-latest.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


  <script type="text/javascript">
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});

  </script>
  <style>
  table.dataTable thead>tr>td.sorting,
table.dataTable thead>tr>td.sorting_asc,
table.dataTable thead>tr>td.sorting_desc,
table.dataTable thead>tr>th.sorting,
table.dataTable thead>tr>th.sorting_asc,
table.dataTable thead>tr>th.sorting_desc {
  padding-right: 30px
}

table.dataTable thead .sorting,
table.dataTable thead .sorting_asc,
table.dataTable thead .sorting_asc_disabled,
table.dataTable thead .sorting_desc,
table.dataTable thead .sorting_desc_disabled {
  cursor: pointer;
  position: relative
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  position: absolute;
  bottom: .9em;
  display: block;
  opacity: .3
}

table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:before {
  right: 1em;
  content: "\f0de";
  font-family: FontAwesome;
  font-size: 1rem
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc_disabled:after {
  content: "\f0dd";
  font-family: FontAwesome;
  right: 16px;
  font-size: 1rem
}

table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_desc:after {
  opacity: 1
}

table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc_disabled:after {
  opacity: 0
}
  </style>
  </head>
<body>
<div class="page-container">
<div class="left-content">
<div class="inner-content">
<?php //include"header.php";?>
<div class="outter-wp">
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="../index.php">Home</a></li>
<li class="active">Order Number: <?php $_REQUEST["orderid"]?></li>
</ol>
</div>
<div class="graph-visual tables-main">

<div class="graph">
<div class="block-page">
<p>
<h3 class="inner-tittle two">Order Item List</h3>
<h5>Customer Name: <?=$customer_details["name"]?></h5>
<h5>Customer Email: <?=$customer_details["email"]?></h5>
<h5>Customer Phone: <?=$customer_details["mobile"]?></h5>
<h5><a href="view_order_list.php">Go Back</a></h5>
<!-- <a href="additem.php"> <button class="btn btn-pill btn-primary">Add New Items </button></a> -->
<div class="form-body">
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
	<th class="th-sm">S.N.
      </th>
      <th class="th-sm">ItemId
      </th>
      <th class="th-sm">ItemName
      </th>
      <th class="th-sm">Category
      </th>
	  <th class="th-sm">Amount
      </th>
       <th class="th-sm">Remaining Stock
      </th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $result=select("SELECT * FROM items WHERE itemid IN (SELECT itemid FROM orders_item WHERE orderid='".$_REQUEST['orderid']."')");
  $n=1;
  $total = select("SELECT total_amt FROM orders WHERE orderid='".$_REQUEST['orderid']."'");
  $total = mysqli_fetch_assoc($total);
  while($r=mysqli_fetch_assoc($result))
  {
  ?>
    <tr>
      <td><?=$n?></td>
      <td><?=$r['itemid']?></td>
      <td><?=$r['Title']?></td>
	    <td><?=$r['category']?> </td>
      <td><?=$r['price']?></td>
      <td><?=$r['in_stock']?></td>
      <!-- <td> -->
         <!-- <a href="myphp.php?edit=yes&id=<?=$itemid?>">
          <span class="glyphicon glyphicon-pencil"></span>
        </a>&nbsp;&nbsp;&nbsp; -->
     <!-- <a href="delete_order.php?id=<?=$r['orderid']?>">
          <span class="glyphicon glyphicon-remove"></span>
        </a>
	  
	  
	  </td> -->
      
    </tr>
    
    <?php
	$n++;
  }
	?>
    
   <tr>
    <td colspan="4">Total: </td>
    <td colspan="2"><?=$total["total_amt"]?></td>
   </tr> 
    </tbody>

</table>
</div>


</p>
</div>

</div>

</div>
</div>
<?php include"footer.php";?>

</div>
</div>
<?php include"side_bar.php";?>
</div>
<?php include"footer_script.php";?>

</body>
</html>