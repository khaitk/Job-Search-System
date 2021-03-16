<?php
	include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

	$id=$row['id'];
    $id1 = $_GET['id'];

	$sql = "DELETE FROM post WHERE id='$id1' and id_user = '$id'";
	if ($conn->query($sql) === TRUE) {
		header("Location: status.php");
	} 
	else {
		echo "not not";
	}
	mysqli_close($conn);
?>