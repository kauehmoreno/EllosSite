<!--
    NOME: Listaralunos.php
    OBJETIVO: CONSULTAR A RELAÇÃO DE ALUNOS MATRICULADOS NA ACADEMIA
-->
<!DOCTYPE html>
<html>
    <head>
         <!-- ** PÁGINA CRIADA NA AULA-6 **-->
         <?php include_once 'headPagina.php' ?>                   
        
    </head>
    <body>
       
        <div id="container">
        
            <?php include_once 'topoBannerPagina.php'?>
            
            <div class="espacodoaluno">
                
                <h3>Consultar Alunos</h3>

                <form action="ListarAlunos.php" method="get">
                    <br />
                    Nome: <input type="text" name="nome"/>
                          <input type="submit" value="Buscar">
                </form>

                <hr/> <!-- TAG HTML que coloca uma linha horizontal  -->

                <?php

                    if(isset($_GET["nome"])){ //verificar se existe o get nome (isto é o usuário digitou algo na busca
                        $nome = $_GET["nome"];                
                        include_once './conexao_bd.php';
                        //echo $nome;
                        $sql = "select * from aluno where nome like '".$nome."%'"; //O porcentagem é para recuperar tuplas quen comecem com a letra
 
                        $result = mysqli_query($con,$sql);

                        if(mysqli_num_rows($result)> 0){
                            ?>
                            <br />
                            <table width="900px" border="1px">
                                <tr>
                                    <th width="30%">Nome</th>
                                    <th width="25%">Email</th>
                                    <th width="15%">Telefone</th>
                                    <th width="18%">Data de Cadastro</th>
                                    <th width ="10%" >Consultar</th>
                                    <th width="10%">Excluir</th>
                                </tr>
                            <?php       
                                while($row = mysqli_fetch_array($result)){
                                     /*colocar a data no formato correto*/
                                     $dtcadastro = explode("-",$row["datagravacao"]);
                                     $dtcadastro = array_reverse($dtcadastro);
                                     $dtcadastro = implode($dtcadastro,"/")
                            ?>
                               <tr>
                                    <td><?php echo $row["nome"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["telefone"]; ?></td>
                                    <td><?php echo $dtcadastro; ?></td>
                                    <td class="centralizado">
                                       <a href="consultarAluno.php?matricula=<?php echo $row["matricula"]?>&nome=<?php echo $nome?>">
                                       <img src="img/consultar.png"></a>
                                    </td>
                                    <td class="centralizado">
                                        <a href="#" onclick="excluir(<?php echo $row["matricula"];?>)">
                                        <img src="img/excluir.png"></a>
                                    </td>
                               </tr>     

                            <?php    
                            }    
                        }else{
                            echo "Nenhum Aluno encontrado.";  
                        }
                         mysqli_close($con);
                    }
                   
                ?>
            </div>
        </div>                   
    </body>
</html>
