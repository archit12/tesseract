<?php
require_once 'TesseractOCR/TesseractOCR.php';
if (isset($_GET['name'])) {
    $tesseract = new TesseractOCR($_GET['name']);
    $tesseract->setWhitelist(range('A','Z'), range('a', 'z'), range(0,9), '_-.,;"#<>()%{}= ');
    $txt = $tesseract->recognize();
    $myfile = fopen("newfile.c", "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
    echo htmlspecialchars($txt);
}
?>
