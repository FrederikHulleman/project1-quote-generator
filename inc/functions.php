<?php // PHP - Random Quote Generator

// Create the getRandomQuuote function and name it getRandomQuote

function getRandomQuote ($quotes) {

  if (is_array($quotes)) {
    //return all available keys in the array
    $keys = array_keys($quotes);

    //echo "<br><br>keys array: " . print_r($keys) . "<br><br>";

    //count the number keys
    $arraySize = count($keys);

    //echo "<br><br>array size " . $arraySize . "<br><br>";

    //randomly pick a key
    $selectKey = random_int(0,$arraySize-1);

    //echo "<br><br>selectKey " . $selectKey . "<br><br>";
    //echo "<br><br>keys[selectKey] " . $keys[$selectKey] . "<br><br>";

    //return the original key which is in the keys arrray on the position of 'selectKey'
    return $keys[$selectKey];
  }
  else {
    return -1;
  }

}


// Create the printQuote funtion and name it printQuote
 ?>
