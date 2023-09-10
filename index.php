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
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>php-hotel</title>
</head>

<body>
    <div class="container mt-5">

        <!-- passo il form al GET -->
        <form method="GET" class="d-flex mb-5">
            <div class="row">
                <!-- name="Parking" -->
                <select class="form-select mb-2" name="Parking">
                    <!-- metto come value null -->
                    <option selected hidden value="null">Parcheggio</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>

                <!-- name="Vote" -->
                <select class="form-select mb-2" name="Vote">
                    <!-- metto come value null -->
                    <option selected hidden value="null">Voto</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <button type="submit" class="btn btn-primary">invia</button>
            </div>
        </form>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Parcheggio</th>
                            <th>Voto</th>
                            <th>Distanza dal centro</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        //ciclo hotel nell'array di hotel
                        foreach ($hotels as $hotel) {
                            if (
                                !$_GET
                                //se scelgo parcheggio e scelgo voto
                                //  chiave array parcheggio   dal form      chiave array voto     dal form
                                || $hotel['parking'] == $_GET['Parking'] && $hotel['vote'] == $_GET['Vote']

                                //se non scelgo niente
                                //      se voto è nullo     e       parcheggio è nullo
                                || $_GET['Vote'] == 'null' && $_GET['Parking'] == 'null'

                                //se scelgo parcheggio e non il voto
                                //chiave array parcheggio     dal form     chiave array voto  nullo
                                || $hotel['parking'] == $_GET['Parking'] && $_GET['Vote'] == 'null'

                                //se non scelgo il pargheggio e scelgo il voto
                                //       dal form      nullo    chiave array voto      dal form
                                || $_GET['Parking'] == 'null' && $hotel['vote'] == $_GET['Vote']
                            ) {
                        // chiudo php ?> 
                        <tr>
                            <td><?php echo $hotel['name'] ?></td>
                            <!-- aggiungere simbolo in base alla presenza del parcheggio -->
                            <td><?php echo $hotel['parking'] ? '✓' : 'x' ?></td>
                            <td><?php echo $hotel['vote'] ?></td>
                            <td><?php echo $hotel['distance_to_center'] ?></td>
                        </tr>
                        <?php
                            }
                            }
                        // chiudo php?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>