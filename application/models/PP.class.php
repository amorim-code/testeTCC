<?php

/**
 * PP.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class PP {
//put your code here
    protected $codigoPP;
    protected $rmProfessor;
    protected $rmAluno;
    protected $competenciaPP;
    protected $habilidadePP;
    protected $baseTecnologicaPP;
    protected $cursoPP;
    protected $semestrePP;
    protected $anoPP;
    protected $seriePP;
    protected $disciplinaPP;
    protected $statusPP;
    protected $mencaoFinalPP;
    protected $dataTerminoPP;
    
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
