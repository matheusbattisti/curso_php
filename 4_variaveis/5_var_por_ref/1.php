<?php

  $x = 'filipe';

  $y =& $x;

echo $y;
echo '<br>';
echo $x;;

$x = 'filipe augusto';
echo '<br>';
echo $y;
echo '<br>';
echo $x;

$y = ' augusto';
echo '<br>';
echo $y;
echo '<br>';
echo $x;