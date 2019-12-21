<?php
 function vote() {
    $filename = "result.txt";
    $myfile  = fopen($filename, "r") or die("Unable to open file!");
    $contents = fread($myfile , filesize($filename)) or die("Unable to read file!");
    $values = preg_split("/;/", $contents);
    fclose($myfile) or die("Unable to close file!");
    
    foreach ($values as $value) {
        $pair = preg_split("/=/", $value);
        $language = $pair[0];
        if ($language == $_GET["group1"]){
            $count = intval($pair[1]) + 1;
            $contents = preg_replace("/".$value."/", $language."=".$count, $contents);
            $myfile  = fopen($filename, "w+") or die("Unable to open file!");
            fwrite($myfile , $contents) or die("Unable to write file!");
            fclose($myfile) or die("Unable to close file!");
            break;
        }
    }
}

if (isset($_GET['submit'])){
    vote();
    echo '<script>window.location.href = "success.php";</script>';
    exit();
}
?>

<body>
    <form>
        <input type="radio" value="C" name="group1" checked><label>C</label><br/>
        <input type="radio" value="Java" name="group1"><label>Java</label><br/>
        <input type="radio" value="PHP" name="group1"><label>PHP</label><br/>
        <button type="submit" value="submit" name="submit">Submit</button>
    </form>
</body>