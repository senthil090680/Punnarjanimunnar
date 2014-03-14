<?php
include 'configs/config_database.php';
$a=$_GET["timeid"];

?>

<select name="time" id="time" style="width:200px;" class="required">
<option value="">-- Select time --</option>
<?php

if($a!='')
{
$q5=mysql_query("select distinct(time) from team_show where status = 'E' AND event='$a' order by time asc");
while($r=mysql_fetch_array($q5))
{
?>

<option value="<?php echo $r['time']; ?>"><?php echo $r['time']; ?></option>

<?php	
}?>

<?php
}

?>
</select>