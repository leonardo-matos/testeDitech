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
        <h3 id="main-page-form-title">Reserva de Sala</h3>
        <div class="son-form card">
            <?php
                if(isset($_SESSION['listaSalas'][0])){        
                    include '../modelo/ModUsuarioSala.php';
                    $lista = array();
                    $lista = unserialize($_SESSION['listaSalas'][0]);
                    $acao = $_SESSION['listaSalas'][1];
                    if($acao == 'editar'){
                        $sala = unserialize($_SESSION['listaSalas'][2]);
                    }else{
                        $sala = null;
                    }
            ?>
            <form name="cadUsuarioSala" id="cadUsuarioSala" enctype="multipart/form-data" action="<?php echo ($acao == 'cadastrar' ? "../controle/UsuarioSala.php?op=cadastrar" : "../controle/UsuarioSala.php?op=editar&id_usuario=".$sala[0]->id_sala."");?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Selecione a pessoa a vincular ao usuário</label>
                        <select id="id_sala" name="id_sala" class="form-field son-form-field form-control">
                            <?php
                                foreach($lista as $s){
                                    echo '<option value="'.$s->id_sala.'"'.($sala != null ?($s->id_sala == $sala[0]->id_sala ? 'selected = selected':''):'').'>'.$s->descricao_sala.'</option>';
                                }
                            ?>
                        </select>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Hora Inicial</label>
                        <input type="datetime-local" name="horaInicial" id="horaInicial"  value="<?php echo ($sala != null ? $sala[0]->horaInicial :'');?>" class="form-field son-form-field form-control" required>    
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Hora Final</label>
                        <input type="datetime-local" name="horaFinal" id="horaFinal"  value="<?php echo ($sala != null ? $sala[0]->horaFinal :'');?>" class="form-field son-form-field form-control" required>    
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Ativo</label>
                        <div class="form-group">
                            <input type="radio" name = "ativo" id = "ativo" value = "1">Sim
                            <input type="radio" name = "ativo" id = "ativo" value = "0">Não
                        </div>
                    </div>
                    <?php
                        }else{
                            header('location:../controle/UsuarioSala.php?op=listarUsuarioSala');
                            ob_end_flush();
                        }					
                    ?>
                    <div class="card-footer">
                        <div class="confirm-btns">
                            <button name="btncadastrar" id="btncadastrar" value="<?php echo ($acao == 'cadastrar' ? "cadastrar" : "editar");?>" class="btn btn-primary"><?php echo ($acao == 'cadastrar' ? "Cadastar Reserva" : "Editar Reserva");?></button>
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