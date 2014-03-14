<?php
include 'configs/config_database.php';


?>

<select name="event" id="event" class="required" style="width:200px;" onchange="getclasified(this.value)">
<option value="">-- Select Sub Category --</option>
<?php
$a=$_GET["catid"];
if($a!='')
{

$q5=mysql_query("select * from team_event where time = '".$a."'order by event");
while($r=mysql_fetch_array($q5))
{
?>

<option value="<?php echo $r[1]; ?>"><?php echo $r[1]; ?></option>

<?php	
}?>

<?php
}

?>
</select>