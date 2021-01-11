<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../resources/css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>

      <form name="cadusu" id="cadusu" action="../Controle/ControleUsuario.php?op=cadastrar" method="post" class="login-form">
        <h1>NOVUS</h1>

        <div class="txtb">
          <input type="text" name="txtlogin" id="txtlogin" placeholder="email">
        </div>

        <div class="txtb">
          <input type="password" name="txtsenha" id="txtsenha" placeholder="Senha">
        </div>

        <div class="form-group txtb">
            <label for="">Tipo de Usuário</label>
            <select name="seltipo" id="seltipo" class="form-field son-form-field form-control">
                <option value="admin">Usuário Administrador</option>
                <option value="funcionario">Usuário Comum</option>
            </select>
        </div>

        <input type="submit" class="logbtn"  name="btncadastrar" id="btncadastrar" value="cadastrar" >

      </form>

      


  </body>
</html>
