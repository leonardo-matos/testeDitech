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
        <div id="content">
            <div class="contentbg">
			    <div class="post">
                    <h2 class="class" align="center">Sala</h2>
					<div class="entry">
                        <?php
                            if(isset($_SESSION['listaSala'])){
                                include '../modelo/ModSala.php';
                                $lista = array();
                                $lista = unserialize($_SESSION['listaSala']); 
                                
                                if(isset($_SESSION['erros'])){
                                    echo '<div class="alert alert-success">
                                                <strong>'.$_SESSION['erros'].'</strong>
                                            </div>';
                                    unset($_SESSION['erros']);
                                }
                        ?>
                        <div class="container">
                            <table id="tableCons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    <th>Descricao</th>
                                    <th>Numero</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <th>Descricao</th>
                                    <th>Numero</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        foreach($lista as $s){
                                            echo '<tr align="center">';
                                            echo '<td>'.$s->descricao.'</td>';
                                            echo '<td>'.$s->numero.'</td>';
                                            echo '<td>
                                                    <a href="../controle/Sala.php?op=buscaSalaPorId&id_sala='.$s->id_sala.'">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>';
                                            echo '<td>
                                                    <a href="../controle/Sala.php?op=deletar&id_sala='.$s->id_sala.'">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                                }else{
                                    header('location:../controle/Sala.php?op=listar');
                                    ob_end_flush();
                                }					
                            ?>
                        </div>
                    </div>
	            </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('../includes/scripts.php');
?>
<script>
    $(document).ready(function () {
        $('#tableCons').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>