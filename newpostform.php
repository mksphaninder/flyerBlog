<html>
<h1>Add a new post</h1>
<?php
require "auth.php";
echo "current time: " . date("Y-m-d h:i:sa");
$time = date("Y-m-d h:i:sa");
$rand = openssl_random_pseudo_bytes(16);
$postid = openssl_random_pseudo_bytes(16);
$_SESSION["nocsrftoken"] = $rand;
$username=$_SESSION["username"];
?>
<form action="addpost.php" method="POST" class="form login">
<input type="hidden" name="secrettoken" value="<?php echo $rand;?>"/><br>
Postid:<input type="text" name="Postid" value="<?php echo $postid;?>"/><br>
Title:<input type="text" name="Post_title" /> <br>
Content: <input type="text" name="Post_content" /> <br>
Time:<input type="text" name="Time" value="<?php echo $time;?>"/><br> 
Username:<input type="text" name="Username" value="<?php echo $username ?>"/><br>
<button class ="button" type="Post">
Create a new post
</button>
</form>
</html>
