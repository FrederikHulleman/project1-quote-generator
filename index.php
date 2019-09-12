<?php

//include arrray file which composes the quotes array
include 'inc/array.php';

// include the functions file with printQuote and getRandomQuote
include 'inc/functions.php';

//create string based on outcome of printQuote function
$quoteString = printQuote($quotes);

//validate the outcome of printQuote
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
