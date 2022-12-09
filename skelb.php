<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header text-center"><h4>Skelbimu sąrašas</h4></div>
            <div class="card-body">

                <?php include "skelbimai.php";
                $d = '';
                ?>
                <?php
                if (isset($_GET['d'])) {
                    $d = $_GET['d'];
                };
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center col-1" >
                            <?php if ($d == "ASC") {
                                ?> <a href="skelb.php?orderBy=id&d=DESC">Id numeris &uparrow;</a><?php
                                $order = $_GET['orderBy'];
                                usort($skelbimai, function ($a, $b) use ($order) {
                                    return $a[$order] <=> $b[$order];
                                });
                            } else { ?><a
                                    href="skelb.php?orderBy=id&d=ASC">Id numeris &downarrow;</a><?php }
                            ?>
                        </th>
                        <th class="text-center col-8"><?php if ($d == "ASC") {
                                ?> <a href="skelb.php?orderBy=text&d=DESC">Tekstas &uparrow;</a><?php
                                $order = $_GET['orderBy'];
                                usort($skelbimai, function ($a, $b) use ($order) {
                                    return $a[$order] <=> $b[$order];
                                });
                            } else { ?><a
                                    href="skelb.php?orderBy=text&d=ASC">Tekstas &downarrow;</a><?php } ?>
                        </th>
                        <th class="col-1"><?php if ($d == "ASC") {
                                ?> <a href="skelb.php?orderBy=cost&d=DESC">Kaina &uparrow;</a><?php
                                $order = $_GET['orderBy'];
                                usort($skelbimai, function ($a, $b) use ($order) {
                                    return $a[$order] <=> $b[$order];
                                });
                            } else { ?><a
                                    href="skelb.php?orderBy=cost&d=ASC">Kaina &downarrow;</a><?php } ?>
                        </th>
                        <th class="col-1"><?php if ($d == "ASC") {
                                ?> <a href="skelb.php?orderBy=onPay&d=DESC">Apmoketa &uparrow;</a><?php
                                $order = $_GET['orderBy'];
                                usort($skelbimai, function ($a, $b) use ($order) {
                                    return $a[$order] <=> $b[$order];
                                });
                            } else { ?><a
                                    href="skelb.php?orderBy=onPay&d=ASC">Apmoketa &downarrow;</a><?php } ?>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($skelbimai as $skelbimas) { ?>
                        <tr>
                            <td class="text-center" ><?= $skelbimas['id'] ?></td>
                            <td><?= $skelbimas['text'] ?></td>
                            <td><?= $skelbimas['cost'] / 100, " Eur" ?></td>
                            <td><?php if ($skelbimas['onPay'] > 0) {
                                    echo "Apmoketas, " . date("Y-n-j", $skelbimas['onPay']);
                                } else {
                                    echo "<b>Neapmoketas</b>";
                                } ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php
                $skelbKiekis = 0;
                $apmokSuma = 0;
                $neapmokSuma = 0;

                foreach ($skelbimai as $skelbimas) {
                    if ($skelbimas['onPay'] > 0) {
                        $skelbKiekis++;
                        $apmokSuma += $skelbimas['cost'];
                    } else {
                        $neapmokSuma += $skelbimas['cost'];
                    }
                }
                $skelbKiekis1 = sizeof($skelbimai) - $skelbKiekis;
                echo "Viso skelbimu: " . sizeof($skelbimai) . ".<br>";
                echo "Viso apmoketa skelbimu: " . $skelbKiekis . ", uz $apmokSuma Eur suma. <br>";

                echo "Viso neapmoketa skelbimu: " . $skelbKiekis1 .
                    ", uz $neapmokSuma Eur suma. <br>";

                ?>


            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>
