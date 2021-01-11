<?php
    session_start();
    ob_start();
    include('../includes/header.php'); 
    include('../includes/navbar.php');
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="row">
        <div id="content" class="container">
        <h3 id="main-page-form-title">Cadastro de Usuário</h3>
        <div class="son-form card">
            <?php
            // var_dump($_SESSION);exit;
                if(isset($_SESSION['listaPessoas'][0])){        
                    include '../modelo/ModUsuario.php';
                    $lista = array();
                    $lista = unserialize($_SESSION['listaPessoas'][0]);
                    $acao = $_SESSION['listaPessoas'][1];
                    if($acao == 'editar'){
                        $pes = unserialize($_SESSION['listaPessoas'][2]);
                        // var_dump($pes[0]->id_usuario);exit;
                    }else{
                        $pes = null;
                    }
            ?>
            <form name="cadUsuario" id="cadUsuario" enctype="multipart/form-data" action="<?php echo ($acao == 'cadastrar' ? "../controle/Usuario.php?op=cadastrar" : "../controle/Usuario.php?op=editar&id_usuario=".$pes[0]->id_usuario."");?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Selecione a pessoa a vincular ao usuário</label>
                        <select id="pessoa" name="pessoa" class="form-field son-form-field form-control">
                            <?php
                                foreach($lista as $p){
                                    echo '<option value="'.$p->id_pessoa.'"'.($pes != null ?($p->id_pessoa == $pes[0]->id_pessoa ? 'selected = selected':''):'').'>'.$p->nome.'</option>';
                                }
                            ?>
                        </select>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Login</label>
                        <input type="text" name="login" id="login"  value="<?php echo ($pes != null ? $pes[0]->login :'');?>" class="form-field son-form-field form-control" required>    
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" name="senha" id="senha"  value="<?php echo ($pes != null ? $pes[0]->senha :'');?>" class="form-field son-form-field form-control" required>    
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Selecione o tipo de usuário</label>
                        <select name="tipo" class="form-field son-form-field form-control" required>
                            <option value = "administrador" <?php echo ($pes != null ? ($pes[0]->tipo == 'administrador' ? 'selected = selected':''):'');?>>Administrador</option>
                            <option value = "funcionario" <?php echo ($pes != null ? ($pes[0]->tipo == 'funcionario' ? 'selected = selected':''):'');?>>Funcionario</option>
                        </select>
                    </div>
                    <?php
                        }else{
                            header('location:../controle/Usuario.php?op=listarPessoas');
                            ob_end_flush();
                        }					
                    ?>
                    <div class="card-footer">
                        <div class="confirm-btns">
                            <button name="btncadastrar" id="btncadastrar" value="<?php echo ($acao == 'cadastrar' ? "cadastrar" : "editar");?>" class="btn btn-primary"><?php echo ($acao == 'cadastrar' ? "Cadastar Usuário" : "Editar Usuário");?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#menu-toggle").click(function(event) {
        event.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    
</script>

<?php
    include('../includes/scripts.php');
?>