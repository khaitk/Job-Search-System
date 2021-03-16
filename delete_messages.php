<?php
	include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

	$id=$row['id'];
    $id1 = $_GET['id'];

	$sql = "DELETE FROM messages WHERE id_user_from='$id1' and id_user_to = '$id'";
	if ($conn->query($sql) === TRUE) {
		header("Location: showmessages.php");
	} 
	else {
		echo "not not";
	}
	mysqli_close($conn);
?>