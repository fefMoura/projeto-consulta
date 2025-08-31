<?php
session_start();

// Se você tiver o objeto User na sessão, destrua ele explicitamente
if (isset($_SESSION['usuario_obj'])) {
    unset($_SESSION['usuario_obj']); // chama __destruct
}

// Limpa todos os dados da sessão
session_destroy();

// Redireciona para a página de login
header("Location: ../view/formLogin.php");
exit();
?>