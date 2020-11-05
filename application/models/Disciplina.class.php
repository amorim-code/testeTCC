<?php

/**
 * Disciplina.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Disciplina {
    private $codDisciplina;
    private $siglaDisciplina;
    private $nomeDisciplina;
    private $codTurma;
    
    function getCodDisciplina() {
        return $this->codDisciplina;
    }

    function getSiglaDisciplina() {
        return $this->siglaDisciplina;
    }

    function getNomeDisciplina() {
        return $this->nomeDisciplina;
    }
    
    function getCodTurma() {
        return $this->codTurma;
    }

    function setCodDisciplina($codDisciplina){
        $this->codDisciplina = $codDisciplina;
    }

    function setSiglaDisciplina($siglaDisciplina){
        $this->siglaDisciplina = $siglaDisciplina;
    }

    function setNomeDisciplina($nomeDisciplina){
        $this->nomeDisciplina = $nomeDisciplina;
    }
    
    function setCodTurma($codTurma) {
        $this->codTurma = $codTurma;
    }
}
