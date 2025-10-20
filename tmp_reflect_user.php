<?php
require __DIR__ . '/vendor/autoload.php';
$u='\\App\\Models\\User';
$r=new ReflectionClass($u);
echo "file: " . $r->getFileName() . PHP_EOL;
print_r(class_uses($u));
print_r($r->getTraits());
