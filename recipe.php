<?php
require_once 'action.php';

class Recipe
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getAllRecipes($pdo)
    {
        $query = "SELECT * FROM recipeDs";
        $result = mysqli_query($this->conn, $query);
        $recipes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $recipes[] = $row;
        }
        return $recipes;
    }
    public function getRecipeById($recipeId)
    {
        $query = "SELECT * FROM recipeDs WHERE recipeId = $recipeId";
        $result = mysqli_query($this->conn, $query);
        $recipe = mysqli_fetch_assoc($result);
        return $recipe;
    }
    public function addRecipe($data)
    {
        $recipeName = $data['recipeName'];
        $recipePrepTime = $data['recipePrepTime'];
        $recipePrepDifficulty = $data['recipePrepDifficulty'];
        $recipeVegOrNot = $data['recipeVegOrNot'];

        $query = "INSERT INTO recipeDs (recipeName, recipePrepTime, recipePrepDifficulty, recipeVegOrNot)
                  VALUES ('$recipeName', '$recipePrepTime', '$recipePrepDifficulty', '$recipeVegOrNot')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function updateRecipe($recipeId, $data)
    {

          $recipeName = $data['recipeName'];
          $recipePrepTime = $data['recipePrepTime'];
          $recipePrepDifficulty = $data['recipePrepDifficulty'];
          $recipeVegOrNot = $data['recipeVegOrNot'];

        $query = "UPDATE recipeDs SET recipeName = '$recipeName', recipePrepTime = '$recipePrepTime', recipePrepDifficulty = '$recipePrepDifficulty', recipeVegOrNot = '$recipeVegOrNot WHERE recipeId = $recipeId";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteRecipe($recipeId)
    {
        $query = "DELETE FROM recipeDs WHERE recipeId = 3";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
