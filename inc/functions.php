<?php // PHP - Random Quote Generator

// Create the getRandomQuuote function and name it getRandomQuote

function getRandomQuote ($keys) {
  //validate whether $keys is or isn't an array
  if (is_array($keys)) {

    //count the number keys
    $arraySize = count($keys);

    //randomly pick a key
    $selectedKey = random_int(0,$arraySize-1);

    //return the original key which is in the keys arrray on the position of 'selectKey'
    return $keys[$selectedKey];
  }
  //in case keys isn't an array
  else {
    //return -1 in stead of 'false'. Because key 0 will also be evaluated as False
    return -1;
  }

}


// Create the printQuote funtion and name it printQuote
function printQuote ($quotes) {
  //validate whether $quotes is or isn't an array
  if (is_array($quotes)) {
    //return all available keys in the array
    $keys = array_keys($quotes);

    //call the getRandomQuote function with only the keys, of which one should be chosen. This reduces the size of the array to be passed to getRandomQuote
    $selectedKey = getRandomQuote($keys);

    //validate the outcome of getRandomQuote and validate whether for this key the quote & source are set
    if ($selectedKey != -1 && isset($quotes[$selectedKey]["quote"]) && isset($quotes[$selectedKey]["source"])) {

      //create new string variable
      $htmlstring = "";

      //since quote and source are set, we can include them in the string
      $htmlstring .= "<p class=\"quote\">" . $quotes[$selectedKey]["quote"] . "</p>"
                      . "<p class=\"source\">" . $quotes[$selectedKey]["source"];

      //validate whether citation is set, if yes, include in string. no 'else' needed
      if (isset($quotes[$selectedKey]["citation"])) {
          $htmlstring .= "<span class=\"citation\">" . $quotes[$selectedKey]["citation"] . "</span>";
      }
      //validate whether year is set, if yes, include in string. no 'else' needed
      if (isset($quotes[$selectedKey]["year"])) {
          $htmlstring .= "<span class=\"year\">" . $quotes[$selectedKey]["year"] . "</span>";
      }

      //paragraph end for 'quote footer'
      $htmlstring .= "</p>";

      //return the full string
      return $htmlstring;
    }
    //if no key could be selected, or when quote or source weren't set
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
