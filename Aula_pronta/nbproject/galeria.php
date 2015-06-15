<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACADEMIA ELLOS</title> 			<!-- AULA-2 -->
	
    <?php include_once 'headPagina.php' ?>  <!-- ** Incluído na AULA-5 **-->

    <!-- *************   PÁGINA ELABORADA NA AULA-3 ***************-->
    
    <!-- ***********************  SHADOWBOX ********************************* -->
    <!--  AULA 3   -->
    <!--  LINK para o CSS do Shadowbox   -->
	<link rel="stylesheet" type="text/css" href="shadowbox/shadowbox.css">
	
	
	<!--  LINK para o Java Script do Shadowbox   -->
	<script type="text/javascript" src="shadowbox/shadowbox.js"></script>

	<script type="text/javascript">
		Shadowbox.init();
	</script>
    <!-- ******************************************************************************* -->    
    
    
</head>
<body>
	
    <div id="container">
    
    	<!-- Incluir o arquivo que contem as definições do topo e do banner -->
        <?php include_once 'topoBannerPagina.php' ?>
        
        <div id="conteudo">
        
        	<!-- #################################### AULA 3 ################################-->
		    <h3> Galeria de Fotos </h3>
            <br /> <br />
	
            <!-- Este colchetes [ellos] permitir montar uma galeria, o que permite navegar pelas fotos-->
            <div class="caixa"> <a href="fotos/1.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/1.jpg" /></a> </div>         
            <div class="caixa"> <a href="fotos/2.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/2.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/3.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/3.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/4.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/4.jpg" /></a>  </div>  
            <div class="caixa"> <a href="fotos/5.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/5.jpg" /></a>  </div>
            
            <div class="caixa"> <a href="fotos/6.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/6.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/7.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/7.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/8.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/8.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/9.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/9.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/10.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/10.jpg" /></a>  </div>  
            <div class="caixa"> <a href="fotos/11.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/11.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/12.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/12.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/13.jpg" rel="shadowbox[ellos]" title="Academia Ellos"><img src="fotos/miniaturas/13.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/14.jpg" rel="shadowbox[riodejaneiro]" title="Rio de Janeiro"><img src="fotos/miniaturas/14.jpg" /></a>  </div>
            <div class="caixa"> <a href="fotos/15.jpg" rel="shadowbox[riodejaneiro]" title="Rio de Janeiro"><img src="fotos/miniaturas/15.jpg" /></a>  </div>  
       		<!-- ######################################################################-->
        
        </div>
        
    
    	<div id="rodape">
        </div>
    </div>
    
</body>
</html>