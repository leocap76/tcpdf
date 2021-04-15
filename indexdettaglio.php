<?php
include __DIR__ . "/database2.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>prova</title>
</head>
<body>

 <table class="table">
    <thead>

<?php foreach ($database as $studente) { ?>
      <tr>
        <?php foreach ($studente as $key => $value) { ?>

          <th> <?php echo $key ?> </th>

    <?php } ?>
      </tr>

    <?php 
    break;
    } ?>

        
    </thead>
       
   
    <tbody>
    
    <?php foreach ($database as $studente) { ?>
      <tr>
        <?php foreach ($studente as $key => $value) { 

            echo  "<td>" . $value . "</td>";

        } ?>
      </tr>
    <?php } ?>
    </tbody>

 </table>
  
</body>
</html>