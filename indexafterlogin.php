<html>
<body>
<h1>Flyers blogging page</h1> 
	<a href='newuserform.php'> Add a new user</a>
	<a href='changepasswordform.php'>change your password</a>
	<a href='logout.php'>click here to logout</a>
	<a href='newpostform.php'>click here to add new post</a><br><br>
<?php
	$mysqli= new mysqli('localhost', 'SIAD_lab', 'secretpass', 'SIAD_lab7');
	if($mysqli->connect_error)
		{
			die('Connection to the database has an error: ' . $mysqli->connect_error);
		}
	$sql = "SELECT *from posts;";
	$posts = $mysqli->query($sql);
	if($posts->num_rows>0){
			echo "Post:<br>";
			while($row=$posts->fetch_assoc()){
				$postid =$row['postid'];
				//echo "postid = " .$postid."<br>";
				echo  htmlentities($row['username']) . "<br>".htmlentities($row['time']). "<br>Title= ". htmlentities($row['title']). "<br>Content= " . htmlentities($row['content'])."<br>";
				echo '<form action="viewcomments.php" method="POST" class="form login"><input type="hidden" name="postid" value="'.$postid.'" >' . '
				<button class ="button" type="submit">
				View comments..
				</button>
				</form>';
				echo '<form action="editpostform.php" method="POST" class="form login"><input type="hidden" name="postid" value="'.$postid.'" >' . '
				<button class ="button" type="Post">
				Edit post..
				</button>
				</form>';
				echo '<form action="deletepost.php" method="POST" class="form login"><input type="hidden" name="postid" value="'.$postid.'" >' . '
				<button class ="button" type="Post">
				Delete post..
				</button>
				</form>';
				
			}
			return TRUE;
			}else{
        			echo "No posts yet";
    			}
?>

</html>
</body>


