<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   
    <?php include_once 'headPagina.php' ?> <!-- ** Incluído na AULA-5 **-->
    
    
    <!-- ***********************  SCRIPT FECHAR O POP UP ******************************* -->
    <script type="text/javascript">
		function fechar(){
			/*chamar o CSS através de script. Ou seja, mudar o estilo dinamicamente*/
			
			/*Fechar a div popup*/
			document.getElementById('popup').style.display="none";
			/*Fechar a div total*/
			document.getElementById('total').style.display="none";	
		
		}	
	</script>
    <!-- ******************************************************************************* -->     
    
</head>
<body>

    <div id="total">
    
    
    
    
    </div>
	
    <div id="container">
    
    	<!-- Incluir o arquivo que contem as definições do topo e do banner -->
        <?php include_once 'topoBannerPagina.php' ?>
        
        <div id="conteudo">
        	<img src="img/mulher2.jpg" alt="Imagem Mulher" class="imgleft" />
            <h1 class="citacao"> “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum bibendum lorem, ac sodales dolor mattis at. Quisque sit amet adipiscing erat.” 
            </h1>
            
        </div>
        
        <div id="box1">
        	<h3>Musculação</h3>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum bibendum lorem, ac sodales dolor mattis at. Quisque sit amet adipiscing erat.</p> 

			<p>Quisque dapibus vehicula magna at vulputate. Phasellus sit amet tincidunt tortor, id tincidunt nibh. Etiam luctus tincidunt augue, et laoreet ipsum sollicitudin eget.</p> 
        </div>

        
        <div id="box2">
           	<h3>Spinning</h3>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum bibendum lorem, ac sodales dolor mattis at. Quisque sit amet adipiscing erat.</p> 

			<p>Quisque dapibus vehicula magna at vulputate. Phasellus sit amet tincidunt tortor, id tincidunt nibh. Etiam luctus tincidunt augue, et laoreet ipsum sollicitudin eget.</p> 
        </div>

        
        <div id="box3">
           	<h3>Ginástica</h3>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum bibendum lorem, ac sodales dolor mattis at. Quisque sit amet adipiscing erat.</p> 

			<p>Quisque dapibus vehicula magna at vulputate. Phasellus sit amet tincidunt tortor, id tincidunt nibh. Etiam luctus tincidunt augue, et laoreet ipsum sollicitudin eget.</p> 

        </div>
    
    	<div id="rodape">
        </div>
    </div>
    
   	    
    <!-- "popup" não bloqueavel -->
    <div id="popup">
	    <a href="#" onclick="fechar()">
    		<img src="img/fechar.png" class="btnfechar" />
    	</a>  

		<a href="#">
        	<img src="img/popup.jpg" alt="Popup" />
        </a>        
    
    </div>



</body>
</html>
