<?php

include 'inc/array.php';
include 'inc/functions.php';

//echo var_dump(array_keys($quotes)) . " <br> size: " . count(array_keys($quotes)) . "<br>";

$quoteString = printQuote($quotes);

if (!$quoteString || !isset($quoteString)) {
  echo "Failure; no valid quote could be selected and/or displayed";
}
else {



?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Random Quotes</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="container">
      <div id="quote-box">
        <?php echo $quoteString; ?>
      </div>
      <button id="loadQuote" onclick="window.location.reload(true)" >Show another quote</button>
    </div>
  </body>
  </html>

<?php } ?>
