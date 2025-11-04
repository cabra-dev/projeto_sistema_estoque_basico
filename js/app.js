document.addEventListener("DOMContentLoaded", () => {
   //Ver se estamos na página de login ou na de produtos
    const paginaLogin = document.getElementById("formLogin");
    const paginaProdutos = document.getElementById("formProduto");)

    // LOGIN SIMPLES
    if (paginaLogin) {
        paginaLogin.addEventListener("submit", (event) => {
            event.preventDefault(); // impede o recarregamento da página

            // Captura os valores dos campos de entrada
            const user = document.getElementById("user").value.trim();
            const pass = document.getElementById("pass").value.trim();

            // Verifica se os campos não estão vazios
            if (user === "admin" && pass === "1234") {
                // Redireciona para a página de produtos
                window.location.href = "produtos.php";
            } else {
                // Exibe uma mensagem de erro
                alert("Usuário ou senha incorretos!");
            }