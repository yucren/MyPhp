<?php

$BillNO =$_POST["BillNO"];

$tsql="SELECT TOP(300) FBillNo,FSupplyID,FCheckerID,FInterID,FNote FROM dbo.ICStockBill WHERE FBillNo ='".$BillNO."'";


?>  

<!DOCTYPE html>
<html>
<head>
	<title>我的数据</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="red" />
		<meta name="misapplication-tap-highlight" content="no"/>
		<meta name="HandheldFriendly" content="true"/>
		<meta name="MobileOptimized" content="320"/>
		<script type="text/javascript">
			
			

		</script>
</head>
<body>
	<form method="POST" action="http://192.168.125.5/php/home.php">
		<label>单号</label>
        <input type="text" name="BillNO" id="BillNO" maxlength="9">
        <input type="submit" name="submit" id="submit" value="提交">
	</form>





	<?php

$sqlserverName="WIN-7BIF3EJF1FN";
$sqlConnectionInfo= array("Database"=>"AIS20140120174606");
$conn=sqlsrv_connect($sqlserverName,$sqlConnectionInfo);
if ($conn) {
	echo "连接成功";
}
else
{
	echo "连接失败";
	die(print_r(sqlsrv_errors(),true));
}


$stmt=sqlsrv_query($conn,$tsql);
if ($stmt===false) {
	echo "Error in query preparation/execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
	# code...
}
echo "<table border='5px' cellspacing='0' cellpadding='10px'>";
echo "<tr>";
echo "<th>单号</th><th>供应商编号</th><th>审核人</th><th>内码</th><th>备注</th></tr>";

while ($obj=sqlsrv_fetch_object($stmt)) {
	echo "<tr>";
	echo "<td>";
	echo $obj->FBillNo;
	echo "</td>";
	echo "<td>";
	echo $obj->FSupplyID;
	echo "</td>";
	echo "<td>";
	echo $obj->FCheckerID;
	echo "</td>";
	echo "<td>";
	echo $obj->FInterID;
	echo "</td>";
	echo "<td>";
	echo $obj->FNote;
	echo "</td>";

	echo "</tr>";


	# code...
}
echo "</table>";

sqlsrv_close($conn);



?>

	<input type="button" name="reload" id="reload" value="重新加数据" onclick="reloadData()">

</body>
</html>

