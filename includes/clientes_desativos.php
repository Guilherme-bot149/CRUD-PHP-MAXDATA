<?php 
$sql = "SELECT * FROM clientes where cli_ativo_desativo='NAO'";
$result = mysqli_query($conexao, $sql);
?>

<!-- Tabela de clientes desativados -->

<hr />
<h3>Clientes Desativados</h3>
<?php 
    // TOTAL DE REGISTRO DE CLIENTES DESATIVADOS
    $sqlTotal = "SELECT cli_id FROM clientes WHERE cli_ativo_desativo = 'NAO'";
    $qrTotal = mysqli_query($conexao,  $sqlTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    echo "Registro(s): $numTotal Desativado(s)"; 
?>

<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title"></div>
        <?php if (mysqli_num_rows($result)) { ?>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        while($rows = mysqli_fetch_assoc($result)){
                            $id = $rows['cli_id'];
                            $nome = $rows['cli_nome'];
                            $telefone = $rows['cli_telefone'];
                            $email = $rows['cli_email'];
                        ?>
                    <tr>
                        <th>
                            <?php echo $id?>
                        </th>
                        <td>
                            <?php echo $nome?>
                        </td>
                        <td>
                            <?php echo $telefone ?>
                        </td>
                        <td>
                            <?php echo $email ?>
                        </td>

                    <td>
                        <a href="cadastro.php?id=<?php echo $id;?>" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                        <a href="config/deletar.php?id=<?php echo $id; ?>" class="delete" title="Delete" onclick="return confirm('Tem certeza que deseja excluir os registros de <?php echo $id; ?>: <?php echo $nome; ?>?')"><i
                                class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php 
            }else { ?>

        <div class="alert alert-secondary" role="alert">
            Não há clientes desativados!
        </div>
        <?php } ?>
    </div>
</div>
</div>