/*Funções Java Script para o formulário*/


/* Tratar as opções selecionadas na combobox categoria e oferecer as opções 
 * conforme a seleção do usuário */ /* Aula - 5 */
function verificaPeriodo(){  
    var categoria = document.getElementById("cbocategoria");
    /* v - poderia também receber ditetamente o value 
            var v = document.getElementById("cbocategoria").value;
       Neste caso, o teste deveria ser v.value para sabe o valor do campo
     */
    if (categoria.value === "2"){
        document.getElementById("periodo").style.display = "inline";
        document.getElementById("horario").style.display = "none";
        
    }else if (categoria.value === "3"){
        document.getElementById("horario").style.display = "block";
        document.getElementById("periodo").style.display = "none";
    } else{
        document.getElementById("periodo").style.display = "none";
        document.getElementById("horario").style.display = "none";
    }
}  


/* Validar campos obrigatórios do form foram informados */ /* Aula - 5 */
function validarCamposObrigatorios(form){
    
   /* if(document.getElementById("idnome").value === ""){
        alert("Informe o nome");
    }
    
    OU COMO ABAIXO
     */  
    
    if (form.nome.value === ""){
        alert("Informe o nome");
        form.nome.focus();
    }else
    if (form.email.value === ""){
        alert("Informe o email");
    }else    
    if (form.telefone.value === ""){
        alert("Informe o telefone");
    }
    else
    if (!form.rbsexo[0].checked && !form.rbsexo[1].checked){
        alert("Informe o sexo");
    }
    else
    if (form.dtnasc.value === ""){
        alert("Informe a data de nascimento");
    }
    else
    if (form.logradouro.value === ""){
        alert("Informe o endereço");
    }
    else
    if (form.numero.value === ""){
        alert("Informe o número");
    }
    else
    if (form.cidade.value === ""){
        alert("Informe a cidade");
    }
    else if(form.uf.selectedIndex === 0){
        alert("Informe a UN");
    }
    else
    if (form.cep.value === ""){
        alert("Informe a CEP");
    }

    return false;

}

/* Mascara CEP */ /* Aula - 6 */
function mascaraCep(cep){
        if(mascaraInteiro(cep)===false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00.000-000', event);
}

/* Máscara Telefone */ /* Aula - 6 */
function mascaraTelefone(tel){  
        if(mascaraInteiro(tel)===false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

/* Máscara Data */ /* Aula - 6 */
function mascaraData(data){ 
        if(mascaraInteiro(data)===false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

/* Máscara Hora */ /* Aula - 6 */
function mascaraHora(hora){
        if(mascaraInteiro(hora)===false){
                event.returnValue = false;
        }       
        return formataCampo(hora, '00:00', event);
}

/* Validar Hora */ /* Aula - 6 */
function validarHora(hora){
    exp = /\d{1,2}\:\d{2}/;
    if(exp.test(hora.value)){
        var h = hora.value.substring(0,2);
        var m = hora.value.substring(3,5);
        if((h<0)||(h>23)||(m<0)||(m>59)){
            alert('Hora Invalida');
        }         
    }else{
        alert('Hora Invalida');
    }   
}

/* Validar o campo CEP, conforme a expressão regular definida */ /* Aula - 5 */
function validarCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/;
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido');               
}


/*Validar o campo telefone, usando a expressão regular definida *//* Aula - 5 */
function validarTelefone(tel){
        exp = /\(\d{2}\)\ \d{4,5}\-\d{4}/;
        /* o método exec retorna o valor pesquisado
         * o test retorna true ou false*/
        if(!exp.test(tel.value)){
                tel.value = "";
                alert('Numero de Telefone Invalido!');
        }
}


/* Validar o campo data, conforme a expressão regular definida */ /* Aula - 5 */
function validarData(data){
        //alert('Data Invalida!'); 
        exp = /\d{2}\/\d{2}\/\d{4}/;
        /*     \/ – Uma barra literal  */
        if(exp.test(data.value)){
            var dia = data.value.substring(0,2);
            var mes = data.value.substring(3,5);
            var ano = data.value.substring(6,10);
            
            if((dia < 1) || (dia > 31)){
                alert('Data Invalida!');
            }else if((mes < 1) || (mes>12)){
                alert('Data Invalida!');
            }else if(ano<=1900){
                alert('Data Invalida!');
            }                  
        }
        else{
            data.value ="";
            alert('Data Invalida!');
        }       
}

/* Validar o campo e-mail, conforme a expressão regular definida */ /* Aula - 5 */
function validarEmail(email){

    /*A expressão regular abaixo veio da especificação do HTML5*/
    var filtro = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    /*
     * Explicação da expressão regular
     * 
     * 
     * outras expressões: 
     * [_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+).(\.[a-z]{2,3})$
     * ^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$
     *
     * (+) Casa o elemento precedente uma ou mais vezes. Por exemplo, ba+ casa
     *  "ba", "baa", "baaa", e assim por diante.
     * (\) Escape - anula o significado especial do metacaractere seguinte;
     * por exemplo, \. representa apenas um ponto.
     * (^) Casa o começo da cadeia de caracteres. Numa situação de múltiplas
     * linhas, casa o começo das linhas.
     * Logo percebe-se que as âncoras não casam pedaços do texto, elas servem 
     * apenas como uma referência.
     * ($) Casa o fim da cadeia de caracteres ou a posição logo antes da quebra
     * de linha do fim da cadeia.
     * Numa situação de múltiplas linhas, casa o fim das linhas.
     * (*) Coincidência dos caracteres precedidos ZERO ou mais vezes.  
     *   */
    
    if(filtro.test(email.value)) {
        return true;
    } else {
        email.value = "";
        return alert("E-mail inválido");
    }
    
}

/* Validar se um campo é numérico */ /* Aula - 6 */
function mascaraInteiro(){
        //veja a tabela de códigos ASCII
        if (event.keyCode < 48 || event.keyCode > 57){ 
                event.returnValue = false;
                return false;
        }
        return true;
}

/* Formatar a máscara de um campo para ser exibido a cada 
 * tecla pressionada */ /* Aula - 6 */
function formataCampo(campo, mascara, evento) { 
        var booleanoMascara; 

        var digitado = evento.keyCode;
        exp = /\:|\-|\.|\/|\(|\)| /g; //Verifica toda a string (global). 
        // OBS: No espaço antes da / final - usado na máscara de telefone
        
        /* pegar a expressão e removar os caracteres / ( : , etc ... 
         * de modo que fique só número */
        campoSoNumeros = campo.value.toString().replace(exp,""); 
         
        var posicaoCampo = 0; //indice para percorrer o campoSoNumeros
        var novoValorCampo="";
        var tamanhoMascara = campoSoNumeros.length;; 

        if (digitado !== 8) { // 8 é o ASCII do backspace 
                for(i=0; i<= tamanhoMascara; i++) { // pecorre a máscara
                        booleanoMascara  = ((mascara.charAt(i) === "-") ||
                                            (mascara.charAt(i) === ".") ||
                                            (mascara.charAt(i) === "/") ||
                                            (mascara.charAt(i) === "(") ||
                                            (mascara.charAt(i) === ")") ||
                                            (mascara.charAt(i) === " ") ||
                                            (mascara.charAt(i) === ":")); 
                        
                        /* Se o caracter avaliado na máscara é um dos listados
                         * acima*/
                        if (booleanoMascara) { 
                                novoValorCampo += mascara.charAt(i); 
                                /* o incremento a seguir aumenta o tamanho da 
                                 * máscara, pois agora incluiu-se um dos 
                                 * caracteres listados acima*/
                                tamanhoMascara++; 
                        }else { /* Se o caracter avaliado na máscara
                             *  for um número (neste caso o 0) */
                           novoValorCampo +=campoSoNumeros.charAt(posicaoCampo); 
                           posicaoCampo++; 
                        }              
                  }
                  campo.value = novoValorCampo; //colocar o novo valor no campo
                  return true; 
        }else { 
                return true; 
        }
}


/* Limpar os campos dentro de uma área/div */ /* Aula - 5 */
function limparCampos(area){
 
    //elem = document.getElementById(div).firstChild;
   // alert(elem.id);
   /*pegar todos os elementos (neste caso campos) dentro de uma área informada*/
    var elementos = document.getElementById(area).querySelectorAll('*');
    for(var i = 0; i<elementos.length;i++){  
        switch (elementos[i].type) {
               case "text":
               case "textarea":
               case "password":
                    elementos[i].value="";
                    break;
               case "select-one":
                    elementos[i].selectedIndex = 0;
                    break;
               case "radio":
               case "checkbox":
                    elementos[i].checked = false;
               break;
        }
    }   
}

/* Habilitar os campos de hora após o click no checkbox */ /* Aula - 6 */
function habilitarHora(meucheck){
    
    
        var meuform = document.getElementById("idform");
        switch(meucheck.value){
            case "Seg":
                if (meucheck.checked){
                    meuform.ihoraSeg.disabled = false;
                    meuform.fhoraSeg.disabled = false;
                }else{
                    meuform.ihoraSeg.disabled = true;
                    meuform.fhoraSeg.disabled = true;
                }
                break;
                
            case "Ter":
                if (meucheck.checked){
                    meuform.ihoraTer.disabled = false;
                    meuform.fhoraTer.disabled = false;
                }else{
                    meuform.ihoraTer.disabled = true;
                    meuform.fhoraTer.disabled = true;
                }
                break;       
                
            case "Qua":
                if (meucheck.checked){
                    meuform.ihoraQua.disabled = false;
                    meuform.fhoraQua.disabled = false;
                }else{
                    meuform.ihoraQua.disabled = true;
                    meuform.fhoraQua.disabled = true;
                }
                break;
                
            case "Qui":
                if (meucheck.checked){
                    meuform.ihoraQui.disabled = false;
                    meuform.fhoraQui.disabled = false;
                }else{
                    meuform.ihoraQui.disabled = true;
                    meuform.fhoraQui.disabled = true;
                }
                break;
            
            case "Sex":
                if (meucheck.checked){
                    meuform.ihoraSex.disabled = false;
                    meuform.fhoraSex.disabled = false;
                }else{
                    meuform.ihoraSex.disabled = true;
                    meuform.fhoraSex.disabled = true;
                }
                break;
                
            case "Sab":
                if (meucheck.checked){
                    meuform.ihoraSab.disabled = false;
                    meuform.fhoraSab.disabled = false;
                }else{
                    meuform.ihoraSab.disabled = true;
                    meuform.fhoraSab.disabled = true;
                }
                break;
            
            case "Dom":
                if (meucheck.checked){
                    meuform.ihoraDom.disabled = false;
                    meuform.fhoraDom.disabled = false;
                }else{
                    meuform.ihoraDom.disabled = true;
                    meuform.fhoraDom.disabled = true;
                }
                break;
        
    }
    
}

//Variável global que guarda o total de atividades incluídas
totalAtividades = 0;

/* Incluir uma atividade na tabela de atividades: atividade, categoria 
 * e horário */ /* Aula - 6 */
function incluirAtividade(){
   
    form = document.getElementById("idform");
    
    /* Validar se o usuário selecionou uma atividade */
    var atividade = document.getElementById("cboatividade").value;
    if(atividade === "0"){
        alert("Informe uma atividade");
        return false;
    }    
        
    var categoria = document.getElementById("cbocategoria").value;
    
    /*Validar se o usuário selecionou uma categoria*/
    if(categoria === "0"){
        alert("Informe uma categoria");
        return false;
    }
    
    /*Validar se o usuário selecionou um período*/
    if(categoria === "2"){
        var periodo = document.getElementById("cboperiodo").value;
        if(periodo === "0"){
            alert("Informe um periodo");
            return false;
        }   
    }
    
   /*As validações dentro deste if são feitas apenas quando o usuário selecionou
    * a opção da categoria "horário" ==> opção 3*/
    if(categoria === "3"){
        
        /*Validar se ao menos um horário foi escolhido*/        
        var chkhorario = document.getElementsByClassName("chkhorario");
        /* percorrer todos os elementos para verificar quais estão marcados
         * e validar horas dos marcados */
        
        var selecionados = 0;
        for(var i = 0; i<chkhorario.length;i++){
            if(chkhorario[i].checked){
                     
                selecionados +=1;
                var horaini = chkhorario[i].value;   
                    horaini = "ihora"+horaini;
                var horafim = chkhorario[i].value;   
                    horafim = "fhora"+horafim;                
                
                /*OBS: faz diferente entre maiuscula e minuscula.
                 * Portanto, deve estar igual ao name do campo no html*/
                var cxhoraini = document.getElementsByName(horaini); 
                
                /*Abaixo teve que usar cxhoraini[0] pois o getElementsByName
                 * retorna um vetor*/              
                if(cxhoraini[0].value === ""){
                    alert("Infome a hora de início da "+chkhorario[i].value);
                    cxhoraini.focus();
                    return false;
                }
                
                var cxhorafim = document.getElementsByName(horafim);
                if(cxhorafim[0].value === ""){
                    alert("Infome a hora final da "+chkhorario[i].value);
                    cxhoraini.focus();
                    return false;
                }
                
            }
        }
        /* Ao sair do for - se nenhum item estiver checked ==>
         *  exibir msg de erro*/
        if(selecionados === 0){ 
            alert("Selecione ao menos um horário");
            return false;
        }
        
        //alert(chkhorario.length);  
        
    }
    
    // Captura a referência da tabela com id “tabelativ”
    var table = document.getElementById("tabelativ");
    // Captura a quantidade de linhas já existentes na tabela
    var numLinhas = table.rows.length;
    // Captura a quantidade de colunas da última linha da tabela
    var numCols = table.rows[numLinhas-1].cells.length;
    // Insere uma linha no fim da tabela.
    var novaLinha = table.insertRow(numLinhas);
    // Faz um loop para criar as colunas
    for (var j = 0; j < numCols; j++) {
        
        
        // Insere uma coluna na nova linha 
        novaCelula = novaLinha.insertCell(j);
        // Insere um conteúdo na coluna
        
        if(j===0){ //primeira coluna (atividade)
            var cbo = document.getElementById("cboatividade");
            var atividade = cbo.options[cbo.selectedIndex].text;
            novaCelula.innerHTML =  atividade;
        }
        else
        if (j===1){ //segunda coluna (categoria)
            var cbo = document.getElementById("cbocategoria");
            var plano = cbo.options[cbo.selectedIndex].text;
            novaCelula.innerHTML =  plano;
        }
        else
        if (j===2) { //terceira coluna (horários)
            
            var cbo = document.getElementById("cbocategoria");
            var plano = cbo.options[cbo.selectedIndex].value;
            
            /* Tratar o plano Livre */
            if (plano === "1"){ /*Periodo*/
                novaCelula.innerHTML =  "Qualquer horário";
            
            }else if (plano === "2"){  /* Tratar o plano por período */
               var cboper = document.getElementById("cboperiodo");
               novaCelula.innerHTML = cboper.options[cboper.selectedIndex].text;
                
            }
            else{ /* Tratar o plano por horário */
            var horarios = "";
                for(var i=0;i<7;i++){

                    op = form.chkh[i];
                    if (op.checked){                 
                      horarios = horarios + op.value;
                      // USAR UM CASE PARA RECUPERAR OS CAMPOS DE DATA E HORA
                      switch (op.value) {
                            case "Seg":
                                horarios = horarios + "  " +
                                        form.ihoraSeg.value + 
                                        " a " + form.fhoraSeg.value;
                                break;
                            case "Ter":
                                horarios = horarios + "  " +
                                        form.ihoraTer.value +
                                        " a " + form.fhoraTer.value;
                                break;
                            case "Qua":
                                alert(op);
                                horarios = horarios + "  " +
                                        form.ihoraQua.value +
                                        " a " + form.fhoraQua.value; 
                                break;
                            case "Qui":
                                horarios = horarios + "  " +
                                        form.ihoraQui.value +
                                        " a " + form.fhoraQui.value;
                                break;
                            case "Sex":
                                horarios = horarios + "  " +
                                        form.ihoraSex.value +
                                        " a " + form.fhoraSex.value;
                                break;
                            case "Sab":
                                horarios = horarios + "  " +
                                        form.ihoraSab.value +
                                        " a " + form.fhoraSab.value;
                                break;
                            case "Dom":
                                horarios = horarios + "  " +
                                        form.ihoraDom.value +
                                        " a " + form.fhoraDom.value;
                                break;
                      }
                      horarios = horarios + "<br />";
                    }    
                }
                novaCelula.innerHTML =  horarios;    
            }     
        }
        else{ //quarta coluna (botão excluir
            var botaoExcluir = '<img src="img/fechar.png" alt="Excluir Atividades" onclick="excluirAtividade(this)" />'
            novaCelula.innerHTML =  botaoExcluir;    
        }
        /*motrar a div atividades incluída, onde a table está incluída*/
        document.getElementById("ativincluidas").style.display = "block";    
    
    }
    
    /*Ocultar a div Horario*/
    document.getElementById("horario").style.display = "none"; 
    /*Ocultar a div Periodo*/
    document.getElementById("periodo").style.display = "none"; 
    
    /*limpar campos dentro da área do fieldset "atividades"*/
    totalAtividades++;
    limparCampos("atividades");
    

}

/* Excluir uma atividade da tabela de atividades */ /* Aula - 6 */
function excluirAtividade(ativ){
     
    //Exibir uma caixa de confirmação 
    decisao = confirm("Confima a Exclusão da Atividade?");
    
    if (decisao){
        //Capturamos a referência da TR (linha) pai da imagem do "botão" excluir
        // Ou seja a linha onde o mesmo está inserido
        var objTR = ativ.parentNode.parentNode;
        // Capturamos a referência da TABLE (tabela) pai da linha
        var objTable = objTR.parentNode;
        // Capturamos o índice da linha
        var indexTR = objTR.rowIndex;
        /* Chamamos o método de remoção de linha nativo do JavaScript,
         *  passando como parâmetro o índice da linha  */
        objTable.deleteRow(indexTR);
        // Exibe uma mensagem de confirmação da remoção

        /*A a vairável a seguir é global e é incrementada na função incluir
         * atividade*/
        totalAtividades--; 
        if(totalAtividades === 0){
            document.getElementById("ativincluidas").style.display = "none";  
        }
    }
}
