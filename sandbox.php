<?php

include './tournoi.php';

$tournoi = new Tournoi('Coupe du monde', [
    new Participant('Foo'),
    new Participant('Bar'),
    new Participant('Baz'),
    new Participant('Bal'),
    new Participant('Taz'),
    new Participant('Mip'),
    new Participant('Fooa'),
    new Participant('Bara'),
    new Participant('Baza'),
    new Participant('Bala'),
    new Participant('Taza'),
    new Participant('Mipa'),
    new Participant('Foob'),
    new Participant('Barb'),
    new Participant('Bazb'),
    new Participant('Balb'),
]);

foreach ($tournoi->getMatches() as $match) {
    $match->setScores(3, 2);
}

$tournoi->genererQuarts();

foreach ($tournoi->getQuarts() as $match) {
    $match->setScores(1, 3);
}

$tournoi->genererDemis();

foreach ($tournoi->getDemis() as $match) {
    $match->setScores(3, 2);
}

$tournoi->genererFinale();

$tournoi->getFinale()->setScores(0, 3);


print_r($tournoi);
