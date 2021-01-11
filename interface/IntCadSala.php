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
        <h3 id="main-page-form-title">Cadastro de Sala</h3>
        <div class="son-form card">
            <?php
                if(isset($_GET['acao']) && $_GET['acao'] == 'cadastrar'){
                    $acao = $_GET['acao'];
                    $sala = null;
                }else{
                    include '../modelo/ModSala.php';
                    $lista = array();
                    $sala = unserialize($_SESSION['listaSala']);
                    $acao = 'editar';
                }
            ?>
            <form name="cadSala" id="cadSala" enctype="multipart/form-data" action="<?php echo ($acao == 'cadastrar' ? "../controle/Sala.php?op=cadastrar" : "../controle/Sala.php?op=editar&id_sala=".$sala[0]->id_sala."");?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <input type="text" name="descricao" id="descricao"  value="<?php echo ($sala != null ? $sala[0]->descricao :'');?>" class="form-field son-form-field form-control" required>    
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Número</label>
                        <input type="number" name="numero" id="numero"  value="<?php echo ($sala != null ? $sala[0]->numero :'');?>" class="form-field son-form-field form-control" required>    
                    </div>
                    <?php
                        // }else{
                        //     header('location:../controle/Sala.php?op=');
                        //     ob_end_flush();
                        // }					
                    ?>
                    <div class="card-footer">
                        <div class="confirm-btns">
                            <button name="btncadastrar" id="btncadastrar" value="<?php echo ($acao == 'cadastrar' ? "cadastrar" : "editar");?>" class="btn btn-primary"><?php echo ($acao == 'cadastrar' ? "Cadastar Sala" : "Editar Sala");?></button>
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