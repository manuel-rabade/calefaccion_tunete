#!/usr/bin/php

<?php

define('_ROOT_', dirname(__FILE__, 3));
require(_ROOT_.'/software/lib/particle.php');
require(_ROOT_.'/software/lib/openweathermap.php');

$path = _ROOT_ . '/log/' . date('Y') . '/';
if (!is_dir($path)) {
    mkdir ($path, 0755, true);
}
$log = fopen($path . date('m') . '.log', 'a');
$csv = fopen($path . date('m') . '.csv', 'a');

$particle = particleTemperature();
$owm = owmTemperature();

fwrite($log, date('r -> ') . json_encode($particle) . "\n");
fwrite($log, date('r -> ') . json_encode($owm) . "\n");

fputcsv($csv, array(date('j'), date('H'), $particle['temperature'], $owm['temperature']));

fclose($log);
fclose($csv);

?>