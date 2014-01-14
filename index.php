<?php
require __DIR__ . "/vendor/autoload.php";

$manager = new PhpProbe\Manager();
$manager->importConfig(__DIR__ . '/config.yml');
$manager->checkAll();

$probes = $manager->getProbes();

require __DIR__ . "/template.php";