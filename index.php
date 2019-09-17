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

  $colors = array();
  $colors = generateColors();

  //validate outcome of generateColors
  if (!$colors || !isset($colors) || !is_array($colors)) {
    //choose default colors if something went wrong
    $colors["bgcolor"] = "#36b55c";
    $colors["textcolor"] = "white";
  }

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <!-- Refresh page after 10 seconds -->
    <meta http-equiv="refresh" content="10">
    <title>Random Quotes</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <!-- to make sure the random colors are shown, the style attribute is added here to the body tag, so it will 'overwrite' the styles.css -->
  <body style="background-color: <?php echo $colors["bgcolor"]; ?>; color: <?php echo $colors["textcolor"]; ?>;">
    <div class="container">
      <div id="quote-box">
        <?php echo $quoteString; ?>
      </div>
      <button id="loadQuote" onclick="window.location.reload(true)" >Show another quote</button>
    </div>
  </body>
  </html>

<?php } ?>
