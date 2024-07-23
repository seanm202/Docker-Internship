<?php
	require_once "pdo.php";
	$recipeIdNo=$_POST['recipeNoOfModalInput'];
	$recipeName=$_POST['recipeNameModalInput'];
	$recipePrepTime=$_POST['recipeDurationModalInput'];
	$recipePrepDifficulty=$_POST['recipeDifficultyModalInput'];
	$recipeVegOrNot=$_POST['recipeVegOrNotModalInput'];
	$rating=$_POST['recipeRatingModalInput'];

$sqlForRecipeUpdate="UPDATE recipeds SET recipeName=:recipeName,recipePrepTime=:recipePrepTime,recipePrepDifficulty=:recipePrepDifficulty,recipeVegOrNot=:recipeVegOrNot,rating=:rating WHERE recipeId=:recipeId";
$stmtForRecipeUpdate=$pdo->prepare($sqlForRecipeUpdate);
$stmtForRecipeUpdate->execute(array(':recipeName'=>$recipeName,':recipePrepTime'=>$recipePrepTime,':recipePrepDifficulty'=>$recipePrepDifficulty,':recipeVegOrNot'=>$recipeVegOrNot,':rating'=>$rating,':recipeId'=>$recipeIdNo));
$successMessage='Record updated';

	echo json_encode($successMessage);

?>
