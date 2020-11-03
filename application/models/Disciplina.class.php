<?php

/**
 * Disciplina.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Disciplina {
//put your code here
    private $codDisciplina;
    private $eixoDisciplina;
    private $nomeDisciplina;
    
    function getCodDisciplina() {
        return $this->codDisciplina;
    }

    function getEixoDisciplina() {
        return $this->eixoDisciplina;
    }

    function getNomeDisciplina() {
        return $this->nomeDisciplina;
    }

    function setCodDisciplina($codDisciplina){
        $this->codDisciplina = $codDisciplina;
    }

    function setEixoDisciplina($eixoDisciplina){
        $this->eixoDisciplina = $eixoDisciplina;
    }

    function setNomeDisciplina($nomeDisciplina){
        $this->nomeDisciplina = $nomeDisciplina;
    }
}
