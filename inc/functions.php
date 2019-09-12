<?php // PHP - Random Quote Generator

// Create the getRandomQuuote function and name it getRandomQuote

function getRandomQuote ($quotes) {
  //validate whether $quotes is or isn't an array
  if (is_array($quotes)) {
    //return all available keys in the array
    $keys = array_keys($quotes);

    //count the number keys
    $arraySize = count($keys);

    //randomly pick a key
    $selectKey = random_int(0,$arraySize-1);

    //return the original key which is in the keys arrray on the position of 'selectKey'
    return $keys[$selectKey];
  }
  else {
    return -1;
  }

}


// Create the printQuote funtion and name it printQuote
function printQuote ($quotes) {

  if (is_array($quotes)) {
    $selectedKey = getRandomQuote($quotes);

    if ($selectedKey != -1) {
      $htmlstring = "";

      $htmlstring .= "<p class=\"quote\">" . $quotes[$selectedKey]["quote"] . "</p>"
                      . "<p class=\"source\">" . $quotes[$selectedKey]["source"];

      if (isset($quotes[$selectedKey]["citation"])) {
          $htmlstring .= "<span class=\"citation\">" . $quotes[$selectedKey]["citation"] . "</span>";
      }

      if (isset($quotes[$selectedKey]["year"])) {
          $htmlstring .= "<span class=\"year\">" . $quotes[$selectedKey]["year"] . "</span>";
      }

      $htmlstring .= "</p>"; 

      return $htmlstring;
    }
    else {
      return false;
    }
  }
  else {
    return false;
  }
}
 ?>
