<?php
include 'configs/config_database.php';

$a=$_GET["auditoriumid"];
?>

<select name="event" id="event" style="width:200px;" onchange="gettime(this.value)" class="required">
<?php
if($a=="Anywhere") { ?>
<option value="Anywhere">-- Select event --</option>
<?php 
}
else { ?>
<option value="">-- Select event --</option>
<?php
if($a!='')
{
$q5=mysql_query("select distinct(event) from team_auditorium where status = 'E' AND auditorium='$a' order by event asc");
while($r=mysql_fetch_array($q5))
{
?>

<option value="<?php echo $r['event']; ?>"><?php echo $r['event']; ?></option>

<?php	
}?>

<?php
}
}
?>
</select>