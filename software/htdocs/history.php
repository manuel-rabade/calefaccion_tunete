<?php

define('_ROOT_', dirname(dirname(dirname(__FILE__))));
require(_ROOT_.'/software/lib/config.php');

$history = array('labels' => array(),
                 'particle' => array(),
                 'owm' => array());

for ($i = 0; $i < 7 * 24 + 1; $i++) {
  $time = time() - 3600 * $i;
  $year = date('Y', $time);
  $month = date('m', $time);
  $day = date('j', $time);
  $hour = date('H', $time);
  $label = date('D M/j H:00', $time);

  $path = _ROOT_ . '/log/' . $year . '/';
  $csv = fopen($path . $month . '.csv', 'r');
  while (($row = fgetcsv($csv)) !== FALSE) {
    if ($row[0] == $day && $row[1] == $hour) {
      $history['labels'][] = $label;
      $history['particle'][] = $row[2];
      $history['owm'][] = $row[3];
      break;
    }
  }
}

echo json_encode(array('labels' => array_reverse($history['labels']),
                       'particle' => array_reverse($history['particle']),
                       'owm' => array_reverse($history['owm'])));

?>