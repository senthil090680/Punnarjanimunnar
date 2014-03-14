<html><body>
<?php
session_start();
include 'configs/config_database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['user_login'] == "User Login") {

       $user_email = mysql_real_escape_string($_POST["user_email"]);
       $password = mysql_real_escape_string($_POST["user_password"]);


if($user_email=="admin" && $password =="admin"){

$_SESSION['admin_email_session'] = $user_email;
 echo "<script type='text/javascript'>

		location = 'admin/admin1.php';
		</script>";
}else{
$sql="SELECT * FROM $user_registration_table WHERE email = '".$user_email."' and password='".$password."' limit 1";
$result=mysql_query($sql);

while($row = mysql_fetch_assoc($result)){
$_SESSION['user_email_session'] = $row['name'];
}
// If successfully queried
if($result){

	 echo "<script type='text/javascript'>

		location = 'book_your_ticket.php';
		</script>";
}
}
}

?>

<?php include 'header.php';?>

    <!-- end of left content -->


     <div class ="wrapper col4" style="height:450px">
      <div id="container">
          <div id="content"  >
              <table style="font-size: 10px" >
           <thead>
    	<tr>

            <tr><th >Kathakali</th></tr>

          </tr>
          </thead>

          <tbody>
              <tr><td align="justry">We have started Kathakali and Kalarippayattu daily shows at 2nd mile, Munnar. This is a
combination of two traditional style theatres for Kalarippayattu and kathakali. Our aim is to
nurture our tradition and preserve our cultural heritage. We are doing genuine shows and
our artists are well trained. Our vision is to estabhlish theatres all over the world for both
these Kerala art foms. Kalarippayattu is the Mother of all martial arts and Kathakali is
the king of all performing arts.</td>
              </tr>
              <tr><td>

Kathakali is a combination of different forms of fine arts:
<br>
1. Literature (Sahithyam) <br>
2. Music (Sangeetham)  <br>
3. Painting (Chithram) <br>
4. Acting (Natyam) <br>
5. Dance (Nritham)<br>
     </td><td></td></tr>

              <tr><td>
Traditionally, a Kathakali performance is usually conducted at night and ends in early morning. Nowadays it isn't difficult to see performances as short as three hours or even lesser. Kathakali is usually performed in front of the huge Kalivilakku (kali meaning dance; vilakku meaning lamp) with its thick wick sunk till the neck in coconut oil.
                  </td></tr>
              <tr><td >
Traditionally, this lamp used to provide sole light when the plays used to be performed inside temples, palaces or abodes houses of nobles and aristocrats.
Enactment of a play by actors takes place to the accompaniment of music (geetha) and instruments (vadya). The percussion instruments used are chenda, maddalam at times.
 In addition, the singers (the lead singer is called “ponnani” and his follower is called “singidi”) use chengila (gong made of bell metal, which can be struck with a wooden stick) and ilathalam (a pair of cymbals). The lead singer in some sense uses the Chengala to conduct the Vadyam and Geetha components, just as a conductor uses his wand in western classical music.

                  </td>

              </tr>

          </tbody>
      </table>
	  </div>
      <div id="Column">
    <div class="subnav">
        <h2> Secondary Navigation </h2>
        <ul>
            <li>About Shows
            <ul>
                <li><a href=""> Kathakali</a></li>
                <li><a href=""> Kalaripayet</a></li>
            </ul>
            </li>
            <li><a href=""> Contact US </a></li>
            <li><a href=""> Gallery </a></li>
            <li><a href=""> Videos </a></li>

        </ul>
</div>
</div>
       <!-- end of center content -->
    </div>
      </div>
      <!-- end of center content -->

    <?php include 'footer.php';?>
</body></html>