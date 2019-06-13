<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Versões</title>
	
	<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/manifest.json">
<meta name="msapplication-TileColor" content="#ff0000">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ff0000">
	
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="description" content="Platnomads" />
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">


<!--cabeçalho-->
	
<div class="header-div2">
  <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" height="50" float="left"/></a></div>
  <div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png" alt="" width="50" height="50" float="left"/></a></div>
 <div class="header-icons-left"> <a href="gallery.php"><img src="images/view-images-48x48.png" alt="" width="50" float="left" /></a></div>
 <div class="header-icons-left"><img src="images/versoes.PNG" alt="" width="50" height="50" float="left" /></a></div>
<div class="header-icons-center"><p><br><br>acesso às versões</p></div>
</div>
 <!--conteúdo-->
	<!--icones versões-->
	
	<!--scriptmouseover-->
	<script type="text/javascript">
	$('.darken').hover(
    function(){
       $(this).find('.mouseover-text').fadeIn(1000); 
    },
    function(){
       $(this).find('.mouseover-text').fadeOut(1000); 
    }
    );
</script>
<script>
    
//Verifies if WebGL is supported and passes it to the main pages
 
var canvas = document.createElement('canvas');
var webglContextParams = ['webgl', 'experimental-webgl', 'webkit-3d', 'moz-webgl'];
var webglContext = null;
for (var index = 0; index < webglContextParams.length; index++) {
	try {
		webglContext = canvas.getContext(webglContextParams[index]);
		if(webglContext) {
			//breaking as we got our context
			break;
		}
	} catch (E) {
		console.log(E);
	}
}
if(webglContext === null) {
	document.cookie="webgl=0";
} else {
	document.cookie="webgl=1";
}
</script>
	
	
	
<div class="middle-div-projects">
 <span><a href="main1.php" class="darken"><img src="images/versao1.png" width="100" height="100" float="left"/><span class="mouseover-text"><br>versão com praça externa, maior área verde e espaços de convivência</span></span></a>
		
<span><a href="main2.php" class="darken"><img src="images/versao2.png" width="100" height="100" float="left"/><span class="mouseover-text"><br><br>versão maior área construída e espaços diversos</span></span></a>
		
<span><a href="main3.php" class="darken"><img src="images/versao3_225x225.png" width="100" height="100" float="left"/><span class="mouseover-text"><br><br>versão com maior áre a de estacionamento e menor espaço interno</span></span></a>
</div>
 	
	<!--icones características-->
<div class="middle-div-projects-icons">
 <span class="icon-projects">VERSÃO1</span><span class="icon-projects">VERSÃO2</span><span class="icon-projects">VERSÃO3</span>
</div>
	
<div class="middle-div-projects-icons">
 <span class="icon-projects"><i class="fas fa-sun"></i><i class="fas fa-sun"></i></span><span class="icon-projects"><i class="fas fa-sun"></i><i class="fas fa-sun"></i><i class="fas fa-sun"></i></span><span class="icon-projects"><i class="fas fa-sun"></i></span>
</div>
 
	<div class="middle-div-projects-icons">
 <span class="icon-projects darken"><i class="fas fa-dollar-sign"></i></span><span class="icon-projects"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i></span><span class="icon-projects"><i class="fas fa-dollar-sign"></i></i></span></div>

<div class="middle-div-projects-icons">
 <span class="icon-projects darken"><i class="fas fa-wrench"></i></span><span class="icon-projects"><i class="fas fa-wrench"></i><i class="fas fa-wrench"></i><i class="fas fa-wrench"></i></span><span class="icon-projects"><i class="fas fa-wrench"></i><i class="fas fa-wrench"></i></span></div>

 <div class="middle-div-projects-icons"></div>
	
	

	<div class="middle-div-projects-icons">
<br><span class="icon-projects paragraph"><i class="fas fa-sun"></i>= melhor conforto térmico</span><span class="icon-projects paragraph"><i class="fas fa-dollar-sign"></i>= maior custo de construção</span><span class="icon-projects paragraph"><i class="fas fa-wrench"></i> = maior custo de manutenção</span>
</div>
</div>


<!--rodapé-->
<?php include 'footer_internal.php' ?>

</html>
</body>