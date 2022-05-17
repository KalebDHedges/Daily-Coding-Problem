<?php
  require_once "StackClass.php";

  session_start();

  $stack = new Stack();

  if (isset($_POST['push'])) {
    $_SESSION['operation'] = "push";
    $stack->push($_POST['push']);  
  }

  if (isset($_POST['pop'])) {
    $_SESSION['operation'] = "pop";
    $_SESSION['result'] = $stack->pop();
  }

  if (isset($_POST['max'])) {
    $_SESSION['operation'] = "max";
    $_SESSION['result'] = $stack->max();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Stack implemented in PHP" />
  <meta name="keywords" content="HTML, PHP" />
  <meta name="author" content="Kaleb" />
  <title>Problem 794</title>
</head>

<body>
  <header>
    <h1>Problem 794 - Stack</h1>
    <hr />
    <br />
  </header>

  <?php
    echo "<h2>The Stack</h2>";
    $stack->printTable();
  ?>

  <hr />
  <br />
  
  <?php
    echo "<h2>Operation Result</h2>";
    echo "<p>Operation chosen is: {$_SESSION['operation']}</p>";
    echo "<p>Result of operation is: {$_SESSION['result']}</p>";
  ?>

  <hr />
  <br />

  <form method="POST" action="index.php">
    <h2>Stack Form</h2>
    <fieldset>
      <p>
        <label>Push something onto the Stack</label>
        <input type="text" name="push" id="push" />
      </p>
        
      <p>
        <label>Pop the Stack</label>
        <input type="text" name="pop" id="pop" />
      </p>

      <p>
        <label>Get the Max value in the Stack</label>
        <input type="text" name="max" id="max" />
      </p>

      <input type="submit" name="submit" id="submit" value="submit" />
      <input type="reset" name="reset" id="reset" value="reset" />      
    </fieldset>
  </form>
</body>
</html>