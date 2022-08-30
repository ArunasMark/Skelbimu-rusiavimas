<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="krastineA" placeholder="Ivesti a krastines ilgi"><br><br>
        <input type="text" name="krastineB" placeholder="Ivesti b krastines ilgi"><br><br>
        <input type="text" name="krastineC" placeholder="Ivesti c krastines ilgi"><br><br>
        <button>Skaiciuoti trikampio plota</button><br>
    </form><br>
<?php
$a = 0;
$b = 0;
$c = 0;
if (isset ($_POST['krastineA']) && $_POST['krastineA'] != ' '){
    $a = $_POST['krastineA'];
    $b = $_POST['krastineB'];
    $c = $_POST['krastineC'];

    echo "Ivesti skaiciai: " . $a . " - " . $b . " - " . $c . ".<br>";
} 


function area($a, $b, $c){
    if (($a + $b) < $c || ($a + $c) < $b || ($b + $c) < $a) {
        return "Trikampio ploto apskaiciuoti negalima.";
    }
    $trikPerimetras = (($a + $b + $c) / 2);
    $plotas = sqrt($trikPerimetras * ($trikPerimetras - $a) *  ($trikPerimetras - $b) * ($trikPerimetras - $c));
    return $plotas;
}




echo "<br>Trikampio plotas: " . area($a, $b, $c). ".<br>";

?>

</body>

</html>