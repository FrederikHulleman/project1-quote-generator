<?php // PHP - Random Quote Generator

// Create the getRandomQuuote function and name it getRandomQuote

function getRandomQuote ($quotes) {
  //validate whether $quotes is or isn't an array
  if (is_array($quotes)) {

    //return an associative array with the randomly selected quote
    //feedback Jennifer Nordell: return array with selected quote, rather than only a random key
    //hint Jennifer Nordell try in one line of code. but for now i'd like to keep the function robust, with the array type validation
    return $quotes[random_int(0,count($quotes)-1)];
  }
  //in case quotes isn't an array
  else {
    return false;
  }

}

// Create the printQuote funtion and name it printQuote
function printQuote ($quotes) {
  //validate whether $quotes is or isn't an array
  if (is_array($quotes)) {

    //call the getRandomQuote function with the full quotes array
    $selectedQuote[] = getRandomQuote($quotes);

    //validate whether the quote & source are set
    if (isset($selectedQuote[0]["quote"]) && isset($selectedQuote[0]["source"])) {

      //create new string variable
      $htmlstring = "";

      //if category is set, add it as a title, with it's own styling class 
      if (isset($selectedQuote[0]["category"])) {
          $htmlstring .= "<h1 class=\"category\">" . $selectedQuote[0]["category"] . " quote</h1>";
      }

      //since quote and source are set, we can include them in the string
      $htmlstring .= "<p class=\"quote\">" . $selectedQuote[0]["quote"] . "</p>"
                      . "<p class=\"source\">" . $selectedQuote[0]["source"];

      //validate whether citation is set, if yes, include in string. no 'else' needed
      if (isset($selectedQuote[0]["citation"])) {
          $htmlstring .= "<span class=\"citation\">" . $selectedQuote[0]["citation"] . "</span>";
      }
      //validate whether year is set, if yes, include in string. no 'else' needed
      if (isset($selectedQuote[0]["year"])) {
          $htmlstring .= "<span class=\"year\">" . $selectedQuote[0]["year"] . "</span>";
      }

      //paragraph end for 'quote footer'
      $htmlstring .= "</p>";

      //return the full string
      return $htmlstring;
    }
    //when quote or source weren't set
    else {
      return false;
    }
  }
  //if $quotes isn't an array
  else {
    return false;
  }
}
 ?>
