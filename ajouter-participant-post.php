<?php

$participants = json_decode(file_get_contents('participants.json'));

array_push($participants, $_POST['nom']);

file_put_contents('participants.json', json_encode($participants));

header('Location: ajouter-participant.php');