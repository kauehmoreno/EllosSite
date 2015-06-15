<!DOCTYPE html>

<html>

<head>
    
    <!-- ** PÁGINA CRIADA NA AULA-9 **-->
    <?php include_once 'headPagina.php' ?> 
   
</head>

<body>
            	
    <div id="container">
        
        <?php include_once 'topoBannerPagina.php';
            /*recuperar a matrícula do aluno via GET*/
        if(isset($_GET["matricula"])){ //verificar se existe o get nome (isto é o usuário digitou algo na busca
             $matricula = $_GET['matricula'];
        }
            
        include_once './conexao_bd.php';
        
        $sqlaluno = "select * from aluno where matricula =".$matricula;
            
        $resultaluno = mysqli_query($con,$sqlaluno);
            
            /*exibir os dados do aluno*/
        if(mysqli_num_rows($resultaluno)> 0){
            $rowaluno = mysqli_fetch_array($resultaluno);
            $matricula = $rowaluno["matricula"] + 1000;
        ?>
        
        <div id="espacoaluno">
           
            <form name="formulario" id="idform" method="post" action="gravar.php">
                <fieldset>
                    
                    <div id="mensagens">
                        <ul id="minhalista"> </ul>
                    </div>
                    
                    <legend>Dados do Aluno</legend>
                        <fieldset id="dadospessoais">
                            <legend>Dados Pessoais - <?php echo "<label> Matrícula: ".$matricula."</label>"; ?>  </legend>
                                
                                <label>Nome: <input type="text" tabindex="1" name="nome" size="38" maxlength="38"
                                                    disabled="disabled" value="<?php echo $rowaluno["nome"] ?>"/></label> <br /> <br />
                                <label>Email: <input type="text" tabindex="2" name="email" namesize="40" maxlength="40"
                                                    disabled="disabled" value="<?php echo $rowaluno["email"] ?>"  />  </label> <br /> <br />
                                <label>Telefone: <input type="text" tabindex="3" name="telefone" id="idtel" size="15" maxlength="15"
                                                    disabled="disabled" value="<?php echo $rowaluno["telefone"] ?>" />  </label> <br /> <br />
                                <label>Sexo: 
                                    <!-- ao colocar o radio button com o mesmo nome, a opções ficam mutuamente excludentes-->
                                    <label> <input type="radio" name="rbsexo" value="M"
                                                   disabled="disabled" <?php if($rowaluno["sexo"]=='M'){echo "checked=true";}?>/> Masculino</label>
                                    <label> <input type="radio" name="rbsexo" value="F"
                                                   disabled="disabled" <?php if($rowaluno["sexo"]=='F'){echo "checked=true";}?> />Feminino</label>
                                </label>
                                <br /> <br/>
                                <label>Data de Nascimento: <input type="text" tabindex="4"id="iddtnasc" name="dtnasc" size="10" maxlength="10"
                                                   disabled="disabled" value="<?php $dtnasc = explode("-",$rowaluno["dtnasc"]);
                                                                                    $dtnasc = array_reverse($dtnasc);
                                                                                    $dtnasc = implode($dtnasc,"/"); 
                                                                                    echo $dtnasc; ?>" />  </label>
                                <br />                        
                        </fieldset>
                        <fieldset id="endereco">
                            <legend>Endereço</legend>
                            <label>Logradouro: <input type="text" name="logradouro" size="36" maxlength="40" 
                                                disabled="disabled" value="<?php echo $rowaluno["logradouro"] ?>" />  </label> <br /> <br />
                            <!-- no JS tem outra função para mascara de número - MarcaraInteiro2-->
                            <label>Número: <input type="text" class="sonums" name="numero" size="1" maxlength="5"
                                                disabled="disabled" value="<?php echo $rowaluno["numero"] ?>" />  </label>
                            <label>Complemento: <input type="text" name="complemento" size="16" maxlength="20" 
                                                disabled="disabled" value="<?php echo $rowaluno["complemento"] ?>" />  </label> <br /> <br />
                            <label>Cidade: <input type="text" name="cidade" size="27" maxlength="31" 
                                                disabled="disabled" value="<?php echo $rowaluno["cidade"] ?>" />  </label>  
                            <label>UF:
                                <select disabled="disabled" id="cbouf" name="uf">
                                    <option value=""   <?=($rowaluno["uf"] === '')?"selected='selected'":""?>> </option>
                                    <option value="rj" <?=($rowaluno["uf"] === 'RJ')?"selected='selected'":""?>>RJ</option>
                                    <option value="mg" <?=($rowaluno["uf"] === 'MG')?"selected='selected'":""?>>MG</option>
                                    <option value="sp" <?=($rowaluno["uf"] === 'SP')?"selected='selected'":""?>>SP</option>
                                    <option value="sc" <?=($rowaluno["uf"] === 'SC')?"selected='selected'":""?>>SC</option>
                                    <option value="rs" <?=($rowaluno["uf"] === 'RS')?"selected='selected'":""?>>RS</option>
                                </select>    

                            </label> <br /> <br />
                            <label>CEP: <input type="text" id="idcep" name="cep" size="10" maxlength="10"
                                        disabled="disabled" value="<?php echo $rowaluno["cep"] ?>" />  </label> <br /> <br />
                        </fieldset>    
                    
                        
                    
                        <fieldset id="atividades">
                            <legend>Atividades</legend>
                            
                            <label hidden>Atividade:
                                <select id="cboatividade" >
                                    <option value="0">Selecione</option>
                                    <option value="1">Musculação</option>
                                    <option value="2">Spinning</option>
                                    <option value="3">Ginástica Localizada</option>
                                    <option value="4">Pilates</option>
                                    <option value="5">Ergometria</option>
                                    <option value="6">Body Pump</option>
                                </select>    
                            </label>
                            
                            <label hidden>Plano:
                                <select id="cbocategoria">
                                    <option value="0">Selecione</option>
                                    <option value="1">Livre</option>
                                    <option value="2">Período</option>
                                    <option value="3">Horário</option>
                                </select>    
                            </label>
                            
                            <div id="periodo">
                            <label>Período:
                                <select id="cboperiodo" >
                                    <option value="0">Selecione</option>
                                    <option value="1">Manhã</option>
                                    <option value="2">Tarde</option>
                                    <option value="3">Noite</option>
                                </select>    
                            </label>                             
                            </div> <br />
                                                        
                            <div id="horario">
                            <label>Horário: 
                            <table id="tabelahorario">
                                <tr>
                                    <td> <input type="checkbox" class="chkhorario" value="Seg" />Segunda</td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora" /></label></td>
                                </tr>
                                
                                <tr>
                                    <td> <input type="checkbox" class="chkhorario" value="Ter" />Terça</td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora" /></label></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="checkbox" class="chkhorario" value="Qua" />Quarta </td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora"  /></label></td>
                                </tr>
                                
                                <tr>
                                    <td> <input type="checkbox" class="chkhorario" value="Qui" />Quinta </td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora" /></label></td>                                                                    
                                </tr>
                                
                                <tr>
                                    <td> <input type="checkbox" class="chkhorario" value="Sex" />Sexta </td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora"  /></label></td>                                    
                                </tr>
                                
                                <tr>
                                    <td> <input type="checkbox" class="chkhorario" value="Sab" />Sábado </td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora" /></label></td>      
                                </tr>
                                
                                <tr>
                                    <td> <input type="checkbox" class="chkhorario" value="Dom" />Domingo </td>
                                    <td><label>Hora Início: <input type="text" class="hora" /></label></td>
                                    <td><label>Hora Fim: <input type="text" class="hora" /></label></td>                                    
                                </tr>
                                
                            </table>  
                            </label> <br />
                            </div>
                            
                            <?php
                                /*Verificar se o aluno possui atividades cadadstradas*/
                            $sqlativ = "select * from atividade where idmatricula =".$rowaluno["matricula"];
                            $resultativ = mysqli_query($con,$sqlativ);
                            /*exibir os dados do aluno*/
                            if(mysqli_num_rows($resultativ)> 0){
                            ?>
                                                        
                            <div id="ativincluidas" style="display:block">
                                <table id="tabelativ">
                                    <tr>
                                        <th width="30%">Atividade</th>
                                        <th width="20%">Plano</th>
                                        <th width="37%">Horário</th>
                                        <th width="3%">       </th>
                                    </tr>
                                    <?php       
                                    while($rowativ = mysqli_fetch_array($resultativ)){
                                    ?>
                                        <tr>  
                                            <td><?php echo $rowativ["nomeatividade"]; ?></td>
                                            <td><?php echo $rowativ["plano"]; ?></td>
                                            <td><?php echo $rowativ["horario"]; ?></td>
                                            <td><img src='img/fechar.png' class='btExcluir'></td>
                                        </tr>
                                    <?php   
                                    }//fim while?>
                                </table>
                            </div>
                            <?php   
                            }// atividade encontrada?>
                            <button type="button" id="btincluir" hidden>Incluir</button>  <br /> <br />
                                                                                     
                        </fieldset>
                            
                        <fieldset>
                            <legend>Observações</legend>
                            <textarea disabled="disabled" name="observacoes" rows="5" cols="30"><?php echo $rowaluno["observacoes"] ?></textarea>                        
                        </fieldset>  
                        
                        <div id="camposhidden"></div>
                        
                        <button type="submit" id="btenviar" value="Enviar" hidden>Enviar</button>
                       
                        <button type="button" id="btlimpar" hidden>Limpar</button>    

                        <button type="button" id="btcancelar" hidden>Cancelar</button>
                        
                        <button type="button" id="btvoltar" onclick='voltar("<?php echo $_GET['nome']?>")'>Voltar</button>
                        
                        <button type="button" id="btalterar" >Alterar</button>
                                        
                </fieldset>
                
            </form>
            
        </div>
        <?php
        } 
        else{echo "Aluno não encontrado";}// se aluno encontrado
        ?>
             
    
    	<div id="rodape">
        </div>
    </div>

</body>
</html>
