<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Testando pro TCC</title>
    </head>
    <body>
        <h1> Importando Planilhas para o banco </h1>
        <?php
            session_start();
            echo "Pagina de processamento <br>";
            
            //Chamando a classe PHPExcel e a conexão
            require("../Libraries/PHPExcel.php");
            require('conexao.php');
            
            //Verificando se o arquivo não veio vazio
            if(!empty($_FILES['arquivo']['tmp_name'])){
                
                $planilha = $_FILES['arquivo']['tmp_name'];
                
                //Carrega automaticamente qualquer tipo de arquivo que for enviado
                $leitura = PHPExcel_IOFactory::createReaderForFile($planilha);
                //$aba = ('Doc30 - ANO 2019');
                //$leitura->setLoadSheetsOnly($aba);
                $objPHPExcel = $leitura->load($planilha);
                
                $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                $totaColunas = PHPExcel_Cell::columnIndexFromString($colunas);
                
                $totalLinhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                
                echo "<table border = '1'>";
                for ($linha=1; $linha<=$totalLinhas; $linha++){
                    echo "<tr>";
                    for ($coluna=0; $coluna<=$totaColunas-1; $coluna++){
                        if($linha==1){
                            echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue());
                        }
                        else{
                            echo "<td>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue());
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }        
            else{
                $_SESSION["erro"] = 1;  
            }
            
            /*echo "<pre>";
            var_dump($return);
            echo "</pre>";*/
            //var_dump($dados);
        
            /*include_once "conexao.php"; //chamei o arquivo de conexão com o banco
        
            $primeiraLinha = true; //vai excluir a linha do cabeçalho em um laço
           
            if(!empty($_FILES['arquivo']['tmp_name'])){//verifica se o tmp_name não foi sem arquivo
                
                $arquivo = new DOMDocument(); //Classe do PHP que trabalh com excel
                
                $arquivo->load($_FILES['arquivo']['tmp_name']); //carrega o arquivo excel enviado
                
                $primeira_linha = true;
                
                $linhas = $arquivo->getElementsByTagName("Row"); //pega só a tag linha do arquivo.xml
                $totalLinhas = $arquivo->setActiveSheetIndex(0)->getgetHighestRow();
                
                var_dump($totalLinhas);
                
                foreach($linhas as $linha) //percorre as linhas do arquivo
                {
                    if ($primeiraLinha == false)
                    {
                        $disciplina = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                        if (!empty($disciplina))
                        {
                            echo "Disciplina: $disciplina <br>";
                            $instrucao_disc = "INSERT INTO disciplina (nome) values ('$disciplina')";
                            $resultado = mysqli_query($conn, $instrucao_disc);
                        }
                        else
                        {
                            break;
                        }
                    }
                    $primeiraLinha = false;
                }
                echo "Dados cadastrados";
            }*/
        ?>
        <h1> Exibindo as planilhas cadastradas </h1>
        <?php
            
        ?>
        <h1> Exportar Planilhas do banco </h1>
        <?php
       
        ?>
        <h1> Editar word pelo site </h1>
        <?php
       
        ?>
    </body>
</html>
