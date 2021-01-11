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
                    <h2 class="class" align="center">Reservas</h2>
					<div class="entry">
                        <?php
                            if(isset($_SESSION['listaUsuarioSala'])){
                                include '../modelo/ModUsuarioSala.php';
                                $lista = array();
                                $lista = unserialize($_SESSION['listaUsuarioSala']);
                                if(isset($_SESSION['erros'])){
                                    echo '<div class="alert alert-danger">
                                                <strong>'.$_SESSION['erros'].'</strong>
                                            </div>';
                                    unset($_SESSION['erros']);
                                }
                        ?>
                        <div class="container">
                            <table id="tableCons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Numero</th>
                                        <th>Horario Inicial</th>
                                        <th>Horario Final</th>
                                        <th>Ativo</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sala</th>
                                        <th>Numero</th>
                                        <th>Horario Inicial</th>
                                        <th>Horario Final</th>
                                        <th>Ativo</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php

                                        foreach($lista as $us){
                                            echo '<tr align="center">';
                                            echo '<td>'.$us->descricao_sala.'</td>';
                                            echo '<td>'.$us->numero.'</td>';
                                            echo '<td>'.$us->horaInicial.'</td>';
                                            echo '<td>'.$us->horaFinal.'</td>';
                                            echo '<td>'.$us->ativo.'</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                                }else{
                                    header('location:../controle/UsuarioSala.php?op=listar');
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