<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php include_once 'headPagina.php' ?>  <!-- ** Incluído na AULA-5 **-->
        
        <!-- *************   PÁGINA ELABORADA NA AULA-3 ***************-->
</head>
<body>
	
    <div id="container">
    
    	<!-- Incluir o arquivo que contem as definições do topo e do banner -->
        <?php include_once 'topoBannerPagina.php' ?>
        
        <div id="conteudo">
        <!-- #### AULA-3 ####  -->
			<table> 
    			<tr>
        			<td id = "td1" colspan = "3" align="center"><h3>Turmas</h3></td>       
				</tr>

		        <tr> <!-- TAG para criar uma linha -->
		        	<th width="30%"> Atividade </th> <!-- <th> TAG para criar um cabeçalho da tabela-->  
		           	<th width="50%"> Horário </th>
		            <th width "20%"> Professor </th>
        		</tr>

     			<tr>
                    <td rowspan="3"> Body Pump </td>
                    <td>terça e quinta - 20:15-21:15</td>
                    <td>Ana Lucia</td>
        		</tr>   
    
     			<tr>
                    <td>terça e quinta - 07:00-08:00</td>
                    <td>Henrique Freitas</td>
		        </tr>   
        
     			<tr>
                    <td>segunda e quarta - 18:30-19:30</td>
                    <td>Daniele Ventura</td>
		        </tr>
                
                <tr>
					<td rowspan="2"> Ginástica Localizada </td>
                    <td>sexta - 10:30-11:30</td>
                    <td>Daniele Ventura</td>
		        </tr>
                
               	<tr>
                    <td>segunda e quarta - 20:30-21:30</td>
                    <td>Ana Lucia </td>
		        </tr>
                
                <tr>
					<td rowspan="4">Abdominal</td>
                    <td>segunda e quarta - 20:30-21:30</td>
                    <td>Franco Lopes</td>
		        </tr>
                
                <tr>
                    <td>segunda - 10:30-11:30</td>
                    <td>Ana Lucia</td>
		        </tr>

                <tr>
                    <td>segunda e quarta - 8:30-9:30</td>
                    <td>Fernando Solto</td>
		        </tr>
                
                <tr>
                    <td>segunda e quarta - 18:30-19:30</td>
                    <td>Péricles</td>
		        </tr>

                
    </table>    



        </div>
        
    
    	<div id="rodape">
        </div>
    </div>
    
</body>
</html>