<?php

include './participant.php';

class Match
{
    private $termine = false;
    private $numero;
    private $type;
    private $participant1 = null;
    private $participant2 = null;
    private $scoreParticipant1 = 0;
    private $scoreParticipant2 = 0;

    public function __construct($type, $numero)
    {
        $this->type = $type;
        $this->numero = $numero;
    }

    public function setPartcipant1($participant1)
    {
        $this->participant1 = $participant1;
    }

    public function setPartcipant2($participant2)
    {
        $this->participant2 = $participant2;
    }

    public function setScores($score1, $score2)
    {
        if ($this->termine) {
            throw new Exception('Match termine');
        }
        if (($score1 < 0 || $score2 > 3) || ($score2 < 0 || $score2 > 3)) {
            throw new InvalidArgumentException('Score incorrect (min 0, max 3)');
        }
        $this->scoreParticipant1 = $score1;
        $this->scoreParticipant2 = $score2;
        $this->cloturer();
    }

    public function getTermine()
    {
        return $this->termine;
    }

    public function getType()
    {
      return $this->type;
    }

    public function getParticipant1()
    {
      return $this->participant1;
    }

    public function getParticipant2()
    {
      return $this->participant2;
    }

    public function getScoreParticipant1()
    {
      return $this->scoreParticipant1;
    }

    public function getScoreParticipant2()
    {
      return $this->scoreParticipant2;
    }

    private function cloturer()
    {
        if ($this->scoreParticipant1 === 3) {
            $this->participant2->setElimine(true);
            $this->termine = true;
        }

        if ($this->scoreParticipant2 === 3) {
            $this->participant1->setElimine(true);
            $this->termine = true;
        }
    }
}
