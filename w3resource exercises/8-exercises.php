<?php
$url = "https://www.w3resource.com/php-exercises/php-basic-exercises.php#h_one";
$url = parse_url($url);
echo 'schema:  ' . $url ['scheme'] . '<br>';
echo 'Host: ' . $url ['host'] . '<br>';
echo 'path: ' .$url ['path'] . '<br>' . '<br>';





