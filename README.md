# 💼 Sistema de Controle de Estoque 

Um sistema simples e funcional de controle de estoque desenvolvido com **PHP**, **JavaScript** e **CSS**, sem uso de banco de dados.  
Os produtos são armazenados em **arrays** e exibidos em uma tabela dinâmica.  
O sistema também faz a **conversão automática de valores em reais (R$) para dólares (US$)** usando uma **API externa**.

---

## 🚀 Funcionalidades

✅ **Login Simples**  
- Usuário fixo: `admin`  
- Senha: `1234`  
- Após o login, o sistema redireciona para a tela de controle de produtos.

✅ **Cadastro de Produtos**  
- Campos: Nome, Quantidade e Preço (em reais).  
- Validação simples para garantir que todos os campos sejam preenchidos corretamente.  
- Atualização instantânea da tabela sem recarregar a página.

✅ **Listagem Dinâmica**  
- Tabela atualizada em tempo real com os produtos cadastrados.  
- Mostra o **preço em R$ e em US$** (conversão feita pela API externa).  
- Possibilidade de excluir produtos individualmente.

✅ **Conversão de Moeda (API Externa)**  
- Cotação do dólar buscada automaticamente pela API:  
  [https://api.exchangerate.host/latest?base=BRL&symbols=USD](https://api.exchangerate.host/latest?base=BRL&symbols=USD)  
- Cada produto exibe o valor em **reais e dólares**.  
- O valor é atualizado sempre que um novo produto é adicionado.

✅ **Logout Simples**  
- O botão “Sair” redireciona de volta para a tela de login.

✅ **Visual Moderno (Tema Escuro)**  
- Interface responsiva e limpa.  
- Cores contrastantes com tons escuros e detalhes em azul.  
- Layout centralizado e ajustado para desktop e mobile.

---

## 🧩 Estrutura do Projeto

sistema_estoque_api/
│
├── index.php → redireciona para o login
├── login.php → tela de autenticação
├── produtos.php → tela principal do sistema
│
├── js/
│ └── app.js → lógica principal (login, array, API, exclusão)
│
├── css/
│ └── estilo.css → tema escuro e layout centralizado
│
└── README.md → documentação do projeto


## ⚙️ Tecnologias Utilizadas

| 💻 Tecnologia | 📄 Função |
|----------------|-----------|
| **PHP** | Estrutura básica das páginas |
| **HTML5** | Marcação da interface |
| **CSS3** | Estilização (tema escuro responsivo) |
| **JavaScript (ES6)** | Lógica do sistema e integração com API |
| **API Exchangerate.host** | Cotação BRL → USD |
| **XAMPP (Apache)** | Servidor local |


## 🧠 Como Executar o Projeto Localmente

1. **Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html)** (ou outro servidor PHP local).  
2. Coloque a pasta do projeto dentro de:
C:\xampp\htdocs\
3. Inicie o **Apache** no painel do XAMPP.  
4. Acesse no navegador:
5. Faça login com:  
Usuário: admin
Senha: 1234
6. Comece a cadastrar os produtos e veja a conversão automática em dólar 💵.


## 👨‍💻 Autor e Contribuição

👤 **Desenvolvido por:**  
- Eduardo  
- Matheus

📘 **Orientação:** Projeto prático solicitado pelo professor na disciplina de **Programação Web (PHP e JavaScript)**.  
O objetivo foi demonstrar o uso de arrays e manipulação de dados sem banco, integrando com uma API externa.

---

## 🏁 Licença

📄 Este projeto foi desenvolvido apenas para fins educacionais.  
Sinta-se livre para estudar, modificar e aprimorar o código.
