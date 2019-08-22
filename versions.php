<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php' ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>proteções</title>
	
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="description" content="Platnomads" />
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">


<!--cabeçalho-->
	
<div class="header-div6">
	<?php include 'header_logo.php' ?>
    <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>
  <div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png"  width="50" align="left"/></a></div>
     <div class="header-icons-left"> <a href="gallery1.php"><img src="images/circulo s.png"  width="48"  align="right" /></a></div>
        <div class="header-icons-left"> <a href="gallery2.php"><img src="images/circulo e.png"  width="48"  align="right" /></a></div> 
   <div class="header-icons-left"><a href="maps.php"><img src="images/view-locations.png"  width="50"  align="left" /></a></div>
   <div class="header-icons-left"><img src="images/versoes.PNG"  width="50"  align="right" /></a></div>
   <div class="header-icons-text"><br>proteções</div>

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
	<p></p>
	<div class="arrow-right" style="margin-top:20px; margin-right: 10px">
<a href="maps.php"><img src="images/arrow_left.png" align="left"/></a>
</div>
 <span><a href="main1.php" class="darken"><img src="images/quadrado triangulos.png" width="100" height="100" float="left"><span class="mouseover-text"><br><br>proteção formada a partir de módulos triangulares.</span></span></a></a>
		
<span><a href="main2.php" class="darken"><img src="images/quadrado voronoi.png" width="100" height="100" float="left"/><span class="mouseover-text"><br><br>proteção formada através de caixas vaazadas.</span></span></a>
		
<span><a href="main3.php" class="darken"><img src="images/quadrado quadrados.png" width="100" height="100" float="left"/><span class="mouseover-text"><br><br>proteção formada através de aberturas variáveis</span></span></a>
<div class="arrow-right">
<a href="main1.php"><img src="images/arrow_right_black.png" align="left"/></a>
</div>
</div>
 	
	<!--icones características
<div class="middle-div-projects-icons">
 <span class="icon-projects">VERSÃO1</span><span class="icon-projects">VERSÃO2</span><span class="icon-projects">VERSÃO3</span>-->

</div>
<!--	
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
</div>-->
</div>


<!--rodapé-->
<?php include 'footer_internal.php' ?>

</html>
</body>