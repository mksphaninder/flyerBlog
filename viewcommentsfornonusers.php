<html>
<body>
<h1>Flyers blogging page</h1> 
<?php
	$postid = $_POST['postid'];
	//echo "postid = " .$postid."<br>";
	$mysqli= new mysqli('localhost', 'SIAD_lab', 'secretpass', 'SIAD_lab7');
	if($mysqli->connect_error)
		{
			die('Connection to the database has an error: ' . $mysqli->connect_error);
		}
	$sql = "SELECT *from posts where postid = $postid;";
	$posts = $mysqli->query($sql);
	if($posts->num_rows>0){
			echo "Post:<br>";
			while($row=$posts->fetch_assoc()){
				$postid =$row['postid'];
				//echo "postid = " .$postid."<br>";
				echo  htmlentities($row['username']) . "<br>".htmlentities($row['time']). "<br>Title= ". htmlentities($row['title']). "<br>Content= " . htmlentities($row['content'])."<br>";
	}
	}
	echo '<form action="newcommentformfornonuser.php" method="POST" class="form login"><input type="hidden" name="postid" value="'.$postid.'">' . '
				<button class ="button" type="Post">
				Write comment..
				</button>
				</form>';
				$sql1 = "SELECT * FROM comments WHERE postid='$postid';";
				$comments = $mysqli->query($sql1);
				if($comments->num_rows>0){
				echo "Comments:<br>";
				while($row1 = $comments->fetch_assoc()){
					$commentid =$row1['commentid'];
					//echo "commentid = " .$commentid."<br>";
					
					echo  "<br>".htmlentities($row1['commenter']) . "<br>".htmlentities($row1['time']). "<br>Title= ". htmlentities($row1['title']). "<br>Content=" . htmlentities($row1['content'])."<br>";
					
					/*echo '<form action="deletecomment.php" method="POST" class="form login"><input type="hidden" name="commentid" value="'.$commentid.'" >' . '
				<button class ="button" type="Post">
				Delete comment..
				</button>
				</form>';
				echo '<form action="editcommentform.php" method="POST" class="form login"><input type="hidden" name="commentid" value="'.$commentid.'" >' . '
				<button class ="button" type="Post">
				Edit comment..
				</button>
				</form>';
				echo '<form action="index1.php" method="POST" class="form login">
				<button class ="button" type="Post">
				Bact to posts..
				</button>
				</form>';
				//echo "commentid = " .$commentid."<br>";*/
	
				}
				return TRUE;
				}else{
					echo "Comments:<br>";
        				echo "No comments yet<br><br>";
    				}		
			
?>

</html>
</body>
