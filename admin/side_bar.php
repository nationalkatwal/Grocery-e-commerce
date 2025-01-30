<div class="sidebar-menu">
<header class="logo">
<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Admin</h1></span> 
<!--<img id="logo" src="" alt="Logo"/>--> 
</a> 
</header>
<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
<!--/down-->


<!--//down-->
<div class="menu">
<ul id="menu" >
<?php
if(isset($_SESSION['adminid']))
{
	?>
<!-- <li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Account</span></a></li> -->
<li><a href="additem.php"><i class="fa fa-tachometer"></i> <span>Add New Item</span></a></li>
<li><a href="view_item_list.php"><i class="fa fa-tachometer"></i> <span>View Item list</span></a></li>
<li><a href="view_order_list.php"><i class="fa fa-tachometer"></i> <span>View Order list</span></a></li>

<li><a href="logout.php"><i class="fa fa-tachometer"></i> <span>Logout</span></a></li>
<?php }else{ ?>
<li><a href="login.php"><i class="fa fa-tachometer"></i> <span>Login</span></a></li>
<?php } ?>
</ul>
</div>
</div>