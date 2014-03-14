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
          <table  style="font-size: 10px">
           <thead>
    	<tr>

            <tr><th>Kalaripayat</th></tr>

          </tr>
          </thead>

          <tbody>
             <!-- <tr><td align="justry">O Arjuna, such Kshatriyas are very satisfied who get such a good opportunity to join a war coming to them like an open door to heaven.
If you do not join this lawful battle, you shall fail in your duty and renown will not be gained and you will commit sin."

"For Kshatriyas there is nothing more fruitful than a battle fought in the path of duty"

--Bhagavad Gita

</td>
              </tr> -->
              <tr><td>

The kalari
<br>
A kalari is the school or training hall where martial arts are taught. They were originally constructed according to vastu sastra with the entrance facing east and the main door situated on the centre-right. Sciences like mantra saastra[citation needed], tantra saastra[citation needed]and marma saastra are utilized to balance the space's energy level. The training area comprises a puttara (seven tiered platform) in the south-west corner. The guardian deity (usually an avatar of Bhagavathi, Kali or Shiva) is located here, and is worshipped with flowers, incense and water before each training session which is preceded by a prayer. Northern styles are practiced in special roofed pits where the floor is 3.5 feet below the ground level and made of wet red clay meant to give a cushioning effect and prevent injury. The depth of the floor protects the practitioner from winds that could hamper body temperature. Southern styles are usually practiced in the open air or in an unroofed enclosure of palm branches.[2] Traditionally, when a kalari was closed down it would be made into a small shrine dedicated to the guardian deity.
     </td></tr>

              <tr><td>
Kalaripayat

<br>
Kalaripayattu - The Orient's treasure trove, a gift to the modern world and the mother of all martial arts. Legend traces the 3000-year-old art form to Sage Parasurama- the master of all martial art forms and credited to be the re-claimer of Kerala from the Arabian Sea. Kalaripayattu originated in ancient South India. Kung- fu, popularized by the monks of the Shoaling Temple traces its ancestry to Bodhi Dharma - an Indian Buddhist monk and Kalaripayattu master.

                  </td><td>
              <tr><td >
Types
<br>
Kadathanatan Kalari<br>
Karuvancheri Kalari<br>
Kodumala Kalari<br>
Kolastri Nadu Kalari<br>
Kurungot Kalari<br>
Mathilur Kalari<br>
Mayyazhi Kalari<br>
Melur Kalari<br>
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