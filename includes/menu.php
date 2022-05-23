<header style="background-color: #d95850;" class="p-2 mb-2 border-bottom ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="Assets/logo.png" class="bi me-2" width="100%" height="32" role="img" aria-label="Bootstrap">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown05" data-bs-toggle="dropdown"
                        aria-expanded="false">Cadastro</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li style="display: flex;" class="dropdown-item">
                            <span style="margin-right: 10px;" class="material-icons">how_to_reg</span>
                            <a style="text-decoration: none; color: #212529;" href="cadastro.php">Cadastrar
                                Cliente</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <div  class="dropdown text-end">
                <a href="#" class="d-block text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="Assets/user.png" alt="mdo" width="40" height="40" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li style="display: flex;" class="dropdown-item">
                        <span style="margin-right: 10px;" class="material-icons">person</span>
                        Usuário:
                        <?php echo $rows_dados['usuario']; ?>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li style="display: flex;" class="dropdown-item">
                        <span style="margin-right: 10px;" class="material-icons">account_box</span>
                        <a style="text-decoration: none; color: #212529;" href="usuario.php">Meus Dados</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li style="display: flex;" class="dropdown-item">
                        <span style="margin-right: 10px;" class="material-icons">logout</span>
                        <a style="text-decoration: none; color: #212529;" href="config/logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>