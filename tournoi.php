<?php

include './match.php';

class Tournoi
{
    private $nom;
    private $participants;
    private $matches = [];

    public function __construct($nom, $participants)
    {
        if (count($participants) !== 16) {
            throw new InvalidArgumentException('Nombre de participants invalide (16 requis)');
        }
        $this->nom = $nom;
        $this->participants = $participants;
        $this->setup();
    }

    private function setup()
    {
        shuffle($this->participants);
        $this->genererHuitiemes();
    }

    public function getHuitiemes()
    {
        $huitiemes = [];
        foreach ($this->matches as $match) {
            if ($match->getType() === 'Huitieme') {
                array_push($huitiemes, $match);
            }
        }
        return $huitiemes;
    }

    private function genererHuitiemes()
    {
        for ($i = 0; $i < 8; $i++) {
            $match = new Match('Huitieme', $i + 1);
            $match->setPartcipant1($this->participants[$i * 2]);
            $match->setPartcipant2($this->participants[$i * 2 + 1]);
            array_push($this->matches, $match);
        }
    }

    public function getQuarts()
    {
        $quarts = [];
        foreach ($this->matches as $match) {
            if ($match->getType() === 'Quart') {
                array_push($quarts, $match);
            }
        }
        return $quarts;
    }

    public function genererQuarts()
    {
        $participants = [];

        foreach ($this->participants as $p) {
            if (!$p->getElimine()) {
                array_push($participants, $p);
            }
        }

        for ($i = 0; $i < 4; $i++) {
            $match = new Match('Quart', $i + 1);
            $match->setPartcipant1($participants[$i * 2]);
            $match->setPartcipant2($participants[$i * 2 + 1]);
            array_push($this->matches, $match);
        }
    }

    public function getDemis()
    {
        $demis = [];
        foreach ($this->matches as $match) {
            if ($match->getType() === 'Demi') {
                array_push($demis, $match);
            }
        }
        return $demis;
    }

    public function genererDemis()
    {
        $participants = [];

        foreach ($this->participants as $p) {
            if (!$p->getElimine()) {
                array_push($participants, $p);
            }
        }

        for ($i = 0; $i < 2; $i++) {
            $match = new Match('Demi', $i + 1);
            $match->setPartcipant1($participants[$i * 2]);
            $match->setPartcipant2($participants[$i * 2 + 1]);
            array_push($this->matches, $match);
        }
    } 

    public function genererFinale()
    {
        $participants = [];

        foreach ($this->participants as $p) {
            if (!$p->getElimine()) {
                array_push($participants, $p);
            }
        }

        $match = new Match('Finale', 1);
        $match->setPartcipant1($participants[0]);
        $match->setPartcipant2($participants[1]);
        array_push($this->matches, $match);
    }

    public function getFinale()
    {
        $finale;
        foreach($this->matches as $match)
        {
            if ($match->getType() === 'Finale') {
                $finale = $match;
            }
        }
        return $finale;
    }

    public function getMatches()
    {
        return $this->matches;
    }
}
