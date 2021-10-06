<?php
include_once "scra.php";
$task = 'encode';

if(isset($_GET['task']) && $_GET['task'] != ''){
    $task = $_GET['task'];
}


$key = "abcdefghijklmnopqrstuvwxyz1234567890";

if('key' == $task){
    $key_orginal = str_split($key);
    shuffle($key_orginal);

    $key = join('' ,$key_orginal);
}elseif(isset($_POST['key']) && $_POST['key'] != ''){
        $key = $_POST['key'];
}
$scrambled_data ='';
if('encode' == $task){
    $data = $_POST['data']??'';
    if($data != ''){
        $scrambled_data = scramble_data($data,$key);
    }
}
if('decode' == $task){
    $data = $_POST['data']??'';
    if($data != ''){
        $scrambled_data = decode_data($data,$key);
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">


<style>
body{
    margin-top:30px;
}
#data{
    width:100%;
    height:160px;
}
#result{
    width:100%;
    height:160px; 
}

</style>
</head>
<body>
    <div class="container">
        <div class="row ">

            <div class="column column-60 column-offset-20">
                <h2>Data Scrambler</h2>
                <p>Use this application to  scramble your data</p>

                <p>
                     <a href='?task=encode'>Encode</a>
                     <a href='?task=decode'>Decode</a>
                     <a href='?task=key'>Generate Key</a>
                </p>
            </div>


    </div>
    
    
    
    <div class="row column ">
        <div class="column column-60 column-offset-20">
            <form  method="POST" action="index.php <?php if('decode'==$task){ echo"?task=decode";}?>">
            <label for="key">Key</label>

            <input type="text" name="key" id="key" <?php display_key($key); ?>>

            <label for="data">Data</label>

            <textarea name="data" id="data"><?php if(isset($_POST['data'])){ echo $_POST['data'];} ?></textarea>

            <label for="result">Result</label>
            <textarea  id="result" ><?php echo $scrambled_data; ?></textarea>

            <button type="submit">Do It For Me</button>
            </form>

    
        </div>

    </div>
    
    </div>
</body>
</html>