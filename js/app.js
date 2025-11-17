document.addEventListener("DOMContentLoaded", async () => {

    const resposta = await fetch("https://api.exchangerate.host/latest?base=BRL&symbols=USD");
    const dados = await resposta.json();
    const cotacao = dados.rates.USD;

    document.querySelectorAll(".usd").forEach(celula => {
        const precoBRL = parseFloat(celula.dataset.preco);
        const precoUSD = precoBRL * cotacao;
        celula.textContent = "US$ " + precoUSD.toFixed(2);
    });
});
