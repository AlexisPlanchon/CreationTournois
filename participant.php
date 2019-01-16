<?php

class Participant
{
    private $nom;
    private $elimine = false;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function setElimine($elimine)
    {
        $this->elimine = $elimine;
    }

    public function getElimine()
    {
      return $this->elimine;
    }

    public function getNom()
    {
      return $this->nom;
    }
}
