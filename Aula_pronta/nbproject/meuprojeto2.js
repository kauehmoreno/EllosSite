/*Funções Java Script para o formulário - com Jquery*/

/*
 * A função LOAD abaixo pode também ser escrita das seguintes formas:
 * 
 * jquery(document).ready(function(){
 *      //faça alguma coisa
 * });
 * ou
 * 
 * $(document).ready(function(){
 *      //faça alguma coisa
 * });
 *
 *  OBS: caracter $ é utilizado como um modo bem curto de dizer jquery.
 *  Ou seja, $("p") é o mesmo que jquery("p").
 *   
 */

/*Comandos que serão executados com a página for carregada*/
$(function() {
      
    /*Associar o evento click para o botão incluir atividades */
    $("#btincluir").bind("click",incluirAtividade);
    /* Ação do botão limpar */
    $("#btlimpar").click(function(){$("#idform")[0].reset();});
    /* Ação do botão cancelar */
    $("#btcancelar").click(function(){window.location.href='espacodoaluno.php';});
    /*Incluído na aula 9*/
    
    /*Desabilitar os campos hora da tabela de horários*/
    $('.hora').attr("disabled", true);
    
    /*Máscara dos campos com Jquery - biblioteca JQUERY- MASKED INPUT*/ 
    $("#iddtnasc").mask("99/99/9999");
    $("#idtel").mask("(99) 99999-9999");
    $("#idcep").mask("99.999-999");
    $(".hora").mask("99:99");
    $(".sonums").mask("9?9999"); //depois da interrogação é tudo opcional
    
    /*Regras de validação dos campos do form - biblioteca JQUERY VALIDATION*/
    $("#idform").validate({
        rules: {
            nome:{required: true, minlength: 4},
            email:{required: true, email:true},
            telefone:{required: true},
            dtnasc:{required: true, dateBR:true},
            rbsexo:{required:true},
            logradouro:{required:true},
            numero:{required:true},
            complemento:{required:false},
            cidade:{required:true},
            uf:{required:true},
            cep:{required:true}
        },
    
        messages: {
            nome:{required: "Informe o nome", 
                minlength:"Informe ao menos 4 caracteres"},
            email:{required: "Informe o email", email:"Email inválido"},
            telefone:{required: "Informe o telefone"},
            dtnasc:{required: "Informe a data de nascimento"},
            rbsexo:{required: "Informe o sexo"},
            logradouro:{required: "Informe o logradouro"},
            numero:{required: "Informe o número"},
            cidade:{required: "Informe a cidade"},
            uf:{required: "Informe a UF"},
            cep:{required: "Informe o CEP"}
        },
    
        //Monta a mensagem em uma caixa separada
        errorLabelContainer: $("#mensagens"),
        errorElement: "li"
    });
 
   
   /*validar os campos hora - utilizando apenas a classe*/
   $(".hora").blur(function(){
       var hr = $(this).val();
       var h = hr.substring(0,2);
       var m = hr.substring(3,6);
       if(h<0 || h>23 || m < 0 || m>59){
           alert("Hora inválida");
           $(this).val("");
           return false;
       }
   });
   
    
    /*Tratar as opções selecionadas na combobox categoria e oferecer
    * as opções conforme a seleção do usuário */
    $("#cbocategoria").change(function(){       
            var categoria = $("#cbocategoria").val();            
            if (categoria === "2"){
                $("#periodo").css("display","inline"); $("#horario").hide();
            }else if (categoria === "3"){
                $("#periodo").hide(); $("#horario").show(); 
            } else{
                $("#periodo").hide(); $("#horario").hide();
            }
    });
    
    
    /*habilitar o campo horário apenas quando o checkbox extiver marcado*/
    $(".chkhorario").change(function(){
        if(this.checked){
            var marcado = 'S';
        }
        var celula = $(this).parent("td"); //celula pai do checkbox
        $(celula).siblings("td").each(function(){ //celulas irmãs do checkbox, 
            //ou seja, as que contém as horas
            $(this).children('label').each(function(){
                $(this).children('input').each(function(){
                    if(marcado){ //check marcado
                        $(this).attr("disabled", false);
                    }else{      //check desmarcado
                        $(this).val("");//limpar o campo ao desabilitar o check
                        $(this).attr("disabled", true);   
                    }
                });
            }); 
        });
    });
    
    
   $("#idform").submit(function(){
       
       //$("#idform").validate();
       /*Recuperar os dados incluídos na tabela de atividades e incluir em
        * um vetor*/
       
       var numcolunas;
       var vetatividades = []; 
       var linha = -1; //começa com -1, pois a 0 contentá a <tr> com os <th>
       
       $("#tabelativ").children().each(function(){//pegar tbody -filho1 da table
           $(this).children("tr").each(function(){ // pegar as linhas
               numcolunas  = 1;
               $(this).children("td").each(function(){ //colunas  
                    switch(numcolunas){
                        case 1: {
                                     vetatividades[linha] = "";
                                     vetatividades[linha] = vetatividades[linha]
                                             + $(this).text()+";";
                                     break;
                                } 
                        case 2: {
                                     vetatividades[linha] = vetatividades[linha]
                                             + $(this).text()+";";
                                     break;
                                }
                        case 3: {
                                     vetatividades[linha] = vetatividades[linha]
                                             + $(this).text();
                                     break;
                                }
                        default: return false;       
                    }
                    numcolunas++;
               });//colunas*/
               
               /*Gravar atividade no vetor "atividades" campo hidden do form*/
               if(linha>=0){ 
                 $("#camposhidden").append(function(){
                      return "<input type=hidden name='atividades[]' value = '"
                              +vetatividades[linha]+"'>";
                 });
               }
               linha++;
               
           });//linhas        
       }); //tbody
       
       
       /*Envio via POST com ajax - para funcionar pasta tirar o action do FORM*/
       /*
       form = document.getElementById("idform");
 
       $.ajax({
          url: "gravar.php",
          type:'POST',
          data: {nome:form.nome.value,email:form.email.value,
                 telefone:form.telefone.value,rbsexo:form.rbsexo.value,
                 dtnasc:form.dtnasc.value, logradouro:form.logradouro.value,
                 numero:form.numero.value,complemento:form.complemento.value,
                 cidade:form.cidade.value,uf:form.uf.value,cep:form.cep.value,
                 observacoes:form.observacoes.value,atividades:vetatividades},
          //O trecho abaixo é opcional
          //success:function(data){
            //$("#mensagens").html(data).css("display","none"); //Como não exibir ????????????
          //},
          //error: function(){alert("Nao enviou");}
       }); */
       //return false; //Ao colocar este false o formulário não será enviado*/
   });    
    
    
    
}); //FUNÇÃO LOAD

/*Incluir os valores na tabela de atividades*/
function incluirAtividade (){
   
        /*verificar regras do campo hora*/
        
        // Validar se a atividade foi informada        
        if($('#cboatividade :selected').val() === "0"){
            alert("Selecione uma atividade");
            return false;
        }
        // Pegar o texto da opção seelecionada na combo atividade
        var atividade = $('#cboatividade :selected').text();
                
        
        // Validar se a categoria foi informada
        if($('#cbocategoria :selected').val() === "0"){
            alert("Selecione uma categoria");
            return false;
        }else{
            var categoria = $('#cbocategoria :selected').text();
        }
        
        var horario;
        
        if($('#cbocategoria :selected').val() === "1"){ //LIVRE
            horario = "Qualquer horário";
        }else    
            if($('#cbocategoria :selected').val() === "2"){ //PERÍODO
                if($('#cboperiodo :selected').val() === "0"){
                    alert("Selecione um período");
                    return false;
                }else{
                    horario = $('#cboperiodo :selected').text();
                }
            } else{ // HORÁRIO
                
                var total_marcados = 0; 
                var numinputs;
                var erro;
                horario = "";
                //Obter os valores de todos os checkboxes selecionados                
                $(".chkhorario").each(function(){
                    if(this.checked){
                       total_marcados += 1;
                       //pegar o dia da semana
                       horario = horario + $(this).val() + "    "; 
                       //obter os campos hora ini e fim do item selecionado
                       //abaixa está pegando a celula pai do checkbox
                       var celula = $(this).parent("td"); 
                       numinputs = 1;
                       /* Abaixo está pegando as celulas irmãs do checkbox,
                        * ou seja, as que contém as horas */
                       $(celula).siblings("td").each(function(){ 
                            $(this).children('label').each(function(){
                                $(this).children('input').each(function(){
                                    if(numinputs === 1){ //data início
                                        //data início não foi informada    
                                        if($(this).val()===""){ 
                                          alert("Informe a data de início");
                                          erro = true;
                                          return false;
                                       }else{
                                          horario += $(this).val() + " - ";
                                       }
                                    }else{ //data final
                                       //data final não foi informada
                                       if($(this).val()===""){ 
                                          alert("Informe a data final"); 
                                          erro = true;
                                          return false;
                                       }else{ 
                                            horario += $(this).val() + "<br />";
                                       }
                                    }
                                    numinputs++;
                                });
                                if(erro){return false;}
                            }); 
                        if(erro){return false;}
                        });   
                    }
                    if(erro){return false;}
                });
                
                if(erro){return false;}
                
                if(total_marcados === 0){
                    alert("Selecione ao meno um horário");
                    return false;
                }    
            }
      
    
        $("#tabelativ").append(
            "<tr>"+
                "<td>"+atividade+"</td>"+
                "<td>"+categoria+"</td>"+
                "<td>"+horario+"</td>"+
                "<td><img src='img/fechar.png' class='btExcluir'></td>"+
            "</tr>");
    
        $("#ativincluidas").show();
        $(".btExcluir").bind("click", excluirAtividade);
        
        /*Limpar campos após a inclusão*/
        limparCampos("#atividades");           
        /*Esconder as divs horário e período*/
        $("#periodo").hide(); $("#horario").hide();
        
};

/*Funções Auxiliares*/

/*Excluir uma atividade da lista de atividades matriculadas*/
function excluirAtividade(){
    
    decisao = confirm("Confima a Exclusão da Atividade?");
    if(decisao){
        var linha = $(this).parent().parent();
        linha.remove();
        
        //Só restou o th ==> esconder tabela
        if($("#tabelativ tr").length === 1){ 
            $("#ativincluidas").css("display","none");
        }   
    } 
}

/*Limpar os campos dentro de uma área/div */
function limparCampos(area){
    $(area).find("input,select").each(function (){
        switch (this.type) {
            case "file":
            case "password":
            case "text":
            case "textarea":
                $(this).val(""); //usando Jquey
                break;
            case "select-one":              
                this.selectedIndex = 0; // OU   $(this).val("0");
                break;
            case "checkbox":
            case "radio":
                this.checked = false;    
        }
    });
}

/*Incluído na aula 9 - voltar para a tela que lista os resultados*/
function voltar(idpesquisa){
   //alert("dadospesquisa");
   window.location.href='Listaralunos.php?nome='+idpesquisa; 
}

        
     
    

