<?php 
    require_once 'config.php';
    
    $nome = filter_input(0, 'nome');
    $email = filter_input(0, 'emal');
    $senha = filter_input(0, 'senha');
    $empresa = filter_input(0, 'empresa');
    $ativo = filter_input(0, 'ativo');
    
    if (strlen($senha) < 8) { 
    echo'sua senha deve ter no mínimo 8 caracteres';
 Exit;
}
for ($i = 0; $i < 2000; $i++){
    $senha = md5($senha);
}
$nm = explode("", $nome);

if ($nome == "indefinido"){
    echo'campo nome é obrigatorio';
}
 else
     if (count($nm) <= 1){
         echo'coloque seu nome completo';
     }
else
    if (!strpos($email, "@")){
        echo 'email invalido';
    }
    else
    if ($email == "indefinido"){
        echo 'campo email é obrigatorio';
    }
 else
     if ($senha == "indefinido"){
         echo 'campo email obrigatorio';
     }
 else {
      
     $conect = Base::conexao();
     $gact = $conect->prepare("INSERT INTO usuarios (`nome`,`email`,`senha`,`ativo`) VALUES (:nome, :email, :senha, :ativo);");
     $inits = 1;
     $gact->bitParam(':nome', $nome);
     $gact->bitParam(':email', $email);
     $gact->bitParam(':senha', $senha);
     $gact->bitParam(':nome', $inits,PDO::PARAM_INT);
     echo 'ok';
}
?>
