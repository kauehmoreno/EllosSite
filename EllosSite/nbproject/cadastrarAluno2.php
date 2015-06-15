<!DOCTYPE html>

<html>

<head>
    
    <!-- ** PÁGINA CRIADA NA AULA-6 **-->
    <?php include_once 'headPagina.php' ?> 
   
</head>

<body>
            	
    <div id="container">
        
        <?php include_once 'topoBannerPagina.php' ?>
                        
        
        <div id="espacoaluno">
           
            <form name="formulario" id="idform" method="post" action="gravar.php">
                <fieldset>
                    
                    <div id="mensagens">
                        <ul id="minhalista"> </ul>
                    </div>
                    
                    <legend>Dados do Aluno</legend>
                        <fieldset id="dadospessoais">
                            <legend>Dados Pessoais</legend>
                                <label>Nome: <input type="text" tabindex="1" name="nome" size="38" maxlength="38" /></label> <br /> <br />
                                <label>Email: <input type="text" tabindex="2" name="email" namesize="40" maxlength="40" />  </label> <br /> <br />
                                <label>Telefone: <input type="text" tabindex="3" name="telefone" id="idtel" size="15" maxlength="15" />  </label> <br /> <br />
                                
                                <label>Sexo: 
                                    <!-- ao colocar o radio button com o mesmo nome, a opções ficam mutuamente excludentes-->
                                    <label> <input type="radio" name="rbsexo" value="M" />Masculino</label>
                                    <label> <input type="radio" name="rbsexo" value="F"/>Feminino</label>
                                </label>
                                <br /> <br/>
                                <label>Data de Nascimento: <input type="text" tabindex="4"id="iddtnasc" name="dtnasc" size="10" maxlength="10"/>  </label>
                                <br />                        
                        </fieldset>
                        <fieldset id="endereco">
                            <legend>Endereço</legend>
                            <label>Logradouro: <input type="text" name="logradouro" size="36" maxlength="40" />  </label> <br /> <br />
                            <!-- no JS tem outra função para mascara de número - MarcaraInteiro2-->
                            <label>Número: <input type="text" class="sonums" name="numero" size="1" maxlength="5" />  </label>
                            <label>Complemento: <input type="text" name="complemento" size="16" maxlength="20"/>  </label> <br /> <br />
                            <label>Cidade: <input type="text" name="cidade" size="27" maxlength="31" />  </label>  
                            <label>UF:
                                <select id="cbouf" name="uf">
                                    <option value="">  </option>
                                    <option value="rj">RJ</option>
                                    <option value="mg">MG</option>
                                    <option value="sp">SP</option>
                                    <option value="sc">SC</option>
                                    <option value="rs">RS</option>
                                </select>    

                            </label> <br /> <br />
                            <label>CEP: <input type="text" id="idcep" name="cep" size="10" maxlength="10" />  </label> <br /> <br />
                        </fieldset>    
                    
                        
                    
                        <fieldset id="atividades">
                            <legend>Atividades</legend>
                            
                            <label>Atividade:
                                <select id="cboatividade">
                                    <option value="0">Selecione</option>
                                    <option value="1">Musculação</option>
                                    <option value="2">Spinning</option>
                                    <option value="3">Ginástica Localizada</option>
                                    <option value="4">Pilates</option>
                                    <option value="5">Ergometria</option>
                                    <option value="6">Body Pump</option>
                                </select>    
                            </label>
                            
                            <label>Plano:
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
                            
                            <div id="ativincluidas">
                                <table id="tabelativ">
                                    <tr>
                                        <th width="30%">Atividade</th>
                                        <th width="20%">Plano</th>
                                        <th width="37%">Horário</th>
                                        <th width="3%">       </th>
                                    </tr>
                                </table>
                            </div>
                            
                            <button type="button" id="btincluir">Incluir</button>  <br /> <br />
                                                                                     
                        </fieldset>
                            
                        <fieldset>
                            <legend>Observações</legend>
                            <textarea name="observacoes" rows="5" cols="30"></textarea>                        
                        </fieldset>  
                        
                        <div id="camposhidden"></div>
                        
                        <button type="submit" id="btenviar" value="Enviar">Enviar</button>
                        <!--ou: <input type="submit" value="Enviar" /> -->

                        <button type="button" id="btlimpar">Limpar</button>    

                        <button type="button" id="btcancelar">Cancelar</button>
                                        
                </fieldset>
                
            </form>
            
        </div>
             
    
    	<div id="rodape">
        </div>
    </div>

</body>
</html>
