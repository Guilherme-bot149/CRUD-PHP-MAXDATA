<?php require_once 'includes/header.php'; ?>
<?php require_once 'config/consulta_usuarios.php'; ?>

<?php while($rows_dados = mysqli_fetch_assoc($resultado)){ ?>
<?php require_once 'includes/menu.php'; ?>

<div class="container p-5 my-5 border">
    <div class="container-xl">
        <h2>Seja Bem vindo
            <?php echo $rows_dados['usuario']; ?>
        </h2>
        
        <div style=" text-align: end;">
            <a style="display: inline-flex; " href="cadastro.php" class="btn btn-success">
                <span style="margin-right: 10px;" class="material-icons">person_add</span>
                Novo cliente
            </a>
        </div>    

        <!-- BOTÃO PARA INFORMA CLIENTES DESATIVOS NA BASE DE DADOS -->
        <div style="color: red;" class="form-check form-switch">
            <input style="cursor: pointer;" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault " onClick="check_active()">
            <label class="form-check-label" for="flexSwitchCheckDefault" >Clientes Desativados</label>
        </div>

        <!-- CLIENTES ATIVOS NA BASE DE DADOS -->
        <div class="ativos" data-js="clientes_ativos">
            <?php include 'includes/clientes_ativos.php'; ?>
        </div>

        <!-- CLIENTE DESATIVO NA BASE DE DADOS -->
        <div class="desativos" data-js="clientes_desativos">
            <?php include 'includes/clientes_desativos.php'; ?>
        </div>
    </div>
     
</div>
</div>

<script>
    // Troca de clientes ativos para desativos
    const clientes_ativos = document.querySelector('[data-js="clientes_ativos"]')
    const clientes_desativos = document.querySelector('[data-js="clientes_desativos"]')

    function check_active() {
        clientes_desativos.classList.toggle('active');
        clientes_ativos.classList.toggle('remove');
}
</script>

<?php include_once 'includes/footer.php' ?>
<?php } ?>

