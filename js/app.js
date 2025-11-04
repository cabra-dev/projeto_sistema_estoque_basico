document.addEventListener("DOMContentLoaded", () => {
   //Ver se estamos na página de login ou na de produtos
    const paginaLogin = document.getElementById("formLogin");
    const paginaProdutos = document.getElementById("formProduto");

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
        });
    }

    // CONTROLE DE PRODUTOS
    if (paginaProdutos) {
        const lista = document.getElementById("lista");
        // Aqui onde os produtos serão armazenados (sem usar banco de dados)
        // Vamos usar um array simples
        const produtos = [];
        // Função para atualizar os produtos do array na tabela
        function atualizarTabela() {
            lista.innerHTML = ""; // Limpa a tabela
        // Se não tiver produtos, exibe uma mensagem
            if (produtos.length === 0) {
                lista.innerHTML = "<tr><td colspan='4'>Nenhum produto cadastrado.</td></tr>";
            } else {
        // Aqui percorre o array de produtos e adiciona cada um na tabela
                produtos.forEach((p, i) => {
                    const tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${p.nome}</td>
                        <td>${p.quantidade}<td>
                        <td>R$ ${p.preco.toFixed(2)}</td>
                        <td><button class="btn small danger" onclick="remover(${i})">Excluir</button></td>
                    `;
                    lista.appendChild(tr); // Aqui adiciona a linha na tabela
                });
            }
        }
        // Função para remover um produto do array
        window.remover = function(i) {
            if (confirm("Tem certeza que deseja excluir este produto?")) {
                produtos.splice(i, 1); // Remove o produto do array
                atualizarTabela(); // Atualiza a tabela
            }
        };
        // Evento de envio do formulário de produtos
        paginaProdutos.addEventListener("submit", (event) => {
            event.preventDefault(); // impede o recarregamento da página

            // Captura os valores dos campos de entrada
            const nome = document.getElementById("nome").value.trim();
            const qtd = parseInt(document.getElementById("quantidade").value);
            const preco = parseFloat(document.getElementById("preco").value);
            // Validação simples dos campos
            if (!nome || qtd <= 0 || preco <= 0) {
                alert("Por favor, preencha todos os campos corretamente.");
                return;
            }
            // Adiciona o novo produto ao array
            produtos.push({ nome: nome, quantidade: qtd, preco: preco });
            atualizarTabela(); // Atualiza a tabela
            // Limpa os campos do formulário
            paginaProdutos.reset();
        });

        // Botão de logout
        document.getElementById("logout").addEventListener("click", () => {
            // Redireciona para a página de login
            window.location.href = "login.php";
        }
    );
    // Inicializa a tabela
        atualizarTabela();
    }   
});