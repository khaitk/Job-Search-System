<?php
	include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

	$id=$row['id'];
    $id1 = $_GET['id'];
    mysqli_query( $conn ,"insert into likes_post(id_user, id_post) values ('$id', '$id1')");
	$sql = "UPDATE likes_post set likes = likes + 1 WHERE id_post = '$id1'";
	if ($conn->query($sql) === TRUE) {
		header("Location: home.php");
	} 
	else {
		echo "not not";
	}
	mysqli_close($conn);
?>