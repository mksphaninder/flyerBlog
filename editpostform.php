<html>
<h1>Edit post</h1>
<?php
require "auth.php";
echo "current time: " . date("Y-m-d h:i:sa");
$time = date("Y-m-d h:i:sa");
$rand1 = openssl_random_pseudo_bytes(16);
$_SESSION["nocsrftoken1"] = $rand1;
$postid = $_POST['postid'];
$username=$_SESSION["username"]
?>
<form action="editpost.php" method="POST" class="form login">
<input type="hidden" name="postid" value= "<?php echo $postid;?>"/>
<input type="hidden" name="secrettoken" value="<?php echo $rand1;?>"/><br>
Title:<input type="text" name="Post_title" /> <br>
Content: <input type="text" name="Post_content" /> <br> 
<button class ="button" type="Post">
Create a new post
</button>
</form>
</html>
