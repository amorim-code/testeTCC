<?php
            session_start();
            echo "Pagina de processamento <br>";
            
            //Chamando a classe PHPExcel e a conexão
            require("../Libraries/PHPExcel.php");
            require("../Libraries/PHPExcel/IOFactory.php");
            //require("../application/models/Gestor.class.php");
            
            //Chamando os arquivos responsáveis pela conexão ao banco
            require ("../application/config/config.php");
            require ("../application/config/Conn.class.php");
            
            //Classe de cadastro
            require ("../application/models/Create.class.php");
            
            //Conectando com o banco
            $conn = new Conn;
            $conn->getConn();          
            //var_dump($conn);
            
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
                    
                    //Implementado de outra aula
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
                    for ($row=9; $row<=10; $row++){
                        echo "<tr>";
                        //implementado
                        $c=0;
                                                
                        for ($coluna=0; $coluna<=4; $coluna++){
                            $dados = $sheet->getCellByColumnAndRow($coluna, $row)->getValue();
                            if ($dados != null){
                                /*echo "<td>";
                                echo $dados;
                                echo "</td>";*/
                                switch($coluna){
                                    case 2: $rmAluno = $dados;break;
                                    case 3: $nomeAluno = $dados;break;
                                    default: $periodo = $dados;
                                }
                                /*$tabela[$l][$c] = $dados;
                                echo "<pre>";
                                var_dump($tabela);
                                echo "</pre>";*/
                                $c++;
                            }else{
                                $coluna++;
                            }                                                                           
                        }
                        echo "</tr>";
                        $l++; 
                        
                        echo "RM do aluno: " . $rmAluno . "<hr>";
                        echo "Nome do aluno: " . $nomeAluno . "<br><hr>";
                        echo "Período: " . $periodo . "<br><hr>";
                        
                        //Cadastrando os dados
                        $Info = ['rmAluno'=> $rmAluno, 'rmUsuario' => $rmAluno, 'nome' => $nomeAluno];
                        
                        $Cadastrar = new Create;
                        $Cadastrar->ExeCreate('aluno', $Info);
                        
                        if($Cadastrar->getResultado()){
                            echo "Cadastro efetuado com sucesso! <\br><hr>";
                            $_SESSION["resultado"] = true;
                        }
                        
                        echo "<pre>";
                        var_dump($Cadastrar);
                        echo "</pre>";
                    }
                    echo "</table>";
                }      
            }        
?>

