<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cronograma</title>
<!-- Gerador de usuário randômico
	<?php //include "./forum/random_name_generator.php" ?>-->
<link href="style.css" rel="stylesheet" type="text/css" />

<?php include 'ganalytics.php' ?>
<?php include 'forum/webgl_test.php' ?>
	
<meta name="description" content="Platnomads" />
	
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">

        
<script type="text/javascript">
    /*
Código based on: klonder
klonder@ymail.com
Post exclusivo em: www.forum.imasters.com.br
*/

//Criando um loop que irá criar multiarrays para todos os dias do ano:
var evento = new Array();
for (loopMes = 0; loopMes<=11; loopMes++) {
	evento[loopMes] = new Array();
	for (loopDia=1; loopDia<=31; loopDia++) {
		evento[loopMes][loopDia] = "";
	}
}

//----------------------- AGENDA -----------------------//
        //-------------------PUXAR DO BANCO DE DADOS
<?php
include 'forum/event_checker.php';


?>

evento[8][5] = "apresentação da plataforma e abertura da participação da comunidade APAE";
evento[8][23] = "final do período de participação comunidade APAE";
evento[8][24] = "início do período de retorno da equipe Humanizar";
evento[9][1] = "final do período de retorno da equipe Humanizar";

function calendario() {
    //-----------------------PUXAR DE OPÇÕES DADAS AO USUÁRIO
//Defina o mês que será exibido no calendário:

var pesquisaMes = document.getElementById("meses").value;
; //0:Jan; 1:Fev; 2:Mar; 3:Abr; 4:Mai; 5:Jun; 6:Jul; 7:Ago; 8:Set; 9:Out; 10:Nov; 11:Dez;

//Defina o ano:
var ano = 2019;

//Defina o dia da semana em que o ano começa:
var inicioDiaSem = 2; //0:Dom; 1:Seg; 2:Ter; 3:Qua; 4:Qui; 5:---; 6:Sáb;



//----------------------- NÃO ALTERAR -----------------------//
var pesquisaDia = 1; //Não alterar
var diasNoMes = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
//Verificando se o ano é bissexto:
diasNoMes[1] = ((ano%4 == 0)?29:28);

var pesquisaDiasTotais = 0;

for (var i = 0; i<pesquisaMes; i++) {
	pesquisaDiasTotais += diasNoMes[i];
}
pesquisaDiasTotais += pesquisaDia;
//alert(pesquisaDiasTotais);

var calculoDiaSem = ((pesquisaDiasTotais%7)+inicioDiaSem);

    //------------------- INICIANDO A CONSTRUÇÃO DO CALENDÁRIO -------------------//
var tabela = ""; //Variável que irá armazenar todas as linhas da tabela do calendário;
var iCount = 1; //Criando um contador contínuo, que servirá de referencial;

//Criando um contador para o dia do mês.
//Esse contador só iniciará quando o iCount for maior ou igual ao dia em que a semana inicia;
var iMes = 1; 

//Construindo o calendário, com 6 linhas:
tabela = "<tr><td>dom</td><td>seg</td><td>ter</td><td>qua</td><td>qui</td><td>sex</td><td>sab</td></tr>";
for (var iLinha=1; iLinha<=6; iLinha++) {
    tabela += "<tr>"; // Abrindo a linha atual;
	for(var iCol = 1; iCol<=7; iCol++) {
			//Se iCount for maior que o dia em que a semana inicia, então: iniciar iMes;
			//Após os testes, para evitar iniciar o calendário saltando uma linha, vamos elevar o valor
			//do iCount, caso o calculoDiaSem seja 7;
			if (calculoDiaSem > 7) {
				iCount = 8;
			}
			
			if (iCount >= calculoDiaSem && iMes <= diasNoMes[pesquisaMes]) {
				//Verificar se existem eventos associados ao dia atual:
				var variavel = eval("evento["+iMes+"]");
				if (evento[pesquisaMes][iMes] != "") {
					temEvento = true;
				} else {
					temEvento = false;
				}
				
				//alert(evalEvento);
				if (temEvento == true) {
					tabela += "<td><a href='javascript:verEvento("+pesquisaMes+","+iMes+")'>"+iMes+"</a></td>";
				} else {
					tabela += "<td>"+iMes+"</td>";
				}
				iMes++;
			} else {
				tabela += "<td> </td>";
			}
		iCount++;
	}
tabela += "</tr>"; // Fechando a linha atual;
}

document.getElementById("calendario").innerHTML = "<table width='200px' border='1'>"+tabela+"</table>";
}
    function verEvento(v1,v2) {
var objCalEv = document.getElementById("calendarioEventos");

objCalEv.innerHTML = evento[v1][v2];
}
window.onload = calendario;
    </script>

<!--cabeçalho-->

<div class="header-div3">
	<?php include 'header_logo.php' ?>
  <div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>
	  <div class="header-icons-left"><img src="images/calendar-100x100.png"  width="50" align="left"/></div>
	<div class="header-icons-text"><br>calendário de participação</div>
 <div class="header-icons-right"> <a href="gallery1.php"><img src="images/proposal.png"  width="48"  align="right" /></a></div>
   	
 <div class="header-icons-right"> <a href="maps.php"><img src="images/view-locations.png"  width="50"  align="right" /></a></div>
 <div class="header-icons-right"><a href="versions.php"><img src="images/versoes.PNG"  width="50"  align="right" /></a></div>
    </div>

 <!--conteúdo--> 
<div class="middle-div-sobreprojeto">
<div class="arrow-right" title="voltar para informações do projeto" style="margin-top:100px; margin-right: 10px">
<a href="infoproject.php"><img src="images/arrow_left.png" align="left"/></a>
</div>
<div class="cronograma-left">
	
       <div id="calendarioEventos">
         <p>cronograma de participação da comunidade APAE e do retorno da equipe Humanizar</p>
         <p>clique nas datas destacadas para os detalhes das ações previstas</p>
       </div>

 
    
</div>

<div class="cronograma-right" padding-right=2 padding-left=2 width=200px>
 
<!--<form method="post" action="cadastrar-enquete.php" align=right>-->
        
<table height=10px><td><label class=laranjabold for="ano">2019</label></td><td align-content=right>

<select id="meses" onchange="calendario();">
<!--<option value="0">Janeiro</option>
<option value="1">Fevereiro</option>
<option value="2">Março</option>
<option value="3">Abril</option>
<option value="4">Maio</option>
<option value="5">Junho</option>
<option value="6">Julho</option>
<option value="7">Agosto</option>-->
<option value="8">Setembro</option>
<option value="9">Outubro</option>
<option value="10">Novembro</option>
<option value="11">Dezembro</option>
    </select></td></table>      
<p> <div id="calendario"></div></p>
    </div>
   <div class="arrow-right" style="margin-top:100px">
<a href="gallery1.php"><img src="images/arrow_right_black.png" title="ir para proposta geral" align="right"/></a>
</div>

 

    </div>

<!--rodapé-->
<?php include 'footer_internal.php' ?>

    </body>
</html>