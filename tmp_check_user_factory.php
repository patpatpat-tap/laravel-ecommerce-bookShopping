<?php
require __DIR__ . '/vendor/autoload.php';
$u = '\\App\\Models\\User';
var_dump(class_exists($u));
var_dump(in_array('Illuminate\\Database\\Eloquent\\Factories\\HasFactory', class_uses($u)));
var_dump(method_exists($u, 'factory'));
