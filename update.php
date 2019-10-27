<?php
require_once('Config.php');
require_once('Functions.php');

$db = connect(
              DB_HOST,
              DB_NAME,
              DB_USERNAME,
              DB_PASSWORD
); 

if($db instanceof mysqli) {
    $results = $db->query("SELECT * FROM `clanovi` WHERE memberID='" . $_GET['id'] . "'"); 
    $userRecord = $results->fetch_assoc();
    }
?>
  
    
    <form action="updateSingle.php" method="post">
    <!--  ucfirst — Make a string's first character uppercase  -->
     <?php foreach($userRecord as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'memberID' ? 'readonly' : null); ?>>
        <br><br>
        <?php endforeach; ?>
        <input type="submit" name="submit" value="Update">
    </form>    