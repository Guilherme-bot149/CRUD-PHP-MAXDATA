<?php 
$quantidade = 14;
$pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
$inicio = ($quantidade * $pagina) - $quantidade;

$sql = "SELECT * FROM clientes where cli_ativo_desativo='SIM' LIMIT $inicio, $quantidade";
$result = mysqli_query($conexao, $sql);
?>


<!-- Tabela de clientes ativados -->

<hr />
<h3>Clientes Cadastrados</h3>
<?php 
    // TOTAL DE REGISTRO DE CLIENTES ATIVOS
    $sqlTotal = "SELECT cli_id FROM clientes WHERE cli_ativo_desativo = 'SIM'";
    $qrTotal = mysqli_query($conexao,  $sqlTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);
    echo "Registro(s): $numTotal Cadastrado(s)"; 
?>

<!-- MENSAGEM DE CADASTRO DE CLIENTE! -->
<?php 
        if(isset($_SESSION['status_cadastro'])):
    ?>
<!-- Successo Alerta -->
<div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    <i class="bi-check-circle-fill"></i>
    <strong class="mx-2">Successo!</strong> Cliente cadastrado com sucesso!
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<?php
        endif;
        unset($_SESSION['status_cadastro']);
?>

<?php 
        if(isset($_SESSION['erro_cadastro'])):
?>
<!-- Error Alerta -->
<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
    <i class="bi-exclamation-octagon-fill"></i>
    <strong class="mx-2">Error!</strong> Houve um problema ao cadastrar na base de dados.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<?php
    endif;
    unset($_SESSION['erro_cadastro']);
?>


<!-- MENSAGEM DE ALTERAÇÃO DE CLIENTE! -->
<?php 
        if(isset($_SESSION['status_alterado_cliente'])):
    ?>
<!-- Successo Alerta -->
<div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    <i class="bi-check-circle-fill"></i>
    <strong class="mx-2">Successo!</strong> Cliente alterado com sucesso!
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<?php
        endif;
        unset($_SESSION['status_alterado_cliente']);
?>

<?php 
        if(isset($_SESSION['erro_alterado_cliente'])):
?>
<!-- Error Alerta -->
<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
    <i class="bi-exclamation-octagon-fill"></i>
    <strong class="mx-2">Error!</strong> Houve um problema ao alterar na base de dados.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<?php
    endif;
    unset($_SESSION['erro_cadastro']);
?>

<!-- MENSAGEM DE CADASTRO EXISTENTE -->
<?php 
        if(isset($_SESSION['cliente_existe'])):?>
        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
            <i class="bi-exclamation-octagon-fill"></i>
            <strong class="mx-2">Error!</strong> CPF ja cadastrado na base de dados! 
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php
        endif;
            unset($_SESSION['cliente_existe']);
    ?>

<!-- MENSAGEM DE CLIENTE DELETADO -->
<?php
	if(isset($_SESSION['msg_delete'])){
		echo $_SESSION['msg_delete'];
		unset($_SESSION['msg_delete']);
	}

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
                        <a href="cadastro.php?id=<?php echo $id;?>" class="edit" title="Editar"><i class="material-icons">&#xE254;</i></a>

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
            Não há clientes cadastrados! <a href="cadastro.php" class="alert-link">Cadastrar cliente</a>.
        </div>

        <?php } ?>


    </div>
    <?php require_once 'includes/paginacao.php'; ?>
</div>
</div>
