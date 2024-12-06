
var radio = document.querySelector('.manual-btn')
var contador = 1

document.getElementById('radio1').checked = true

setInterval(() => {
    proximaimg()
}, 5000)


// rolamento do slide 

function proximaimg(){

    contador++

    if(contador > 3)(
        contador = 1
    )

    document.getElementById('radio'+contador).checked = true

    
}

// mudar imagem slide

function mudarImg(index){
    for( i=1; i<=4 ; i++ ){
        document.getElementById("img_principal" + i).classList.add("desligado")
    }
    document.getElementById("img_principal" + index).classList.remove("desligado")
}

// pesquisa

const abaPesq = document.getElementById("abaPesq")
const abaResul = document.getElementById("resultados")

function pegarR(){
    const querry = abaPesq.value
    fetchResults(querry)
}

function estrelaL(index){
    // limpar estrelas
    for(let i=1; i<=5; i++){
        document.getElementById("estrela" + i).classList.remove("ativa")
    }

    for(let i=1; i<=index;i++){
        document.getElementById("estrela" + i).classList.add("ativa")
    } 
    
}


// rolamento do loja/produto

function mudarprodutos(index){
    // retorna a largura
    let body = document.body.clientWidth

    let carrocel = document.querySelector(".marginProdutos")
    let carrocel2 = document.querySelector(".marginRelacionados")
    let botaoEsq = document.getElementById("botaoextra")
    let botaodireita = document.getElementById("botaoextra2")

    if (index == 1){
        carrocel.style.marginLeft = "0"
        botaodireita.classList.add("desligado")
    }
    if (index == 2){
        carrocel.style.marginLeft = "-99%"
        botaodireita.classList.remove("desligado")
    }
    if(index == 3  && body <= 768){
        botaoEsq.classList.add("desligado")
        botaodireita.classList.add("desligado")
        carrocel.style.marginLeft = "-99%"
    }
    if(index == 4  && body <= 768){
        botaoEsq.classList.remove("desligado")
        carrocel.style.marginLeft = "-198%"
    }
    if (index == 5){
        carrocel2.style.marginLeft = "0"
        botaodireita.classList.add("desligado")
    }
    if (index == 6){
        carrocel2.style.marginLeft = "-102%"
        botaodireita.classList.remove("desligado")
    }
    if(index == 7  && body <= 768){
        botaoEsq.classList.add("desligado")
        botaodireita.classList.add("desligado")
        carrocel2.style.marginLeft = "-105%"
    }
    if(index == 8  && body <= 768){
        botaoEsq.classList.remove("desligado")
        carrocel2.style.marginLeft = "-205%"
    }

}

// zoom nas imagens

function zoom(i){
    const backImg = document.getElementById("img_principal1");
    const backImg2 = document.getElementById("img_principal2");
    const backImg3 = document.getElementById("img_principal3");
    const backImg4 = document.getElementById("img_principal4");
    const img = document.querySelector(".zoom1");
    const img2 = document.querySelector(".zoom2");
    const img3 = document.querySelector(".zoom3");
    const img4 = document.querySelector(".zoom4");

    if(i == 1){
        backImg.addEventListener("mousemove", (e) =>{
            const x = e.clientX - e.target.offsetLeft;
            const y = e.clientY - e.target.offsetTop;

            img.style.transformOrigin = `${x}px ${y}px`;
            img.style.transform = "scale(1.7)";

        }) 
    }
    if(i == 2){
        backImg.addEventListener("mouseleave", () =>{

            img.style.transformOrigin = `center center`;
            img.style.transform = "scale(1)";
        })
    }
    if(i == 3){
        backImg2.addEventListener("mousemove", (e) =>{
            const x = e.clientX - e.target.offsetLeft;
            const y = e.clientY - e.target.offsetTop;

            console.log(x,y);

            img2.style.transformOrigin = `${x}px ${y}px`;
            img2.style.transform = "scale(1.7)";

        }) 
    }
    if(i == 4){
        backImg2.addEventListener("mouseleave", () =>{

            img2.style.transformOrigin = `center center`;
            img2.style.transform = "scale(1)";
        })
    }
    if(i == 5){
        backImg3.addEventListener("mousemove", (e) =>{
            const x = e.clientX - e.target.offsetLeft;
            const y = e.clientY - e.target.offsetTop;

            console.log(x,y);

            img3.style.transformOrigin = `${x}px ${y}px`;
            img3.style.transform = "scale(1.7)";

        }) 
    }
    if(i == 6){
        backImg3.addEventListener("mouseleave", () =>{

            img3.style.transformOrigin = `center center`;
            img3.style.transform = "scale(1)";
        })
    }
    if(i == 7){
        backImg4.addEventListener("mousemove", (e) =>{
            const x = e.clientX - e.target.offsetLeft;
            const y = e.clientY - e.target.offsetTop;

            console.log(x,y);

            img4.style.transformOrigin = `${x}px ${y}px`;
            img4.style.transform = "scale(1.7)";

        }) 
    }
    if(i == 8){
        backImg4.addEventListener("mouseleave", () =>{

            img4.style.transformOrigin = `center center`;
            img4.style.transform = "scale(1)";
        })
    }

}

// troca de tela do produtos

function pagar(i){
    
    if(i == 1){
        document.querySelector(".background_all").style.display = "none"
        document.querySelector(".background_all2").style.display = "block"
    }

    if(i == 2){
        document.querySelector(".background_all").style.display = "block"
        document.querySelector(".background_all2").style.display = "none"
    }

    if(i == 3){
        for(let j=1; j<=4; j++){
            document.getElementById("troca" + j).style.display = "block"
            document.getElementById("dado" + j).classList.add("desligado")
        }
        document.getElementById("cartao").classList.add("desligado")
        document.getElementById("cartao2").classList.add("desligado")
        document.getElementById("voltar1").classList.remove("desligado")
        document.getElementById("voltar2").classList.add("desligado")
        document.getElementById("btn").classList.add("desligado")
        document.querySelector(".background_all2").style.top ="50%"
    }
    
}

// troca de tela do cartão

function troca(i){
    let voltarIni= document.getElementById("voltar1")
    let voltarCom = document.getElementById("voltar2")
    if(i == 1){
        for(let i=1; i<=4; i++){
            document.getElementById("troca" + i).style.display = "none"
        }
        document.querySelector(".background_all2").style.top ="80%"
        document.getElementById("troca1").style.display = "flex"
        document.getElementById("cartao").classList.remove("desligado")
        document.getElementById("btn").classList.remove("desligado")
        document.getElementById("dado1").classList.remove("desligado")
        voltarIni.classList.add("desligado")
        voltarCom.classList.remove("desligado")
    }
    if(i == 2){
        for(let i=1; i<=4; i++){
            document.getElementById("troca" + i).style.display = "none"
        }
        document.querySelector(".background_all2").style.top ="80%"
        document.getElementById("troca2").style.display = "flex"
        document.getElementById("cartao2").classList.remove("desligado")
        document.getElementById("btn").classList.remove("desligado")
        document.getElementById("dado2").classList.remove("desligado")
        voltarIni.classList.add("desligado")
        voltarCom.classList.remove("desligado")
    }
    if(i == 3){
        for(let i=1; i<=4; i++){
            document.getElementById("troca" + i).style.display = "none"
        }
        document.getElementById("troca3").style.display = "block"
        document.getElementById("dado3").classList.remove("desligado")
        voltarIni.classList.add("desligado")
        voltarCom.classList.remove("desligado")
    }
    if(i == 4){
        for(let i=1; i<=4; i++){
            document.getElementById("troca" + i).style.display = "none"
        }
        document.getElementById("troca4").style.display = "block"
        document.getElementById("dado4").classList.remove("desligado")
        voltarIni.classList.add("desligado")
        voltarCom.classList.remove("desligado")
    }
}

// mostra o cartão

// cartão de crédito

function mostrarC(){
    // nome buscando apenas letras
    const texto = document.getElementById("DadoC1").value;
    const apenasL = texto.replace(/[^a-zA-ZÀ-ÿ]/g, '');
    const nome = apenasL.slice(0, 25);
    document.getElementById("NomeC").innerText = nome;

    // numero do cartão buscando apenas números
    const texto2 = document.getElementById("DadoC2").value;
    const apenasN = texto2.replace(/[^0-9]/g, '');
    const apenas16Num = apenasN.slice(0, 16);
    document.getElementById("NumeroC").innerText = apenas16Num;

    // data separada por "//"
    const texto3 = document.getElementById("DadoC3").value;
    const apenasN2 = texto3.replace(/[^0-9]/g, '');
    const apenas8Num = apenasN2.slice(0, 8);

    const dia = apenas8Num.slice(0, 2);
    const mes = apenas8Num.slice(2, 4);
    const ano = apenas8Num.slice(4, 8);
    
    const dataFor = `${dia}/${mes}/${ano}`;
    document.getElementById("ValidadeC").innerText =dataFor

    // CVV do cartão com apenas 3 dígitos
    const texto4 = document.getElementById("DadoC4").value;
    const apenasN3 = texto4.replace(/[^0-9]/g, '');
    const apenas3Num = apenasN3.slice(0, 3);
    document.getElementById("CVVC").innerText = apenas3Num;

    // busca com 1 ou 2 números da bandeira
    const testeD = parseInt(texto2.slice(0,2));
    const testeU = parseInt(texto2.slice(0,1));


    let cartao = document.getElementById("cartao")
    dadosC = document.querySelector(".dadosCartao")

    // busca Mastercard
    if(testeD === 51|| testeD === 52|| testeD === 53|| testeD === 54|| testeD === 55){
        for(let i=1;i<=4;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        document.getElementById("bandeira1").classList.remove("desligado")
        cartao.style.backgroundColor = "rgba(10, 10, 89, 0.8)"
        dadosC.style.color = "white"
    }
    // busca Visa
    else if(testeU === 4){
        for(let i=1;i<=4;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        document.getElementById("bandeira2").classList.remove("desligado")
        cartao.style.backgroundColor = "rgb(34, 34, 157)"
        dadosC.style.color = "white"
    }
    // busca American Express
    else if(testeD === 34|| testeD === 37){
        for(let i=1;i<=4;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        document.getElementById("bandeira3").classList.remove("desligado")
        cartao.style.backgroundColor = "gray"
        dadosC.style.color = "white"
    }
    // busca Dinner Club
    else if(testeD === 36|| testeD === 38){
        for(let i=1;i<=4;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        document.getElementById("bandeira4").classList.remove("desligado")
        cartao.style.backgroundColor = "rgb(226, 220, 205)"
    }
    // se não tiver dados
    else{
        for(let i=1;i<=4;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        cartao.style.backgroundColor = "white"
        dadosC.style.color = "black"
    }
    
}

// cartao de débito

function mostrarD(){
    // nome buscando apenas letras
    const texto = document.getElementById("DadoD1").value;
    const apenasL = texto.replace(/[^a-zA-ZÀ-ÿ]/g, '');
    const nome = apenasL.slice(0, 25);
    document.getElementById("NomeD").innerText = nome;

    // numero do cartão buscando apenas números
    const texto2 = document.getElementById("DadoD2").value;
    const apenasN = texto2.replace(/[^0-9]/g, '');
    const apenas16Num = apenasN.slice(0, 16);
    document.getElementById("NumeroD").innerText = apenas16Num;

    // data separada por "//"
    const texto3 = document.getElementById("DadoD3").value;
    const apenasN2 = texto3.replace(/[^0-9]/g, '');
    const apenas8Num = apenasN2.slice(0, 8);

    const dia = apenas8Num.slice(0, 2);
    const mes = apenas8Num.slice(2, 4);
    const ano = apenas8Num.slice(4, 8);
    
    const dataFor = `${dia}/${mes}/${ano}`;
    document.getElementById("ValidadeD").innerText =dataFor

    // CVV do cartão com apenas 3 dígitos
    const texto4 = document.getElementById("DadoD4").value;
    const apenasN3 = texto4.replace(/[^0-9]/g, '');
    const apenas3Num = apenasN3.slice(0, 3);
    document.getElementById("CVVD").innerText = apenas3Num;

    // busca com 1 ou 2 números da bandeira
    const testeD = parseInt(texto2.slice(0,2));
    const testeU = parseInt(texto2.slice(0,1));


    let cartao = document.getElementById("cartao2")
    dadosC = document.querySelector(".dadosCartao2")

    // busca Caixa 
    if(testeU === 4|| testeD === 51|| testeD === 52|| testeD === 53|| testeD === 54|| testeD === 55){
        for(let i=1;i<=6;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        document.getElementById("bandeira6").classList.remove("desligado")
        cartao.style.backgroundColor = "rgb(232, 39, 41)"
        dadosC.style.color = "white"
    }
    // busca Santander
    else if(testeU === 5|| testeU === 6){
        for(let i=1;i<=6;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        document.getElementById("bandeira5").classList.remove("desligado")
        cartao.style.backgroundColor = "rgb(0, 92, 170)"
        dadosC.style.color = "white"
    }
    // se não tiver dados
    else{
        for(let i=1;i<=6;i++){
            document.getElementById("bandeira" + i).classList.add("desligado")
        }
        cartao.style.backgroundColor = "white"
        dadosC.style.color = "black"
    }
}
