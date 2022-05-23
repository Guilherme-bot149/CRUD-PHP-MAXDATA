<?php
    // REMOVER CLIENTE DA BASE DE DADOS
    session_start();
    include_once("conexao.php");
    $id= filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
    if(!empty($id)){
        $result_apagar = "DELETE FROM clientes WHERE cli_id='$id'";
        $resultado_apagar = mysqli_query($conexao, $result_apagar);

        if(mysqli_affected_rows($conexao)){
            $_SESSION['msg_delete'] = "

            <div class='alert alert-success alert-dismissible d-flex align-items-center fade show'>
                <i class='bi-check-circle-fill'></i>
                <strong class='mx-2'>Successo!</strong> Cliente excluido com sucesso!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>";

            header("Location: ../index.php");
        
        }
        else{
            $_SESSION['msg_delete'] = "
            
            <div class='alert alert-danger alert-dismissible d-flex align-items-center fade show'>
                <i class='bi-check-circle-fill'></i>
                <strong class='mx-2'>Error!</strong> Erro ao apagar os registro do cliente!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>";

            header("Location:  ../index.php");
        }

    }
    else{
        $_SESSION['msg_delete'] = "            
        
        <div class='alert alert-danger alert-dismissible d-flex align-items-center fade show'>
            <i class='bi-check-circle-fill'></i>
            <strong class='mx-2'>Error!</strong> E preciso selecionar um cliente!
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>";

        header("Location:  ../index.php");
    
    }


?>