<?php
            session_start();
            echo "<h1>Pagina de processamento </h1><br>";
            
            //Chamando a classe PHPExcel e a conexão
            require("../Libraries/PHPExcel.php");
            require("../Libraries/PHPExcel/IOFactory.php");
            require("../application/models/Gestor.class.php");
            
            //Chamando os arquivos responsáveis pela conexão ao banco
            require ("../application/config/config.php");
            require ("../application/config/Conn.class.php");
            
            //Classes de cadastro
            require ("../application/models/Create.class.php");
            require ("../application/models/Usuario.php");
            require ("../application/models/UsuarioDAO.class.php");
            require ("../application/models/AlunoDAO.class.php");
            require ("../application/models/Turma.class.php");
            require ("../application/models/TurmaDAO.class.php");
            require ("../application/models/Disciplina.class.php");
            require ("../application/models/DisciplinaDAO.class.php");
            require ("../application/models/PP.class.php");
            require ("../application/models/PPDAO.class.php");
            
            //Conectando com o banco
            //$conn = new Conn;
            //$conn->getConn();          
            //var_dump($conn);
            
            $Usuario = new application\models\Usuario();
            $AlunoDAO = new AlunoDAO();
            $PP = new PP();
            $PPDAO = new PPDAO();
            
            
            //Verificando se o arquivo não veio vazio
            if(!empty($_FILES['uploadPPs']['tmp_name'])){
                $planilha = $_FILES['uploadPPs']['tmp_name'];
                
                //Carrega automaticamente qualquer tipo de arquivo que for enviado
                $leitura = PHPExcel_IOFactory::createReaderForFile($planilha);
                
                //Carrega o arquivo enviado
                $objPHPExcel = $leitura->load($planilha);
                
                //Não entendi direito pra que serve mas fé
                $worksheet = $objPHPExcel->getWorksheetIterator();

                foreach($worksheet as $sheet){
                    $totalLinhas = $sheet->getHighestRow();
                    
                    //pegando o total de colunas
                    $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                    $totaColunas = PHPExcel_Cell::columnIndexFromString($colunas);

                    $row=1;
                    $coluna=0;
                    $i=0;

                    $l=0;
                                        
                    $tabela = array (
                        array()
                    );
                    
                    //ALTEREI O FOR PRA IR POUCO DADO PRO BANCO AGORA NO COMEÇO - Xofana
                    for ($row=12; $row<=15; $row++){
                        //implementado
                        $c=0;                      
                        for ($coluna=0; $coluna<=$totaColunas; $coluna++){
                            $dados = $sheet->getCellByColumnAndRow($coluna, $row)->getValue();
                            if ($dados != null){
                                switch($coluna){
                                    case 2: $rmAluno = $dados;break;
                                    case 3: $nomeAluno = $dados;break;
                                    case 4: $periodo = $dados;break;
                                    case 6: $turmaPP = $dados;break;
                                    case 7: $semestreAno = $dados;break;
                                    case 8: $disciplina = $dados;break;
                                    case 9: $professor = $dados;break;
                                    default: $nulo = $dados;    
                                }
                                $c++;
                            }
                        }
                        $l++; 
                        
                        //Cadastrando o usuário Aluno
                        $Usuario->setId($rmAluno);
                        $Usuario->setNome($nomeAluno);
                        $Usuario->setPerfil('Aluno');
                        
                        $UsuarioDAO = new UsuarioDAO();
                        
                        $UsuarioDAO->verificaUsuario($rmAluno);
                        
                        if ($UsuarioDAO->getResult() == false){
                            $UsuarioDAO->cadastrarUsuario($Usuario);
                            $AlunoDAO->cadastrarAluno($Usuario);
                        }
                        
                        //Cadastrando Professor
                        //tirando a / da string de professores da tabela
                        $professores = explode("/", $professor);
                        $prof1 = $professores[0];
                       
                        //exibindo o nome dos profs separado
                        /*if (count($professores) == 1){
                            echo "Professor responsável: " . $prof1 . "<br><hr>";
                            
                        }else{
                            $prof2 = $professores[1];
                            echo "Professores responsaveis: " . $prof1 . " e " . $prof2 . "<br><hr>";
                        }*/
                        
                        //Cadastrando turma, aqui eu vou usar um código ja cadastrado manualmente na tabela curso, já que por enquanto não sabemos como vamos cadastrá-lo
                        //Separando o semestre e o ano da turma de PP
                        $SemAno = explode("/", $semestreAno);
                        $semestre = $SemAno[0];
                        $ano = $SemAno[1];
                        
                        $turma = new Turma();
                        $turmaDAO = new TurmaDAO();
                        $disc = new Disciplina();
                        $discDAO = new DisciplinaDAO();
                        
                        $turma->setNomeTurma($turmaPP);
                        $turma->setAnoTurma($ano);
                        $turma->setCodCurso(1); //setado manualmente!
                        
                        $turmaDAO->verificaTurma($turma);
                        if ($turmaDAO->getResult() == false){
                           $turmaDAO->cadastrar($turma);
                        }
                        
                        //Cadastrando disciplina
                        foreach($turmaDAO->verificaTurma($turma) as $t){
                               $disc->setCodTurma($t["cod_turma"]);
                               $PP->setSeriePP($t["nome_turma"]);
                               $PP->setAnoPP($t["ano_turma"]);
                        }
                        
                        
                        $disc->setNomeDisciplina($disciplina);
                        
                        if ($discDAO->verificaDisciplina($disc) == false){
                            $discDAO->cadastrar($disc);
                        }
                        
                        foreach($discDAO->verificaDisciplina($disc) as $d){
                               $PP->setCodDisciplina($d["codDisciplina"]);
                               $PP->setDisciplinaPP($d["nomeDisciplina"]);
                        }
                        
                        /*for ($i=0; $i<=1; $i++){
                            foreach($turmaDAO->buscarCursoTurma($turma->getCodCurso()) as $tt){
                               $PP->setCodDisciplina($tt["nome_curso"]);
                               echo "{$PP->getCodDisciplina()}";
                            }
                        }*/
                        
                        $PP->setRmAluno($rmAluno);
                        $PP->setRmGestor('180115');
                        $PP->setSemestrePP($semestre);
                        $PP->setStatusPP('Em aberto');
                        $PP->setCursoPP('Informática');
                        
                        if($PPDAO->getResultado() == false){
                            //Cadastrando PP
                            $PPDAO->cadastrar($PP);
                        }
                        header("location: inicioGestor.php");
                    }
                    echo "</table>";
                }
            }
            else{
                echo "Arquivo não foi carregado!";
            }
?>

