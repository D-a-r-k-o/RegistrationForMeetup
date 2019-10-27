<?php    
if(isset($_POST['submit'])) {

$mID = $_POST['memberID'];
$fName = $_POST['first_name'];
$lName = $_POST['last_name'];
$eMail = $_POST['e_mail'];
$cty = $_POST['city'];
$intrs = $_POST['interests'];
$otherIntrs = $_POST['other_interests'];

    require_once('Config.php');
    require_once('Functions.php');

    $db = connect(
              DB_HOST,
              DB_NAME,
              DB_USERNAME,
              DB_PASSWORD
              ); 

    if($db instanceof mysqli) {
       $db->query("UPDATE `clanovi` SET memberID='{$mID}' 
                                        ,first_name='{$fName}'
                                        ,last_name='{$lName}'
                                        ,e_mail='{$eMail}'
                                        ,city='{$cty}'
                                        ,interests='{$intrs}'
                                        ,other_interests='{$otherIntrs}'
                                        WHERE memberID='{$mID}'"
                                    );

echo "Table status after updating: <br>";

$results = $db->query('SELECT * FROM `clanovi`');

	 print "
  <style>
    td {
      border: 2px solid green;
      padding: 10px;
      text-align: right;
    }
  </style>
  <table style=\"border-collapse: collapse;\">
  <tr>
   <td>memberID</td> 
   <td>First Name</td> 
   <td>Last Name</td> 
   <td>Email</td> 
   <td>City</td>
   <td>Interests</td> 
   <td>Other interests</td> 
  </tr>"; 
 while($row = $results->fetch_assoc()) { 
print "<tr>"; 
print "<td>" . $row['memberID'] . "</td>";

$memID = $row['memberID'];        

print "<td>" . $row['first_name'] . "</td>"; 
print "<td>" . $row['last_name'] . "</td>"; 
print "<td>" . $row['e_mail'] . "</td>";
print "<td>" . $row['city'] . "</td>";
print "<td>" . $row['interests'] . "</td>";
print "<td>" . $row['other_interests'] . "<a href=\"update.php?id=$memID\"><img src=\"updateSign.png\"></a>" . "<a href=\"delete.php?id=$memID\"><img src=\"deleteSign.png\"></a>" . "</td>";
print "</tr>"; 
  }
print "</table>";
    }
 }
?>