<?php
$id= filter_input(INPUT_GET, 'id');


// FORMULARIO DE EDIÇÃO DE CLIENTE

if(isset($id))
{ 

$sql = "SELECT cli_id, cli_nome, cli_cpf, cli_cep, 
cli_email, cli_rua, cli_numero, cli_bairro, 
estados.uf_sigla, estados.uf_id, cidades.cidade_id, cidades.cidade_nome,
cli_telefone, cli_nascimento, cli_ativo_desativo  FROM clientes
    LEFT JOIN cidades
    ON cidades.cidade_id = clientes.cidade_cidade_id 
    INNER JOIN Estados
    ON estados.uf_id = cidades.estado_uf_id 
    WHERE cli_id = '$id'";
$result = mysqli_query($conexao, $sql);

while($rows = mysqli_fetch_assoc($result)){
    $id = $rows['cli_id'];
    $nome = $rows['cli_nome'];
    $cpf = $rows['cli_cpf'];
    $cep = $rows['cli_cep'];
    $email = $rows['cli_email'];
    $rua = $rows['cli_rua'];
    $numero = $rows['cli_numero'];
    $bairro = $rows['cli_bairro'];
    $estado_id = $rows['uf_id'];
    $estado = $rows['uf_sigla'];
    $cidade_id = $rows['cidade_id'];
    $cidade = $rows['cidade_nome'];
    $telefone = $rows['cli_telefone'];
    $nascimento = $rows['cli_nascimento'];
    $ativo_desativo = $rows['cli_ativo_desativo'];
?>
<div class="container p-5 my-5 border">
    <h2>Editar Cliente</h2>
    <!-- BOTÃO VOLTAR -->
    <div style="text-align: end;">
        <a style="display: inline-flex;" href="index.php" class="btn btn-primary">
            <span style="margin-right: 10px" class="material-icons">navigate_before</span>
            Voltar
        </a>
    </div>

    <p>
        <h11>*</h11> Campos Obrigatório
    </p>
    <hr>

<form action="config/editar_cliente.php?id=<?php echo $id?>" method="POST">
    <div style="display: inline-flex; align-items: center;" class="form-group col-md-1">
            <label style="margin-right: 8%;">ID</label>
            <input class="form-control" value="<?php echo $id?>" disabled>
        </div>
    <!-- NOME -->
    <div style="margin-top: 1%;" class="row">
        <div class="form-group col-md-6">
            <label>Nome <h11>*</h11></label>
            <input name="nome" type="text" class="form-control"
                value="<?php echo $nome?>" required>
        </div>

        <!-- CPF -->
        <div class="form-group col-md-3">
            <label>CPF <h11>*</h11></label>
            <input id="cpf" name="cpf" type="text" autocomplete="off" class="form-control"
                OnKeyPress="formatar('###.###.###-##', this)"  maxlength="14" pattern="[0-9.-]+$" 
                value="<?php echo $cpf?>" required>
        </div>

        <!-- CEP -->
        <div class="form-group col-md-3">
            <label>CEP <h11>*</h11></label>
            <input id="cep" type="search" placeholder="Apenas Números" class="form-control" name="cep" maxlength="9"
                onblur="pesquisacep(this.value);" OnKeyPress="formatar('#####-###', this)" pattern="[0-9-]+$" 
                value="<?php echo $cep?>" required>
        </div>
    </div>


    <div style="margin-top: 0.5%" class="row">

        <!-- RUA -->
        <div class="form-group col-md-3">
            <label>Rua <h11>*</h11></label>
            <input id="rua" name="rua" type="text" class="form-control"
                value="<?php echo $rua?>" required>
        </div>

        <!-- NUMERO CASA -->
        <div class="form-group col-md-1">
            <label>Nº <h11>*</h11></label>
            <input id="numero" name="numero" type="text" class="form-control" pattern="[0-9]+$"
                value="<?php echo $numero?>" required>
        </div>

        <!-- BAIRRO -->
        <div class="form-group col-md-3">
            <label>Bairros <h11>*</h11></label>
            <input id="bairro" name="bairro" type="text" class="form-control" 
                value="<?php echo $rua?>" required>
        </div>

        <div class="form-group col-md-2">
            <label for="campo3">UF <h11>*</h11></label>
            <select name="uf" class="form-select" id="uf"  required>
                <option value="<?php echo $estado_id?>" selected><?php echo $estado?></option>
                <?php 
                    $conexao_estado = new PDO("mysql:host=localhost;dbname=crud", "root", "root");
                    
                    $select = $conexao_estado->prepare("SELECT * FROM estados ORDER BY uf_sigla ASC");
                    $select->execute();
                    $fetchAll = $select->fetchAll();
                    foreach($fetchAll as $estados)
                    {
                        echo '<option value="'.$estados['uf_id'].'">'.$estados['uf_sigla'].'</option>';
                    }
            ?>
            </select>
        </div>

        <!-- CIDADE -->
        <div class="form-group col-md-3">
            <label>Cidade / Distrito<h11>*</h11></label>
            <select id="cidades" name="cidades" class="form-select" required>
                <option value="<?php echo $cidade_id?>"><?php echo $cidade?></option>
            </select>
        </div>

        <div style="margin-top: 0.5%" class="row">

            <!-- TELEFONE -->
            <div class="form-group col-md-3">
                <label>Telefone <h11>*</h11></label>
                <input id="telefone" type="text" class="form-control" onkeyup="mascaraFone(event)" name="telefone"
                    maxlength="15" pattern="[0-9- ()]+$"
                    value="<?php echo $telefone?>" required>
            </div>

            <!-- DATA DE NASCIMENTO -->
            <div class="form-group col-md-2">
                <label>Nascimento <h11>*</h11></label>
                <input type="date" class="form-control" name="nascimento" 
                    value="<?php echo $nascimento?>" required>
            </div>

            <!-- EMAIL -->
            <div class="form-group col-md-5">
                <label>E-mail <h11>*</h11></label>
                <input id="email" name="email" type="email" class="form-control" 
                    value="<?php echo $email?>" required>
            </div>

            <!-- CLIENTE ATIVO OU DESATIVADO -->
            <div class="form-group col-md-2">
                <label>Ativo <h11>*</h11></label>
                <select name="ativo_desativo" class="form-select" id="ativo_desativo" required>
                    <option><?php echo $ativo_desativo?></option>
                    <option>Sim</option>
                    <option>Não</option>
                </select>
            </div>
        </div>
    </div>
    <!-- BOTÕES FORMS -->
    <div class="row">
        <div id="actions" class="row">
            <div style="margin-top: 3%;" class="col-md-12">

                <div style="text-align: end;">
                    <button style="display: inline-flex" type="submit" class="btn btn-success">
                        <span style="margin-right: 10px;" class="material-icons">done</span>
                        Salvar
                    </button>

                    <a style="display: inline-flex " href="index.php" class="btn btn-danger">
                        <span style="margin-right: 10px;" class="material-icons">clear</span>
                        Cancelar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php } ?>
    <script>
            $("#uf").on("change", function () {
                var uf_id = $("#uf").val();

                $.ajax({
                    url: './config/consulta_cidade.php',
                    type: 'POST',
                    data: { id: uf_id },
                    success: function (data) {
                        $("#cidades").html(data);
                    },
                    error: function (data) {
                        $("#cidades").html("Houve um erro ao carregar!");
                    }
                });
            });
        </script>



<!-- FORMULARIO DE CADASTRO DE CLIENTE -->

<?php
}
else
{ 
?>
    <div class="container p-5 my-5 border">
        <h2>Cadastro de Cliente</h2>
        <!-- BOTÃO VOLTAR -->
        <div style="text-align: end;">
            <a style="display: inline-flex;" href="index.php" class="btn btn-primary">
                <span style="margin-right: 10px" class="material-icons">navigate_before</span>
                Voltar
            </a>
        </div>

        <p>
            <h11>*</h11> Campos Obrigatório
        </p>
        <hr>

<form action="config/cadastrar.php" method="POST">
        <!-- NOME -->
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nome <h11>*</h11></label>
                <input name="nome" type="text" class="form-control" required>
            </div>

            <!-- CPF -->
            <div class="form-group col-md-3">
                <label>CPF <h11>*</h11></label>
                <input id="cpf" name="cpf" type="text" autocomplete="off" class="form-control"
                    OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" pattern="[0-9.-]+$" required>
            </div>

            <!-- CEP -->
            <div class="form-group col-md-3">
                <label>CEP <h11>*</h11></label>
                <input id="cep" type="search" placeholder="Apenas Números" class="form-control" name="cep" maxlength="9"
                    onblur="pesquisacep(this.value);" OnKeyPress="formatar('#####-###', this)" pattern="[0-9-]+$"
                    required>
            </div>
        </div>


        <div style="margin-top: 0.5%" class="row">

            <!-- RUA -->
            <div class="form-group col-md-3">
                <label>Rua <h11>*</h11></label>
                <input id="rua" name="rua" type="text" class="form-control" required>
            </div>

            <!-- NUMERO CASA -->
            <div class="form-group col-md-1">
                <label>Nº <h11>*</h11></label>
                <input id="numero" name="numero" type="text" class="form-control" pattern="[0-9]+$" required>
            </div>

            <!-- BAIRRO -->
            <div class="form-group col-md-3">
                <label>Bairros <h11>*</h11></label>
                <input id="bairro" name="bairro" type="text" class="form-control" required>
            </div>

            <div class="form-group col-md-2">
                <label for="campo3">UF <h11>*</h11></label>
                <select name="uf" class="form-select" id="uf" required>
                    <option value="0">-Selecione-</option>
                    <?php 
                    $conexao_estado = new PDO("mysql:host=localhost;dbname=crud", "root", "root");
                    
                    $select = $conexao_estado->prepare("SELECT * FROM estados ORDER BY uf_sigla ASC");
                    $select->execute();
                    $fetchAll = $select->fetchAll();
                    foreach($fetchAll as $estados)
                    {
                        echo '<option value="'.$estados['uf_id'].'">'.$estados['uf_sigla'].'</option>';
                    }
            ?>
                </select>
            </div>

            <!-- CIDADE -->
            <div class="form-group col-md-3">
                <label>Cidade / Distrito<h11>*</h11></label>
                <select style="display: none;" id="cidades" name="cidades" class="form-select" required></select>
            </div>

            <div style="margin-top: 0.5%" class="row">

                <!-- TELEFONE -->
                <div class="form-group col-md-3">
                    <label>Telefone <h11>*</h11></label>
                    <input id="telefone" type="text" class="form-control" onkeyup="mascaraFone(event)" name="telefone"
                        maxlength="15" pattern="[0-9- ()]+$" required>
                </div>

                <!-- DATA DE NASCIMENTO -->
                <div class="form-group col-md-2">
                    <label>Nascimento <h11>*</h11></label>
                    <input type="date" class="form-control" name="nascimento" required>
                </div>

                <!-- EMAIL -->
                <div class="form-group col-md-5">
                    <label>E-mail <h11>*</h11></label>
                    <input id="email" name="email" type="email" class="form-control" required>
                </div>

                <!-- CLIENTE ATIVO OU DESATIVADO -->
                <div class="form-group col-md-2">
                    <label>Ativo <h11>*</h11></label>
                    <select name="ativo_desativo" class="form-select" id="ativo_desativo" required>
                        <option>Sim</option>
                        <option>Não</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- BOTÕES FORMS -->
        <div class="row">
            <div id="actions" class="row">
                <div style="margin-top: 3%;" class="col-md-12">

                    <div style="text-align: end;">
                        <button style="display: inline-flex"  type="submit" class="btn btn-success">
                            <span style="margin-right: 10px;" class="material-icons">done</span>
                            Cadastrar
                        </button>

                        <a style="display: inline-flex " href="index.php" class="btn btn-danger">
                            <span style="margin-right: 10px;" class="material-icons">clear</span>
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
        <script>
            $("#uf").on("change", function () {
                var uf_id = $("#uf").val();

                $.ajax({
                    url: './config/consulta_cidade.php',
                    type: 'POST',
                    data: { id: uf_id },
                    beforeSend: function () {
                        $("#cidades").css({ 'display': 'block' });
                        $("#cidades").html("Carregando...");
                    },
                    success: function (data) {
                        $("#cidades").css({ 'display': 'block' });
                        $("#cidades").html(data);
                    },
                    error: function (data) {
                        $("#cidades").css({ 'display': 'block' });
                        $("#cidades").html("Houve um erro ao carregar!");
                    }
                });
            });
        </script>
        <?php } ?>
