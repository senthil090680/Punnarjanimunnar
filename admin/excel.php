<html>
<head>
<script language="javascript">
function download()
{
	window.location='punarreport.xls';
}
</script>
</head>
<body alink="#00FF66" link="#00CC00">
<!--<h1 align="center"><a href="javascript:void(0);" onClick="download();">Export Report</a></h1>-->
<?php


require_once("config.php");

require_once("excelwriter.class.php");

$excel=new ExcelWriter("punarreport.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("Id.","Seating Id","Ticket Number","Event Timing Id","Payment Status","Date of Registration");
$excel->writeLine($myArr);

$qry=mysql_query("select * from ticket_details");
if($qry!=false)
{
	$i=1;
	while($res=mysql_fetch_array($qry))
	{
		$myArr=array($i,$res['seating_id'],$res['ticket_number'],$res['event_timing_id'],$res['payment_status'],$res['date_of_registration']);
		$excel->writeLine($myArr);
		$i++;
	}
}
?>
</body>
</html>