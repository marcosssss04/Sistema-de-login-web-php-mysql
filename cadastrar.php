<?php
  require_once 'classes/usuarios.php';
  $u = new Usuario;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="corpo-form-cad">
    <h1>Cadastrar</h1>
    <form method="POST">
       <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
       <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
       <input type="email" name="email" placeholder="Usuário" maxlength="40">
       <input type="password" name="senha" placeholder="Senha" maxlength="15">
       <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
       <input type="submit" value="Cadastrar">
    </form>
    </div>
    <?php
     //verificar se clicou no botao
     if(isset($_POST['nome']))
     {
        $nome =  addslashes($_POST['nome']);
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $ConfirmarSenha = $_POST['confSenha'];
        //verificar se esta preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($ConfirmarSenha))
        {
             $u->conectar("projeto_login","localhost","root","");
             if($u->msgErro == "")//se esta tudo ok
             {
                 if($senha == $ConfirmarSenha)
                 {
                      if($u->cadastrar($nome,$telefone,$email,$senha))
                      {
                          ?>
                            <div id="msg-sucesso">
                               Cadastrado com sucesso! Acesse para entrar!
                            </div>
                         <?php
                      }
                      else
                      {
                          ?>
                            <div class="msg-erro">
                            Email ja cadastrado!
                            </div>
                          <?php
                      }
                 }
                else
                {
                    ?>
                        <div class="msg-erro">
                        senha e confirmar senha nao correspondem!
                        </div>
                    <?php
                }
             }
             else
             {
                 ?>
                 <div class="msg-erro">
                    <?php echo "Erro:".$u->msgErro;?>
                 </div>
                 <?php
             }
        }else
        {
            ?>
              <div class="msg-erro">
              preencha todos os campos!
              </div>
            <?php
        }
     }
       
    ?>
</body>
</html>