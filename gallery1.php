<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link  href="fotorama/fotorama.css" rel="stylesheet">
<script src="fotorama/fotorama.js"></script>
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php' ?>
<?php include 'forum/webgl_test.php' ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sombreamento</title>

	
<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="description" content="Platnomads" />
    
<!--shadowbox-->

    <link rel="stylesheet" type="text/css" href="lightbox/lightbox.min.css">
    <script src="lightbox/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript">
    Shadowbox.init();
    </script>

<!--shadowboxEND-->
    
    
    
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">

<!--cabeçalho-->

<div class="header-div4">
  <?php include 'header_logo.php' ?>
  <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>
  <div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png"  width="50" align="left"/></a></div>
     <div class="header-icons-left"> <a href="gallery1.php"><img src="images/circulo s.png"  width="48"  align="right" /></a></div>
    <div class="header-icons-text"><br>sombreamento</div>
    <div class="header-icons-right"> <a href="gallery2.php"><img src="images/circulo e.png"  width="48"  align="right" /></a></div>  
 <div class="header-icons-right"> <a href="maps.php"><img src="images/view-locations.png"  width="50"  align="right" /></a></div>
 <div class="header-icons-right"><a href="versions.php"><img src="images/versoes.PNG"  width="50"  align="right" /></a></div>
    </div>

 <!--conteúdo--> 

<!--galeria-->
<div class="middle-div-index">
  <div class="arrow-right" style="margin-top:20px; margin-right: 10px">
<a href="calendar.php"><img src="images/arrow_left.png" title="voltar para calendário" align="left"/></a>
</div>

<div class="gallery"> 
  <section>
    <a href="images/insol/cinza_piramides.png" data-lightbox="mygallery" data-title="simulações de insolação pirâmides"><img src="images/insol/cinza_piramides_thumbs.png"></a>
  	<a href="images/insol/cinza_voronoi.png" data-lightbox="mygallery" data-title="simulações de insolação voronoi"><img src="images/insol/cinza_voronoi_thumbs.png"></a>
  	<a href="images/insol/cinza_boxes.png" data-lightbox="mygallery" data-title="simulações de insolação boxes"><img src="images/insol/cinza_boxes_thumbs.png"></a>
      </section>
</div>


<div class="arrow-right">
<a href="gallery2.php"><img src="images/arrow_right_black.png" title="ir para escala" align="right"/></a>
</div>
</div>


<!--rodapé-->
<?php include 'footer_internal.php' ?>

</html>