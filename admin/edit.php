<?php require_once"dbconfig.php";
if(isset($_SESSION['adminid']) && isset($_REQUEST['itemid']))
{

	
}
else
{
	header("location:login.php");
}

$result = select("SELECT * FROM items WHERE itemid='".$_REQUEST['itemid']."'");
if(mysqli_num_rows($result) < 1)
{
	header("location:index.php");
}

$result = mysqli_fetch_assoc($result);

?>
<!DOCTYPE HTML>
<html>
<head>
<?php include"head.php";?> 
<script type="text/javascript" src="js/nicEdit-latest.js"></script>

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
<li class="active">edit grocery</li>
</ol>
</div>
<div class="graph-visual tables-main">
<h2 class="inner-tittle">Edit Grocery</h2>
<div class="graph" style="height:1000px">
<div class="block-page">
<p>
<h3 class="inner-tittle two" style="font-weight:bold">PRODUCTS</h3>
<div class="form-body">
<form class="form-horizontal" action="myphp.php" method="post" enctype="multipart/form-data"> 

<div class="form-group">
<label for="inputPassword3" id="errortitle" class="col-sm-2 control-label">Title</label> 
<div class="col-xs-6"> 
<input type="text" class="form-control" id="title" name='title' placeholder="Title" value="<?=$result['Title']?>"> 
</div>
</div>
<div class="form-group">
<label for="inputPassword3" placeholder="category" id="errortitle" class="col-sm-2 control-label">Category</label> 
<div class="col-xs-6">

<?php
	$options = [
		'FruitVegetables', 
		'FoodgrainsoilMasala', 
		'BakerycakesDairy', 
		'SnacksBrandedFoods',
		'Beverage',
		'Cleaninghousehold'
];
	$current_category = $result['category'];
?>
<select class="form-control" name="category" id="category-select">
<option>Select Category</option>
<?php foreach ($options as $option) : ?>
                <option value="<?= htmlspecialchars($option) ?>" <?= ($option == $current_category) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($option) ?>
                </option>
<?php endforeach; ?>
<!-- <option value="FruitVegetables">Fruits & Vegetables</option>
<option value="FoodgrainsoilMasala">Foodgrains, oil & Masala</option>
<option value="BakerycakesDairy">Bakery, cakes & Dairy</option>
<option value="SnacksBrandedFoods">Snacks & Branded Foods</option>
<option value="Beverage">Beverage</option>
<option value="Cleaninghousehold">Cleaning & household</option> -->
</select>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" id="errormetakey" class="col-sm-2 control-label">Rating</label> 
<div class="col-xs-6"> 
<input type="text" class="form-control" name="rating" min="1" max="5"  placeholder="Rating" value="<?=$result['item_rating']?>">
</div>
</div>

<div class="form-group">
<label for="inputPassword3" id="errormetakey" class="col-sm-2 control-label">Stock</label> 
<div class="col-xs-6"> 
<input type="text" class="form-control" name="stock" placeholder="Stock" value="<?=$result['in_stock']?>">
</div>
</div>

<input type="hidden" name="itemid" value="<?=$result['itemid']?>">

<!-- <div class="form-group"> 
<label for="inputEmail3" id="image" class="col-sm-2 control-label">Image</label> 
<div class="col-xs-6">
<input type="file" class="form-control col-xs-4" id="image"  name="image"> 
</div> 
</div> -->

<div class="form-group"> 
<label for="inputEmail3" id="video_link" class="col-sm-2 control-label">Price</label> 
<div class="col-xs-6">
<input type="text" class="form-control col-xs-4" id="video_link" name="price" placeholder="Price" value="<?=$result['price']?>"> 
</div> 
</div>

<div class="form-group"> 
<label for="inputEmail3" id="cpassworderror" class="col-sm-2 control-label">Description</label> 
<div class="col-xs-6">
 <textarea name="discription" class="form-control col-xs-4">
	<?=$result['discription']?>
</textarea>
</div>
</div>
<div class="col-xs-6"> 
<center><input type="submit" class="btn btn-info" name="edit_item" id="edit_item" value="SUBMIT"></center> </div> </form> 
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
<!--<script>

$(document).ready(function(){
	
$("#project_submit").click(function(){
	
var valid=true;
var title=$.trim($("#title").val());
var metakey=$.trim($("#metakey").val());
var metadis=$.trim($("#metadis").val());

if(title.length<6)
{
$("#errortitle").html('Invalid title');
$("#errortitle").css("color","red");
$("#title").css("border-color","red");
valid=false;
}
else
{
$("#errortitle").html('Title');
$("#errortitle").css("color","black");
$("#title").css("border-color","#ddd");
}
if(metakey.length<6)
{
$("#newpassworderror").html('Invalid New Password');
$("#newpassworderror").css("color","red");
$("#newpassword").css("border-color","red");
valid=false;
}
else
{
$("#newpassworderror").html('New Password');
$("#newpassworderror").css("color","black");
$("#newpassword").css("border-color","#ddd");
}
if(metadis.length<6)
{
$("#newpassworderror").html('Invalid New Password');
$("#newpassworderror").css("color","red");
$("#newpassword").css("border-color","red");
valid=false;
}
else
{
$("#newpassworderror").html('New Password');
$("#newpassworderror").css("color","black");
$("#newpassword").css("border-color","#ddd");
}



var mymethod="post";
var myurl="myphp.php";
var mydata="oldpassword="+oldpassword+"&newpassword="+newpassword+"&cpassword="+cpassword+"&change=yes";

$.ajax({
	
	method:mymethod,
	url:myurl,
	data:mydata,
	success:function(result)
	{
		if(result==1)
		{
	        alert("Password Changed Successfully");
			$("#oldpassword").val("");
			$("#newpassword").val("");
			$("#cpassword").val("");
		}
		else
		{
			alert(result);
		}
			
		
	}
});	






return false;
});
});














</script>-->
























</body>
</html>