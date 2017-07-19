<?php


define('BD_USER', 'root'); // USE O TEU USU�RIO DE BANCO DE DADOS
define('BD_PASS', ''); // USE A TUA SENHA DO BANCO DE DADOS
define('BD_NAME', 'mybd'); // USE O NOME DO TEU BANCO DE DADOS

mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);


/**
* Fun��o que protege uma p�gina
*/
function protegePagina() {

if (!isset($_SESSION['usuario_id']) OR !isset($_SESSION['nome'])) {
// N�o h� usu�rio logado, manda pra p�gina de login
expulsaVisitante();
} else if (!isset($_SESSION['usuario_id']) OR !isset($_SESSION['nome'])) {
// H� usu�rio logado, verifica se precisa validar o login novamente
if ($_SG['validaSempre'] == true) {
// Verifica se os dados salvos na sess�o batem com os dados do banco de dados
if (!validaUsuario($_SESSION['usuario'], $_SESSION['senha'])) {
if (!validaUsuario($_SESSION['nivel_usuario'], $_SESSION['nivel_usuario'])) {
// Os dados n�o batem, manda pra tela de login
expulsaVisitante();
}
}
}
}
}


/**
* Fun��o para expulsar um visitante
*/
function expulsaVisitante() {

// Remove as vari�veis da sess�o (caso elas existam)
unset($_SESSION['usuario_id'], $_SESSION['nome'], $_SESSION['usuario'], $_SESSION['senha'], $_SESSION['nivel_usuario']);

// Manda pra tela de login
$login = "formulario_login.html";
header("Location: $login");
}

function GeraEstados($nome_campo)
  {
    echo "<select name='".$nome_campo."' size='1' id='ds_estado' class='CaixaTexto'>".
         "<option value='' selected='selected'>UF</option>".
         "<option value='RJ'>RJ</option>".
         "<option value='SP'>SP</option>".
         "<option value='AC'>AC</option>".
         "<option value='AL'>AL</option>".
         "<option value='AM'>AM</option>".
         "<option value='AP'>AP</option>".
         "<option value='BA'>BA</option>".
         "<option value='CE'>CE</option>".
         "<option value='DF'>DF</option>".
         "<option value='ES'>ES</option>".
         "<option value='GO'>GO</option>".
         "<option value='MA'>MA</option>".
         "<option value='MG'>MG</option>".
         "<option value='MS'>MS</option>".
         "<option value='MT'>MT</option>".
         "<option value='PA'>PA</option>".
         "<option value='PB'>PB</option>".
         "<option value='PR'>PR</option>".
         "<option value='PE'>PE</option>".
         "<option value='PI'>PI</option>".
         "<option value='RN'>RN</option>".
         "<option value='RS'>RS</option>".
         "<option value='RO'>RO</option>".
         "<option value='RR'>RR</option>".
         "<option value='SC'>SC</option>".
         "<option value='SE'>SE</option>".
         "<option value='TO'>TO</option>".
         "</select>";
  }
  


?>

