<?php

session_start();
//define("server","localhost");
//	define("user","root");
//	define("password","root");
//	define("database","online_grocery");
	function iud($query)
	{
		$cid=mysqli_connect("localhost","root","root","online_grocery") or die("connection error");
	$result=mysqli_query($cid,$query);
	$n=mysqli_affected_rows($cid);
	mysqli_close($cid);
	return $n;
	}
	
function select($query)
{
	$cid=mysqli_connect("localhost", "root", "root", "online_grocery") or die("connection error");
	$result=mysqli_query($cid,$query);
	mysqli_close($cid);
	return $result;
}













?>
	