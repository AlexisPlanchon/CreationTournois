<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tournoi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="afficher-tournoi.css">
  <style>
  </style>
</head>
<body>

<?php

if (count($_POST) === 0) {
    header('Location: creer-tournoi.php');
}

include './tournoi.php';
$tournoi_participants = [];
foreach ($_POST['participants'] as $participant_nom) {
    array_push($tournoi_participants, new Participant($participant_nom));
}

$tournoi = new Tournoi($_POST['nom'], $tournoi_participants);

foreach ($tournoi->getHuitiemes() as $match) {
    $winner_score = 3;
    $other_score = rand(0, 2);
    $scores = [$winner_score, $other_score];
    shuffle($scores);
    $match->setScores($scores[0], $scores[1]);
}

$tournoi->genererQuarts();

foreach ($tournoi->getQuarts() as $match) {
    $winner_score = 3;
    $other_score = rand(0, 2);
    $scores = [$winner_score, $other_score];
    shuffle($scores);
    $match->setScores($scores[0], $scores[1]);
}

$tournoi->genererDemis();

foreach ($tournoi->getDemis() as $match) {
    $winner_score = 3;
    $other_score = rand(0, 2);
    $scores = [$winner_score, $other_score];
    shuffle($scores);
    $match->setScores($scores[0], $scores[1]);
}

$tournoi->genererFinale();

$finale = $tournoi->getFinale();
$winner_score = 3;
$other_score = rand(0, 2);
$scores = [$winner_score, $other_score];
shuffle($scores);
$finale->setScores($scores[0], $scores[1]);
?>


<div class="nav">
  <div class="nav-header">
    <img src="logo.png" height="100%" />
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  <input type="checkbox" id="nav-check">
  <div class="nav-links">
    <a href="creer-tournoi.php">Créer tournoi</a>
    <a href="ajouter-participant.php">Ajouter participant</a>
  </div>
</div>


<h1>Tournoi : <?=$_POST['nom']?></h1>

<main>
  <ul class="round round-1">
    <li class="game"><h2>Huitièmes</h2></li>
  </ul>
  <ul class="round round-2">
    <li class="game"><h2>Quarts</h2></li>
  </ul>
  <ul class="round round-3">
    <li class="game"><h2>Demis</h2></li>
  </ul>
  <ul class="round round-4">
    <li class="game"><h2>Finale</h2></li>
  </ul>
</main>

<main id="tournament">
  <ul class="round round-1">
    <?php
foreach ($tournoi->getHuitiemes() as $match) {
    echo ('<li class="spacer">&nbsp;</li>');
    if ($match->getScoreParticipant1() === 3) {
        echo ('<li class="game game-top winner">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
    } else {
        echo ('<li class="game game-top">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
    }
    echo ('<li class="game game-spacer">&nbsp;</li>');
    if ($match->getScoreParticipant2() === 3) {
        echo ('<li class="game game-bottom winner">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
    } else {
        echo ('<li class="game game-bottom">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
    }
    echo ('</li>');
}
?>
    <li class="spacer">&nbsp;</li>
    </ul>

    <ul class="round round-2">
    <?php
foreach ($tournoi->getQuarts() as $match) {
    echo ('<li class="spacer">&nbsp;</li>');
    if ($match->getScoreParticipant1() === 3) {
        echo ('<li class="game game-top winner">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
    } else {
        echo ('<li class="game game-top">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
    }
    echo ('<li class="game game-spacer">&nbsp;</li>');
    if ($match->getScoreParticipant2() === 3) {
        echo ('<li class="game game-bottom winner">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
    } else {
        echo ('<li class="game game-bottom">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
    }
    echo ('</li>');
}
?>
    <li class="spacer">&nbsp;</li>
    </ul>

    <ul class="round round-3">
      <?php
foreach ($tournoi->getDemis() as $match) {
    echo ('<li class="spacer">&nbsp;</li>');
    if ($match->getScoreParticipant1() === 3) {
        echo ('<li class="game game-top winner">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
    } else {
        echo ('<li class="game game-top">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
    }
    echo ('<li class="game game-spacer">&nbsp;</li>');
    if ($match->getScoreParticipant2() === 3) {
        echo ('<li class="game game-bottom winner">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
    } else {
        echo ('<li class="game game-bottom">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
    }
    echo ('</li>');
}
?>
      <li class="spacer">&nbsp;</li>
    </ul>

    <ul class="round round-4">
    <?php
$match = $tournoi->getFinale();
echo ('<li class="spacer">&nbsp;</li>');
if ($match->getScoreParticipant1() === 3) {
    echo ('<li class="game game-top winner">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
} else {
    echo ('<li class="game game-top">' . $match->getParticipant1()->getNom() . '<span>' . $match->getScoreParticipant1() . '</span></li>');
}
echo ('<li class="game game-spacer">&nbsp;</li>');
if ($match->getScoreParticipant2() === 3) {
    echo ('<li class="game game-bottom winner">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
} else {
    echo ('<li class="game game-bottom">' . $match->getParticipant2()->getNom() . '<span>' . $match->getScoreParticipant2() . '</span></li>');
}
echo ('</li>');
?>
      <li class="spacer">&nbsp;</li>
    </ul>
</main>

<footer>
  <p>
    © Copyright 2019 Alexis & Ambroise. All rights reserved.
</p>
  </footer>

</body>
</html>