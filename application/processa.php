<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Testando pro TCC</title>
    </head>
    <body>
        <h1> Importando Planilhas para o banco </h1>
        <?php
            echo "Pagina de processamento";
            //$dados = $_FILES['arquivo'];
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
