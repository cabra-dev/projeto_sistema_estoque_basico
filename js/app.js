document.addEventListener("DOMContentLoaded", async () => {
    let cotacao = 0.1879;  

    try {
        const resposta = await fetch("https://api.exchangerate.host/latest?base=BRL&symbols=USD");
        if (!resposta.ok) {
            throw new Error("Erro na API");
        }
        const dados = await resposta.json();
        cotacao = dados.rates.USD || cotacao;  
    } catch (error) {
        console.error("Erro ao carregar câmbio:", error);
        
    }

    document.querySelectorAll(".usd").forEach(celula => {
        const precoBRL = parseFloat(celula.dataset.preco);
        if (!isNaN(precoBRL)) {
            const precoUSD = precoBRL * cotacao;
            celula.textContent = "US$ " + precoUSD.toFixed(2).replace('.', ',');  
        }
    });
});