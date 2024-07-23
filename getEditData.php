<?php
	require_once "pdo.php";
	$recipeIdNo=$_POST['recipeIdNo'];
	// $sql = "SELECT * FROM recipeds WHERE recipeId = :recipeId";
	// 			$stmt = $pdo->prepare($sql);
	//
	// 			$stmt->execute(array(':recipeId' => $recipeIdNo));
	//

	$sqlGetRecipe = "SELECT * FROM recipeds WHERE recipeId=:recipeIdNo";

	$stmtGetRecipe = $pdo->prepare($sqlGetRecipe);
	$stmtGetRecipe->execute(array(
			':recipeIdNo' => $recipeIdNo));
	$rowGetRecipe = $stmtGetRecipe->fetch(PDO::FETCH_ASSOC);
	//
	// $response='<form id="recipeEditSubmitForm" method="post" action="">
	// <input type="hidden" id="recipeNoOfModalInput" name="recipeNo" value=".$rowGetRecipe['recipeId']."/><br>
	//     <input type="text" id="recipeNameModalInput" name="recipeName"  value=".$rowGetRecipe['recipeName']."/><br>
	//     <input type="text" id="recipeDurationModalInput" name="recipeDuration"  value=".$rowGetRecipe['recipePrepTime']."/><br>
	//     <input type="text" id="recipeDifficultyModalInput" name="recipeDifficulty"  value=".$rowGetRecipe['recipePrepDifficulty']."/><br>
	//     <input type="text" id="recipeVegOrNotModalInput" name="recipeVegOrNot"  value=".$rowGetRecipe['recipeVegOrNot']."/><br>
	//     <input type="text" id="recipeRatingModalInput" name="recipeRating" value=".$rowGetRecipe['rating']."/><br>
	//     <input type="submit" name="updateRecipe" value="Update">
	//   </form>';
		$successMessage='Record updated';

			echo json_encode($rowGetRecipe);
?>
