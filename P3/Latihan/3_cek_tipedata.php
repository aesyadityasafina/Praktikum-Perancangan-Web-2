<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cek Tipe</title>
</head>
<body>

<?php

$bil = 10;
var_dump(is_int($bil));
// Output: bool(true)

$var = "";
var_dump(is_string($var));
// Output: bool(true)

?>

</body>
</html>