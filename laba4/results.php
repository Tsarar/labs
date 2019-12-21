<?php
$filename = "result.txt";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
$values = preg_split("/;/", $contents);
foreach ($values as $value) {
    echo $value;
    echo "<br/>";
}
?>