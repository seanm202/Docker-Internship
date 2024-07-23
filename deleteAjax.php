<?php
	include "pdo.php";
	$recipeId=$_POST['recipeIdNo'];


		$sql = "DELETE FROM recipeds WHERE recipeId = :recipeId";
					$stmt = $pdo->prepare($sql);

					$stmt->execute(array(':recipeId' => $recipeId));

					$successMessage='Record updated';

						echo json_encode($successMessage);
?>
