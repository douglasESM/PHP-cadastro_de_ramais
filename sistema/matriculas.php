<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['login'];
?>
  <head>
  <script language='Javascript'>
 
// construindo o calendário
function popdate(obj,div,tam,ddd)
{
    if (ddd) 
    {
        day = ""
        mmonth = ""
        ano = ""
        c = 1
        char = ""
        for (s=0;s<parseInt(ddd.length);s++)
        {
            char = ddd.substr(s,1)
            if (char == "/") 
            {
                c++; 
                s++; 
                char = ddd.substr(s,1);
            }
            if (c==1) day    += char
            if (c==2) mmonth += char
            if (c==3) ano    += char
        }
        ddd = mmonth + "/" + day + "/" + ano
    }
  
    if(!ddd) {today = new Date()} else {today = new Date(ddd)}
    date_Form = eval (obj)
    if (date_Form.value == "") { date_Form = new Date()} else {date_Form = new Date(date_Form.value)}
  
    ano = today.getFullYear();
    mmonth = today.getMonth ();
    day = today.toString ().substr (8,2)
  
    umonth = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")
    days_Feb = (!(ano % 4) ? 29 : 28)
    days = new Array (31, days_Feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)
 
    if ((mmonth < 0) || (mmonth > 11))  alert(mmonth)
    if ((mmonth - 1) == -1) {month_prior = 11; year_prior = ano - 1} else {month_prior = mmonth - 1; year_prior = ano}
    if ((mmonth + 1) == 12) {month_next  = 0;  year_next  = ano + 1} else {month_next  = mmonth + 1; year_next  = ano}
    txt  = "<table bgcolor='#efefff' style='border:solid #330099; border-width:2' cellspacing='0' cellpadding='3' border='0' width='"+tam+"' height='"+tam*1.1 +"'>"
    txt += "<tr bgcolor='#FFFFFF'><td colspan='7' align='center'><table border='0' cellpadding='0' width='100%' bgcolor='#FFFFFF'><tr>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano-1).toString())+"') class='Cabecalho_Calendario' title='Ano Anterior'><<</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_prior+1).toString() + "/" + year_prior.toString())+"') class='Cabecalho_Calendario' title='Mês Anterior'><</a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_next+1).toString()  + "/" + year_next.toString())+"') class='Cabecalho_Calendario' title='Próximo Mês'>></a></td>"
    txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano+1).toString())+"') class='Cabecalho_Calendario' title='Próximo Ano'>>></a></td>"
    txt += "<td width=20% align=right><a href=javascript:force_close('"+div+"') class='Cabecalho_Calendario' title='Fechar Calendário'><b>X</b></a></td></tr></table></td></tr>"
    txt += "<tr><td colspan='7' align='right' bgcolor='#ccccff' class='mes'><a href=javascript:pop_year('"+obj+"','"+div+"','"+tam+"','" + (mmonth+1) + "') class='mes'>" + ano.toString() + "</a>"
    txt += " <a href=javascript:pop_month('"+obj+"','"+div+"','"+tam+"','" + ano + "') class='mes'>" + umonth[mmonth] + "</a> <div id='popd' style='position:absolute'></div></td></tr>"
    txt += "<tr bgcolor='#669900'><td width='14%' class='dia' align=center><b>Dom</b></td><td width='14%' class='dia' align=center><b>Seg</b></td><td width='14%' class='dia' align=center><b>Ter</b></td><td width='14%' class='dia' align=center><b>Qua</b></td><td width='14%' class='dia' align=center><b>Qui</b></td><td width='14%' class='dia' align=center><b>Sex<b></td><td width='14%' class='dia' align=center><b>Sab</b></td></tr>"
    today1 = new Date((mmonth+1).toString() +"/01/"+ano.toString());
    diainicio = today1.getDay () + 1;
    week = d = 1
    start = false;
 
    for (n=1;n<= 42;n++) 
    {
        if (week == 1)  txt += "<tr bgcolor='#efefff' align=center>"
        if (week==diainicio) {start = true}
        if (d > days[mmonth]) {start=false}
        if (start) 
        {
            dat = new Date((mmonth+1).toString() + "/" + d + "/" + ano.toString())
            day_dat   = dat.toString().substr(0,10)
            day_today  = date_Form.toString().substr(0,10)
            year_dat  = dat.getFullYear ()
            year_today = date_Form.getFullYear ()
            colorcell = ((day_dat == day_today) && (year_dat == year_today) ? " bgcolor='#FFCC00' " : "" )
            txt += "<td"+colorcell+" align=center><a href=javascript:block('"+  d + "/" + (mmonth+1).toString() + "/" + ano.toString() +"','"+ obj +"','" + div +"') class='data'>"+ d.toString() + "</a></td>"
            d ++ 
        } 
        else 
        { 
            txt += "<td class='data' align=center> </td>"
        }
        week ++
        if (week == 8) 
        { 
            week = 1; txt += "</tr>"} 
        }
        txt += "</table>"
        div2 = eval (div)
        div2.innerHTML = txt 
}
  
// função para exibir a janela com os meses
function pop_month(obj, div, tam, ano)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=80>"
  for (n = 0; n < 12; n++) { txt += "<tr><td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+("01/" + (n+1).toString() + "/" + ano.toString())+"')>" + umonth[n] +"</a></td></tr>" }
  txt += "</table>"
  popd.innerHTML = txt
}
 
// função para exibir a janela com os anos
function pop_year(obj, div, tam, umonth)
{
  txt  = "<table bgcolor='#CCCCFF' border='0' width=160>"
  l = 1
  for (n=1991; n<2012; n++)
  {  if (l == 1) txt += "<tr>"
     txt += "<td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+(umonth.toString () +"/01/" + n) +"')>" + n + "</a></td>"
     l++
     if (l == 4) 
        {txt += "</tr>"; l = 1 } 
  }
  txt += "</tr></table>"
  popd.innerHTML = txt 
}
 
// função para fechar o calendário
function force_close(div) 
    { div2 = eval (div); div2.innerHTML = ''}
    
// função para fechar o calendário e setar a data no campo de data associado
function block(data, obj, div)
{ 
    force_close (div)
    obj2 = eval(obj)
    obj2.value = data 
}
 
</script>
	<script src="jquery.js" type="text/javascript"></script>
	<script src="jquery.maskedinput.js" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistema de academia de luta</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="lib/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="lib/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	jQuery(function($){
       $("#campoData").mask("99/99/9999");
       $("#campoTelefone").mask("(99) 9999-9999");
       $("#campoSenha").mask("***-****");
	   $("#campoCelular").mask("(99) 99999-9999");
	   $("#campoCPF").mask("999.999.999-99");
	   $("#campoCEP").mask("99999-999");
	});
	</script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dudu Extreme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Sair</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Inicio<span class="sr-only">(current)</span></a></li>
            <li><a href="cadastro.php">Cadastro de Aluno</a></li>
            <li><a href="matriculas.php">Controle de Matrículas</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Matrícula do Aluno</h3>
          <div class="row">
          <div class="form-group col-md-2">
              <label>Matricula:</label>
              <input type="text" class="form-control" name="nome"  placeholder="Nome Completo" id="nome" required autofocus>
          </div>
 
          <div class="form-group col-md-3">
               <label>Modalidade:</label>
               <input type="text" class="form-control" name="email" placeholder="Endereço" id="email">
          </div>
 
          <div class="form-group col-md-2">
               <label>Data Inicio:</label>
              <form  name='form1'>
 
<!-- data 1 -->
<input  class="form-control" NAME="data1" SIZE="10" MAXLENGTH="10" value=""> 
<input  class="btn btn-success" TYPE="button" NAME="btnData1" VALUE="..." Onclick="javascript:popdate('document.form1.data1','pop1','150',document.form1.data1.value)">
<!-- 
    na span abaixo aparece o primeiro calendario.
    vc pode colocar a span abaixo no lugar onde quiser em sua 
    pagina inclusive dentro de uma table para facilitar o 
    posicionamento. Mas lembre-se que quanto mais perto a span 
    estiver do campo de data a ela associada mais fácil será para
    o usuario associar. 
-->
 
<span id="pop1" style="position:absolute"></span>
</form>
          </div>
    </div>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="lib/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="lib/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="lib/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>