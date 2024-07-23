<?php
include "action.php";
session_start();

?>



<!DOCTYPE html>
<html>
<head>
<title>Docker Assignment</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
<script src="scriptAjax.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <!-- <script>
  //Edit the information in the database

      $(function () {

        $('form').on('submit', function (e) {
  // var recipeNo=document.getElementById("recipeNo").value;

  var recipeIdNo = $(".recipeNo", this).val();
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'editAjax.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });

      });
    </script> -->


    <script>

    $(document).ready(function () {
      $(".recipeDeleteForm").submit(function (event) {

          var recipeIdNo = $(".recipeNo", this).val();
          // alert(recipeIdNo);
var dataString = 'recipeIdNo='+ recipeIdNo;

        $.ajax({
          type: "POST",
          url: "deleteAjax.php",
          data:dataString,
          dataType: "json",
          encode: true,
        }).done(function (datas) {
        alert(datas);
        });


      });
    });



        $(document).ready(function () {
          $("#recipeEditSubmitForm").submit(function (event) {

              var recipeNoOfModalInput = $("#recipeNoOfModalInput", this).val();
              var recipeNameModalInput = $("#recipeNameModalInput", this).val();

              var recipeDurationModalInput = $("#recipeDurationModalInput", this).val();
              var recipeDifficultyModalInput = $("#recipeDifficultyModalInput", this).val();
              var recipeVegOrNotModalInput = $("#recipeVegOrNotModalInput", this).val();
              var recipeRatingModalInput = $("#recipeRatingModalInput", this).val();
    var dataEditedRecipeString = 'recipeNoOfModalInput='+ recipeNoOfModalInput+'recipeNameModalInput='+ recipeNameModalInput+'recipeDurationModalInput='+ recipeDurationModalInput+'recipeDifficultyModalInput='+ recipeDifficultyModalInput+
    'recipeVegOrNotModalInput='+ recipeVegOrNotModalInput+'recipeRatingModalInput='+ recipeRatingModalInput;

            $.ajax({
              type: "POST",
              url: "editAjax.php",
              data:{recipeNoOfModalInput:recipeNoOfModalInput,
                recipeNameModalInput:recipeNameModalInput,
                recipeDurationModalInput:recipeDurationModalInput,
                  recipeDifficultyModalInput:recipeDifficultyModalInput,
                    recipeVegOrNotModalInput:recipeVegOrNotModalInput,
                      recipeRatingModalInput:recipeRatingModalInput,
              },
              dataType: "json",
              encode: true,
            }).done(function (dataEdit) {
              alert(dataEdit);
            });

          });
        });




    //To send data and retrieve data to edit the information in the database

    $(document).ready(function () {
      $(".viewDataForm").click(function (event) {

          var recipeIdNo = $(".recipeNo", this).val();
          var dataStringToGetData = 'recipeIdNo='+ recipeIdNo;
          // alert(dataString);
          $.ajax({
            type: "POST",
            url: "getEditData.php",
            data:dataStringToGetData,
            dataType: "json",
            encode: true,
          }).done(function (datae) {
$("#recipeNoOfModalInput").val(datae.recipeId);
$("#recipeNameModalInput").val(datae.recipeName);
$("#recipeDurationModalInput").val(datae.recipePrepTime);
$("#recipeDifficultyModalInput").val(datae.recipePrepDifficulty);
$("#recipeVegOrNotModalInput").val(datae.recipeVegOrNot);
$("#recipeRatingModalInput").val(datae.rating);
          });
        });
        });


      </script>


  
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Recipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <form id="recipeEditSubmitForm" method="post" action="">
        <input type="hidden" id="recipeNoOfModalInput" name="recipeNo" /><br>
        <label for="recipeName">Recipe Name :</label>
            <input type="text" id="recipeNameModalInput" class="all" name="recipeName" /><br>
            <label for="recipeDuration">Duration :</label>
            <input type="text" id="recipeDurationModalInput" class="all" name="recipeDuration" /><br>
            <label for="recipeDifficulty">Difficulty Level :</label>
            <input type="text" id="recipeDifficultyModalInput" class="all" name="recipeDifficulty" /><br>
            <label for="recipeVegOrNot">Vegetarian Or Not :</label>
            <input type="text" id="recipeVegOrNotModalInput" name="recipeVegOrNot" /><br>
            <label for="recipeRating">Recipe Rating :</label>
            <input type="text" id="recipeRatingModalInput" name="recipeRating"/><br>
            <input type="submit" name="updateRecipe" value="Update">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<table>
<thead>
  <tr>
<th>ID</th>
<th>Name</th>
<th>Preparation Time</th>
<th>Preparation Difficulty</th>
<th>VegOrNot</th>
<th>Rating</th>
<th>View</th>
<th>Delete</th>
  </tr>
</thead>
<tbody id="canBeModifiedOnInput"><?php
$sql = "SELECT * FROM recipeds";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr>";
  echo "<td>".$row['recipeId']."</td>";
  echo "<td>".$row['recipeName']."</td>";
  echo "<td>".$row['recipePrepTime']."</td>";
  echo "<td>".$row['recipePrepDifficulty']."</td>";
  echo "<td>".$row['recipeVegOrNot']."</td>";
  echo "<td>".$row['rating']."</td>";
  echo '<td><form class="viewDataForm" method="post" action=""><input type="hidden" class="recipeNo" name="recipeNumber" value="'.$row['recipeId'].'" /><input type="button" name="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" value="View"></form></td>';
  echo '<td><form class="recipeDeleteForm" method="post" action=""><input type="hidden" class="recipeNo" name="recipeNumber" value="'.$row['recipeId'].'" /><input type="submit" name="deleteRecipe" value="Delete"></form></td>';
  echo '</tr>';
}
} else {
echo "No Data Available!";
}
 ?>
<tbody>
</table>

</body>
</html>
