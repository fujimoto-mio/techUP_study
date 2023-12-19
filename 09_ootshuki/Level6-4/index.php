<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$name = filter_input(INPUT_POST, "name");
setcookie("name", $name, time() + 1000);
$_COOKIE["name"] = $name;

try{ 
    if(filter_input(INPUT_POST, "name") == "") {
        throw new Exception("入力してください");
    }

    echo var_dump($_COOKIE["name"]);
}
catch(Exception $e){
    echo $e->getMessage();
}
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <form method="post">
    <input type="text" name="name" value="<?php if( !empty($_COOKIE["name"]) ){ echo $_COOKIE["name"]; } ?>">
    <input type="submit">
  </form>
</body>
</html>