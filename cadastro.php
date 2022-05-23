<?php require_once 'includes/header.php'; ?>
<?php require_once 'config/consulta_usuarios.php'; ?>

<?php while($rows_dados = mysqli_fetch_assoc($resultado)){ ?>
<?php require_once 'includes/menu.php'; ?>

<!-- MENSAGEM DE CADASTRO EXISTENTE -->
    <?php 
        if(isset($_SESSION['cliente_existe'])):?>
        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
            <i class="bi-exclamation-octagon-fill"></i>
            <strong class="mx-2">Error!</strong> Cliente ja cadastrado na base de dados! 
            <a href="index.php" class="alert-link">Busque nos clientes cadastrado.</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php
        endif;
            unset($_SESSION['cliente_existe']);
    ?>
 <?php } ?>  

<!-- FORMULARIO DE CADASTRO -->
<?php include_once 'includes/input_fields.php' ?>

<!-- FOOTER -->
<?php include_once 'includes/footer.php' ?>
