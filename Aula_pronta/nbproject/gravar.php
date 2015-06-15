<?php 
            if(isset($_POST)&& !empty($_POST)){
               echo '<pre>';
               print_r($_POST);
               echo '</pre>';                
            }
           
            // Configurar a zona
            echo date_default_timezone_get(); //antes da alteração da região
            date_default_timezone_set("America/Sao_Paulo");
            echo date_default_timezone_get(); //após a alteração da região
              
            //Resgatar os dados do aluno           
            $nome = ($_POST['nome']);
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $sexo = $_POST['rbsexo'];
            
            $dtnasc = $_POST["dtnasc"]; //inverter
            $dtnasc = explode("/", $dtnasc); //Transformou em um vetor
            $dtnasc = array_reverse($dtnasc); //[aaaa][mm][dd] inverteu o vetor   
            $dtnasc = implode("-", $dtnasc); //colocou (-) para armaz. no banco
            
            $logradouro = $_POST["logradouro"];
            $numero = $_POST["numero"];
            $complemento = $_POST["complemento"];
            $cidade = $_POST["cidade"];
            $uf = strtoupper($_POST["uf"]);
            $cep = $_POST["cep"];
            $observacoes = $_POST["observacoes"];
            
            /* Verificar se o usuário informou atividades*/
            if(isset($_POST["atividades"])){
                $atividades = $_POST["atividades"];
                $temAtividades = TRUE;
            }else{
                $temAtividades = FALSE;
                $atividadesGravadas = FALSE;
            }
                            
            $dtcadastro = date("Y-m-d"); //Padrão do banco
                              
            /* Conexão com o banco e seleção da base de dados */
            include_once './conexao_bd.php';
            
            /* gravar as informações na base de dados - tabela de alunos */            
            $sqlaluno = "insert into aluno values(null, '".$nome."', '".$email
                    ."','".$telefone."','".$sexo."','".$dtnasc."','"
                    .$logradouro."',".$numero.",'".$complemento."','"
                    .$cidade."','".$uf."','".$cep."','".$observacoes."','"
                    .$dtcadastro."')";
            
            if (mysqli_query($con,$sqlaluno)){ //inserindo na tabela "aluno"
                $alunoGravado = true;
                $matricula = mysqli_insert_id($con);
            }else{
                $alunoGravado = false;            
            }
                        
            if($alunoGravado && $temAtividades){ // ===> gravar as atividades           
                for($i = 0; $i < count($atividades);$i++){  
                    //separar os dados da atividade
                    $ativ = explode(";", $atividades[$i]); 
                    $sqlatividades = "insert into atividade values(null,'"
                            .$ativ[0]."','".$ativ[1]."','".$ativ[2]."','"
                            .$matricula."')";
                  
                    if (mysqli_query($con,$sqlatividades)){
                        $atividadesGravadas= true;
                    }else{
                        $atividadesGravadas= false;
                    }                
                }
            }
            
            if($alunoGravado && ($atividadesGravadas || !$temAtividades)){
                $msg = "Dados gravados com sucesso";
                mysqli_commit($con); // commit na transação
            }else{
                $msg = "Erro na gravação dos dados";
                mysqli_rollback($con);
            }
            
            echo "<script>
                    alert('".$msg."');
                    location.href='espacodoaluno.php';
                 </script>";
           
            //Encerrar a conexão com o banco
            mysqli_close($con);        
?>

