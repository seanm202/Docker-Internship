<?php
require_once "pdo.php";
session_start();

if (isset($_SESSION['flash'])) {
  echo('<p style="color: green;">'.$_SESSION['flash']."</p>\n");
   unset($_SESSION['flash']);
}
if (isset($_SESSION['delete'])) {
  echo('<p style="color: green;">'.$_SESSION['delete']."</p>\n");
   unset($_SESSION['delete']);
}

if ( isset($_POST['edit'] ) )
	{         //Check for login or index
		header("Location: edit.php");
		return;
	}

	$stmt = $pdo->query("SELECT user_id,first_name,last_name,headline FROM profile");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ( isset($_POST['delete']) ) {
        header("Location: delete.php");
		return;
}





?>



<!DOCTYPE html>
<html>
<head>
<title>SEAN MANJALY</title>
</head>
<body>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
  //Insert into database

      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'addAjax.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });

      });
    </script>

    <script>
    //Delete from database

        $(function () {

          $('form').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: 'deleteAjax.php',
              data: $('form').serialize(),
              success: function () {
                alert('form was submitted');
              }
            });

          });

        });
      </script>
      <script>
      //Edit the information in the database

          $(function () {

            $('form').on('submit', function (e) {

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
        </script>
<table>
<thead>
  <tr>
<th>Name</th>
<th>Preparation Time</th>
<th>Preparation Difficulty</th>
<th>VegOrNot</th>
<th>Rating</th>
  </tr>
</thead>
<tbody>
<tr>

</tr>
<tbody>
</table>

</body>
</html>
