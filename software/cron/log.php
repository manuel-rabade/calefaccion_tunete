#!/usr/bin/php

<?php

define('_ROOT_', dirname(__FILE__, 3));

require(_ROOT_.'/software/lib/particle.php');

print_r(particleTemperature());

?>