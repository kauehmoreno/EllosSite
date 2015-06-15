<!DOCTYPE html>

<html>

<head>
    
    <!-- ** PÁGINA CRIADA NA AULA-4 **-->
    <?php include_once 'headPagina.php' ?> 
   
</head>

<body>
            	
    <div id="container">
        
        <?php include_once 'topoBannerPagina.php' ?>
        
        <div id="espacoaluno">
           
            <form name="formulario" id="idform" action="gravar.php" onsubmit="return validarCamposObrigatorios(this)" method="post">
                <fieldset>
                    <legend>Dados do Aluno</legend>
                        <fieldset id="dadospessoais">
                            <legend>Dados Pessoais</legend>
                            <label>Nome: <input type="text" tabindex="1" id="idnome" name="nome" size="40" maxlength="40" />  </label> <br /> <br />
                                <label>Email: <input type="text" tabindex="2" id="idemail" name="email" namesize="40" maxlength="40" onblur="validarEmail(this)"/>  </label> <br /> <br />
                                <label>Telefone: <input type="text" tabindex="3" id="idtel" name="telefone" size="15" maxlength="15" onKeyPress="mascaraTelefone(this);"
                                               onBlur="validarTelefone(this)" />  </label> <br /> <br />
                                
                                <label>Sexo: 
                                    <!-- ao colocar o radio button com o mesmo nome, a opções ficam mutuamente excludentes-->
                                    <label> <input type="radio" name="rbsexo" value="M" />Maculino</label>
                                    <label> <input type="radio" name="rbsexo" value="F"/>Feminino</label>
                                </label>
                                <br /> <br/>
                                <label>Data de Nascimento: <input type="text" tabindex="4" id="iddtnasc" name="dtnasc" size="10" maxlength="10" onKeyPress="mascaraData(this);"
                                               onBlur="validarData(this)" />  </label>
                                <br />                        
                        </fieldset>
                        <fieldset id="endereco">
                            <legend>Endereço</legend>
                            <label>Logradouro: <input type="text" id="idlogradouro" name="logradouro" size="36" maxlength="40" />  </label> <br /> <br />
                            <!-- no JS tem outra função para mascara de número - MarcaraInteiro2-->
                            <label>Número: <input type="text" id="idnumero" name="numero" size="1" maxlength="5" onKeyPress="mascaraInteiro()"  />  </label>
                            <label>Complemento: <input type="text" id="idcomplemento" name="complemento" size="16" maxlength="20"/>  </label> <br /> <br />
                            <label>Cidade: <input type="text" id="idcidade" name="cidade" size="27" maxlength="31" />  </label>  
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
                            <label>CEP: <input type="text" id="idcep" name="cep" size="10" maxlength="10" onKeyPress="mascaraCep(this);" onblur="validarCep(this)"/>  </label> <br /> <br />
                        </fieldset>    
                    
                        <fieldset id="atividades">
                            <legend>Atividades</legend>
                            
                            <label>Atividade:
                                <select id="cboatividade">
                                    <option name="opativ" value="0">Selecione</option>
                                    <option name="opativ" value="1">Musculação</option>
                                    <option name="opativ" value="2">Spinning</option>
                                    <option name="opativ" value="3">Ginástica Localizada</option>
                                    <option name="opativ" value="4">Pilates</option>
                                    <option name="opativ" value="5">Ergometria</option>
                                    <option name="opativ" value="6">Body Pump</option>
                                </select>    
                            </label>
                            
                            <label>Plano:
                                <select id="cbocategoria" onchange="verificaPeriodo()">
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
                                    <td class="td1"> <input type="checkbox" name="chkh"  class="chkhorario" value="Seg"
                                                   onclick="habilitarHora(this)" />Segunda</td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraSeg" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraSeg" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                </tr>
                                
                                <tr>
                                    <td class="td1"> <input type="checkbox" name="chkh" class="chkhorario" value="Ter"
                                                   onclick="habilitarHora(this)" />Terça</td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraTer" size="5" maxlength="5" 
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraTer" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                </tr>
                                
                                <tr>
                                    <td class="td1"> <input type="checkbox" name="chkh" class="chkhorario" value="Qua"
                                                   onclick="habilitarHora(this)" />Quarta </td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraQua" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraQua" size="5" maxlength="5" 
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                </tr>
                                
                                <tr>
                                    <td class="td1"> <input type="checkbox" name="chkh" class="chkhorario" value="Qui"
                                                   onclick="habilitarHora(this)" />Quinta </td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraQui" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraQui" size="5" maxlength="5" 
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>                                                                    
                                </tr>
                                
                                <tr>
                                    <td class="td1"> <input type="checkbox" name="chkh" class="chkhorario" value="Sex"
                                                   onclick="habilitarHora(this)" />Sexta </td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraSex" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraSex" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>                                    
                                </tr>
                                
                                <tr>
                                    <td class="td1"> <input type="checkbox" name="chkh" class="chkhorario" value="Sab"
                                                   onclick="habilitarHora(this)" />Sábado </td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraSab" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraSab" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>      
                                </tr>
                                
                                <tr>
                                    <td class="td1"> <input type="checkbox" name="chkh" class="chkhorario" value="Dom"
                                                   onclick="habilitarHora(this)" />Domingo </td>
                                    <td class="td1"><label>Hora Início: <input type="text" class="hora" name="ihoraDom" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>
                                    <td class="td1"><label>Hora Fim: <input type="text" class="hora" name="fhoraDom" size="5" maxlength="5"
                                                   disabled="true" onblur="validarHora(this)" onKeyPress="mascaraHora(this)" /></label></td>                                    
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
                            
                            <button type="button" id="btincluir" onclick="incluirAtividade()">Incluir</button>  <br /> <br />
                 
                                                                    
                        </fieldset>
                            
                        <fieldset>
                            <legend>Observações</legend>
                            <textarea rows="5" cols="30"></textarea>                        
                        </fieldset>  
                            
                        <button type="submit" id="btenviar">Enviar</button>
                        <!--ou: <input type="submit" value="Enviar" /> -->

                        <button type="button" id="btlimpar" onclick="limparCampos('espacoaluno')">Limpar</button>    

                        <button type="button" id="btcancelar" onclick="javascript:location.href='espacodoaluno.php';">Cancelar</button>
                                        
                </fieldset>
                
            </form>
            
        </div>
             
    
    	<div id="rodape">
        </div>
    </div>

</body>
</html>
