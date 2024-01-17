<?php

session_start();
error_reporting(E_ERROR | E_PARSE);

function registerPlayers($player="") {
  $_SESSION['name'] = $player;
  $_SESSION['score'] = 0;
}
function ans()  {
  $_SESSION['ans'] = randomNum(6);
}
function playersRegistered() {
  return $_SESSION['name'];
}
function randomNum($len) {
  if($len==3)  {
    $min = 100;
    $max = 999;
  }
  else if($len==4) {
    $min = 1000;
    $max = 9999;
  }
  else if($len==6) {
    $min = 100000;
    $max = 999999;
  }
  else  {
    return -1;
  }
  return rand($min, $max);
}

function numToArr ($num)  {
  $arr = [];
  $len = strlen((string)$num);
  for($i = 0; $i < $len; $i++)  {
    $arr[$i] = $num%10;
    $num = floor($num/10);
  }
  return $arr;
}

function turn($guess) {
  if(strlen((string)$guess) != strlen((string)$_SESSION['ans']))  {
    return "The number must have the length 6";
  }
  if(checkWin($guess, $_SESSION['ans']))  {
    return $_SESSION['ans']." win";
  }
  $gArr = numToArr($guess);
  $aArr = numToArr($_SESSION['ans']);
  $len = strlen((string)$guess);
  $count = 0;
  
  for($i = 0; $i < $len; $i++)  {
    if($gArr[$i] == $aArr[$i])  {
      $count++;
    }
  }
  return "".$count." number(s) in the right position";
}

function checkWin($guess)  {
  return $guess == $_SESSION['ans'];
}

function hint_even_odd() {
  $aArr = numToArr($_SESSION['ans']);
  $even = 0;
  $odd = 0;
  $len = count($aArr);

  for($i = 0; $i < $len; $i++)  {
    if($aArr[$i]%2 == 1)  {
      $odd++;
    }
    else  {
      $even++;
    }
  }
  return "The number has ".$odd." odd and ".$even." even number(s)";
}

function hint_sumTerm() {
  $aArr = numToArr($_SESSION['ans']);
  $len = count($aArr);
  $sum = 0;
  for($i = 0; $i < $len; $i++)  {
    $sum += $aArr[$i];
  }
  return "The sum of terms is ".$sum;
}

function hint_sumFL() {
  $aArr = numToArr($_SESSION['ans']);
  $len = count($aArr);
  $sum = 0;
  $sum = $aArr[0] + $aArr[$len-1];
  return "The sum of the first and last is ".$sum;
}

function hint_mul2l() {
  $aArr = numToArr($_SESSION['ans']);
  $mul = $aArr[0] * $aArr[1];
  return "The multiplication of the two last number is ".$mul;
}
