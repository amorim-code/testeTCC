<?php

/**
 * Curso.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Curso {
//put your code here
    public $codCurso;
    public $eixoCurso;
    public $nomeCurso;
    
    function getCodCurso() {
        return $this->codCurso;
    }

    function getEixoCurso() {
        return $this->eixoCurso;
    }

    function getNomeCurso() {
        return $this->nomeCurso;
    }

    function setCodCurso($codCurso){
        $this->codCurso = $codCurso;
    }

    function setEixoCurso($eixoCurso){
        $this->eixoCurso = $eixoCurso;
    }

    function setNomeCurso($nomeCurso){
        $this->nomeCurso = $nomeCurso;
    }
}
