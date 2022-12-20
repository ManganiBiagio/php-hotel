<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$filteredList = [];

foreach ($hotels as $hotel) {
    $toPush = false;

    if (empty($_GET["voto"]) && empty($_GET["isParcheggio"])) {
        $toPush = true;
    }


    if(!empty($_GET["voto"]) && !empty($_GET["isParcheggio"])){
        if ($hotel["vote"] >= $_GET["voto"]) {
            if ($hotel["parking"] == $_GET["isParcheggio"]) {
                $toPush = true;
            }
            
      }

    }
    elseif (!empty($_GET["voto"])) {
        if ($hotel["vote"] >= $_GET["voto"]) {
              $toPush = true;  
        }
    }elseif(!empty($_GET["isParcheggio"])) {
        if ($hotel["parking"] == $_GET["isParcheggio"]) {
            $toPush = true;
        }
    }


    // if(empty($_GET["voto"])){
    //     $toPush = true;
    // }



    if ($toPush) {
        $filteredList[] = $hotel;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <h1 class="mb-3">Booltel</h1>
        <div class="row justify-content-center mb-3">
            <div class="col-6">
                <form method="GET" class="row gx-3 gy-2 align-items-center justify-content-center">
                    <div class="col-sm-3 d-flex align-items-center">
                        <label>Voto:</label>
                        <input type="number" class="form-control" name="voto" id="specificSizeInputName" placeholder="...">
                    </div>


                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" name="isParcheggio" type="checkbox" id="autoSizingCheck2">
                            <label class="form-check-label" for="autoSizingCheck2">
                                Parcheggio
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary">Cerca</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($filteredList as $hotel) { ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $hotel["name"] ?></h5>
                            <p class="card-text"><?php echo $hotel["description"] ?></p>
                            <ul>
                                <li>Voto: <?php echo $hotel['vote'] ?></li>
                                <li>Parcheggio: <?php echo $hotel['parking'] ? "Si" : "No"  ?></li>
                                <li>Distanza dal centro: <?php echo $hotel['distance_to_center'] ?> km</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>