<?php 
include_once 'Functions.php';

$array = new Functions;

echo "The list is " . $array->return_list() . ". And the sum is " . $array->return_sum();