<?php
	require_once "pdo.php";
	$recipeName=$_GET['recipeName'];
	$recipePrepTime=$_GET['recipePrepTime'];
	$recipePrepDifficulty=$_GET['recipePrepDifficulty'];
	$recipeVegOrNot=$_GET['recipeVegOrNot'];
	$rating=$_GET['rating'];
	function test_input($data)
	{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

		$sql = "INSERT INTO recipeds (recipeName, recipePrepTime, recipePrepDifficulty, recipeVegOrNot, rating) VALUES (:recipeName, :recipePrepTime, :recipePrepDifficulty, :recipeVegOrNot, :rating)";
					$stmt = $pdo->prepare($sql);

					$stmt->execute(array(':recipeName' => $recipeName,':recipePrepTime' => $recipePrepTime,':recipePrepDifficulty' => $recipePrepDifficulty,':recipeVegOrNot' => $recipeVegOrNot,':rating' => $rating));
					echo("Record inserted");

return 0;
?>
