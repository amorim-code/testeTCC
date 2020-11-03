<?php

/**
 * Atividade.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Atividade{
//put your code here
    private $codigoAtividade;
    private $codigoPP;
    private $tituloAtividade;
    private $instrucaoAtividade;
    private $dataConclusaoAtividade;
    private $prazoAtividade;
    private $formaEntregaAtividade;
    private $mencaoAtividade;
    
    public function importarArquivo(){
        
    }
    
    public function exportarArquivo(){
        
    }
    
    public function enviarAtividade(){
        
    }
    
    function getCodigoAtividade() {
        return $this->codigoAtividade;
    }

    function getCodigoPP() {
        return $this->codigoPP;
    }

    function getTituloAtividade() {
        return $this->tituloAtividade;
    }

    function getInstrucaoAtividade() {
        return $this->instrucaoAtividade;
    }

    function getDataConclusaoAtividade() {
        return $this->dataConclusaoAtividade;
    }

    function getPrazoAtividade() {
        return $this->prazoAtividade;
    }

    function getFormaEntregaAtividade() {
        return $this->formaEntregaAtividade;
    }

    function getMencaoAtividade() {
        return $this->mencaoAtividade;
    }

    function setCodigoAtividade($codigoAtividade){
        $this->codigoAtividade = $codigoAtividade;
    }

    function setCodigoPP($codigoPP){
        $this->codigoPP = $codigoPP;
    }

    function setTituloAtividade($tituloAtividade){
        $this->tituloAtividade = $tituloAtividade;
    }

    function setInstrucaoAtividade($instrucaoAtividade){
        $this->instrucaoAtividade = $instrucaoAtividade;
    }

    function setDataConclusaoAtividade($dataConclusaoAtividade){
        $this->dataConclusaoAtividade = $dataConclusaoAtividade;
    }

    function setPrazoAtividade($prazoAtividade){
        $this->prazoAtividade = $prazoAtividade;
    }

    function setFormaEntregaAtividade($formaEntregaAtividade){
        $this->formaEntregaAtividade = $formaEntregaAtividade;
    }

    function setMencaoAtividade($mencaoAtividade){
        $this->mencaoAtividade = $mencaoAtividade;
    }


    
        
}
