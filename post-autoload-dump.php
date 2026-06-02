<?php
$autoloadFile = __DIR__ . '/vendor/autoload.php';
$customLine = "<?php \nif (!defined('KIRBY_HELPER_E')) {\n    define('KIRBY_HELPER_E', false);\n}\n";

$content = file_get_contents($autoloadFile);
$content = str_replace('<?php', $customLine, $content);

file_put_contents($autoloadFile, $content);
