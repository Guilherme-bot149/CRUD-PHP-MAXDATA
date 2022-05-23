<?php require_once 'includes/header.php'; ?>
<?php require_once 'config/consulta_usuarios.php'; ?>


<?php while($rows_dados = mysqli_fetch_assoc($resultado)){ ?>
<?php require_once 'includes/menu.php'; ?>

<div class="container p-5 my-5 border">
    <!-- Informar Dados do usuário -->
    <div class="dados" data-js="dados_active">
        <h2>Meus Dados</h2>

        <!-- MENSAGEM DE SOBRE A ALTERAÇÃO DE DADOS DO USUSÁRIO -->
        <?php 
            if(isset($_SESSION['status_alterado'])):
        ?>   
        <!-- Successo Alerta -->
        <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
            <i class="bi-check-circle-fill"></i>
            <strong class="mx-2">Successo!</strong> Usuário alterado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php
        endif;
        unset($_SESSION['status_alterado']);
        ?>

        <?php 
            if(isset($_SESSION['erro_alterado'])):
        ?> 
        <!-- Erro Alerta   -->
        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
            <i class="bi-exclamation-octagon-fill"></i>
            <strong class="mx-2">Error!</strong> Houve um problema ao alterar o usuário na base de dados.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php
        endif;
        unset($_SESSION['erro_alterado']);
        ?>
        
        <div style=" text-align: end;">
            <a style="display: inline-flex; " href="index.php" class="btn btn-primary">
                <span style="margin-right: 10px;" class="material-icons">navigate_before</span>
                Voltar
            </a>
        </div>
        <hr />

        <!-- INFORMANDO OS DADOS DO USUÁRIO NO MOMENTO -->
        <div style="justify-content: center; margin-top: 0.5%;" class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" value="<?php echo $rows_dados['nome']; ?>" disabled>
            </div>
        </div>

        <div style="justify-content: center; margin-top: 0.5%;" class="row">
            <div class="form-group col-md-4">
                <label for="campo2">E-mail</label>
                <input type="email" class="form-control" value="<?php echo $rows_dados['email']; ?>" disabled>
            </div>
        </div>

        <div style="justify-content: center; margin-top: 0.5%;" class="row">
            <div class="form-group col-md-4">
                <label for="campo2">Usuário</label>
                <input type="text" class="form-control" value="<?php echo $rows_dados['usuario']; ?>" disabled>
            </div>
        </div>

        <div style="justify-content: center; margin-top: 0.5%;" class="row">
            <div class="form-group col-md-4">
                <label for="campo2">Senha</label>
                <input type="password" class="form-control" value="<?php echo $rows_dados['senha']; ?>" disabled>
            </div>
        </div>

        <div style="text-align: center;" id="actions" class="row">
            <div style="margin-top: 3%;" class="col-md-12">
                <a href="#editEmployeeModal" class="btn btn-warning" data-toggle="modal">Editar</a>
            </div>
        </div>
    </div>
</div>

    <!-- MODAL TELA PARA EDITAR OS DADOS DO USUÁRIO -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="config/acao_editar_usuario.php" method="POST">
                    <?php include_once 'includes/editar_usuario.php' ?>
                </form>
            </div>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
<?php } ?>