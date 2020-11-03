<?php

/**
 * Turma.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Turma{
    private $codTurma;
    private $codCurso;
    private $nomeTurma;
    private $semestreTurma;
    private $anoTurma;
    
    function getCodTurma() {
        return $this->codTurma;
    }
    
    function getCodCurso(){
        return $this->codCurso;
    }

    function getNomeTurma() {
        return $this->nomeTurma;
    }

    function getSemestreTurma() {
        return $this->semestreTurma;
    }

    function getAnoTurma() {
        return $this->anoTurma;
    }
    
    function setCodTurma($codTurma){
        $this->codTurma = $codTurma;
    }
    
    function setCodCurso($codCurso){
        $this->codCurso = $codCurso;
    }
    
    function setNomeTurma($nomeTurma){
        $this->nomeTurma = $nomeTurma;
    }

    function setSemestreTurma($semestreTurma){
        $this->semestreTurma = $semestreTurma;
    }

    function setAnoTurma($anoTurma){
        $this->anoTurma = $anoTurma;
    }
}
