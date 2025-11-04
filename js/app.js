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