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

    $selectedQuote = array();
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

//function to randomly choose background color, and the right text color
function generateColors() {

  //choose a random int between 0 and 255, for the R, G and B input for the Hex color value
  //using sprintf the int is converted to hex, and if necessary, a 0 is added
  //thanks to https://stackoverflow.com/questions/1699958/formatting-a-number-with-leading-zeros-in-php to add leading zero
  $R = sprintf('%02x',random_int(0,255));
  $G = sprintf('%02x',random_int(0,255));
  $B = sprintf('%02x',random_int(0,255));

  //create color array, so also the right text color can be returned
  $colorarray = array();

  //store the randomly chose background color in the array
  $colorarray["bgcolor"] = "#$R$G$B";

  //use this function to make sure the text is black or white, depending on the darkness of the background, so we can still read it
  $colorarray["textcolor"] = getContrastColor($colorarray["bgcolor"]);

  return $colorarray;

}

//function to choose the right contrast color (white or black) given a certain baseground color; in our case the background color
//thanks to https://stackoverflow.com/questions/1331591/given-a-background-color-black-or-white-text to decide if the text color should be white or black
function getContrastColor($hexcolor) {
    $R = hexdec(substr($hexcolor, 1, 2));
    $G = hexdec(substr($hexcolor, 3, 2));
    $B = hexdec(substr($hexcolor, 5, 2));
    //convert RGB to YIQ
    //YIQ: https://en.wikipedia.org/wiki/YIQ
    $YIQ = (($R * 299) + ($G * 587) + ($B * 114)) / 1000;
    //depending on the YIQ halfway point of 128, decide what the right contrast color should be: black orr white
    return ($YIQ >= 128) ? 'black' : 'white';
}
 ?>
