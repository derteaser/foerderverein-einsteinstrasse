<?php
$autoloadFile = __DIR__ . '/vendor/autoload.php';
$customLine = "<?php \ndefine('KIRBY_HELPER_E', false);\n";

$content = file_get_contents($autoloadFile);
$content = str_replace('<?php', $customLine, $content);

file_put_contents($autoloadFile, $content);
