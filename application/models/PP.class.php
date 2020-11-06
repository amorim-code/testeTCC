<?php

/**
 * PP.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class PP {
    private $codDisciplina;
    private $rmAluno;
    private $rmProfessor;
    private $rmGestor;
    private $competenciaPP;
    private $habilidadePP;
    private $baseTecnologicaPP;
    private $cursoPP;
    private $semestrePP;
    private $anoPP;
    private $seriePP;
    private $disciplinaPP;
    private $statusPP;
    private $mencaoFinalPP;
    private $dataTerminoPP;
    
    function getCodDisciplina() {
        return $this->codDisciplina;
    }

    function getRmAluno() {
        return $this->rmAluno;
    }

    function getRmProfessor() {
        return $this->rmProfessor;
    }

    function getCompetenciaPP() {
        return $this->competenciaPP;
    }

    function getHabilidadePP() {
        return $this->habilidadePP;
    }

    function getBaseTecnologicaPP() {
        return $this->baseTecnologicaPP;
    }

    function getCursoPP() {
        return $this->cursoPP;
    }

    function getSemestrePP() {
        return $this->semestrePP;
    }

    function getAnoPP() {
        return $this->anoPP;
    }

    function getSeriePP() {
        return $this->seriePP;
    }

    function getDisciplinaPP() {
        return $this->disciplinaPP;
    }

    function getStatusPP() {
        return $this->statusPP;
    }

    function getMencaoFinalPP() {
        return $this->mencaoFinalPP;
    }

    function getDataTerminoPP() {
        return $this->dataTerminoPP;
    }
    
    function getRmGestor() {
        return $this->rmGestor;
    }

    function setCodDisciplina($codDisciplina){
        $this->codDisciplina = $codDisciplina;
    }

    function setRmAluno($rmAluno){
        $this->rmAluno = $rmAluno;
    }

    function setRmProfessor($rmProfessor){
        $this->rmProfessor = $rmProfessor;
    }

    function setCompetenciaPP($competenciaPP){
        $this->competenciaPP = $competenciaPP;
    }

    function setHabilidadePP($habilidadePP){
        $this->habilidadePP = $habilidadePP;
    }

    function setBaseTecnologicaPP($baseTecnologicaPP){
        $this->baseTecnologicaPP = $baseTecnologicaPP;
    }

    function setCursoPP($cursoPP){
        $this->cursoPP = $cursoPP;
    }

    function setSemestrePP($semestrePP){
        $this->semestrePP = $semestrePP;
    }

    function setAnoPP($anoPP){
        $this->anoPP = $anoPP;
    }

    function setSeriePP($seriePP){
        $this->seriePP = $seriePP;
    }

    function setDisciplinaPP($disciplinaPP){
        $this->disciplinaPP = $disciplinaPP;
    }

    function setStatusPP($statusPP){
        $this->statusPP = $statusPP;
    }

    function setMencaoFinalPP($mencaoFinalPP){
        $this->mencaoFinalPP = $mencaoFinalPP;
    }

    function setDataTerminoPP($dataTerminoPP){
        $this->dataTerminoPP = $dataTerminoPP;
    }
    
    function setRmGestor($rmGestor) {
        $this->rmGestor = $rmGestor;
    }

    //Cadastro de competências, habilidades e bases tecnológicas
    protected function preencherDoc31 (Professor $professor)
    {
        
    }
    
    //Caso o professor queira editar alguma coisa no doc
    protected function alterarDoc31(Professor $professor){
        
    }
    
    //No fim do ano ele verificará se o aluno cumpriu ou não a PP
    protected function concluirDoc31(Professor $professor){
        
    }
    
}
