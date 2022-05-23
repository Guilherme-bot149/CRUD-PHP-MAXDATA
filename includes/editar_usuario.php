<!-- Edita dados do usuário -->
<div class="modal-header">
    <h4 class="modal-title">Editar usuário</h4>
    <button style="border: none; background: transparent;" type="button" class="close" data-dismiss="modal"
        aria-hidden="true">
        <span style="color: red; font-size: 30px;" class="material-icons">clear</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input name="nome" type="text" class="form-control" value="<?php echo $rows_dados['nome']; ?>" required>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input name="email" type="email" class="form-control" value="<?php echo $rows_dados['email']; ?>" required>
    </div>

    <div class="form-group">
        <label for="campo2">Usuário</label>
        <input name="usuario" type="text" class="form-control" value="<?php echo $rows_dados['usuario']; ?>" required>
    </div>

    <div class="form-group">
        <label for="campo2">Senha</label>
        <input name="senha" id="senha" type="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="campo2">Confirma Senha</label>
        <input name="senha_confirmar" id="senha_confirmar" type="password" class="form-control">
    </div>
</div>
<div class="modal-footer">
    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
    <input type="submit" class="btn btn-success" value="Gravar">
</div>