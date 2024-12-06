function mostrarSenha() {
    var inputPass = document.getElementById('senha')
    var btnShowPass = document.getElementById('btn-senha')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text')
        btnShowPass.classList.replace('bi-eye-fill','bi-eye-slash-fill')
    }else{
        inputPass.setAttribute('type', 'password')
        btnShowPass.classList.replace('bi-eye-slash-fill','bi-eye-fill')
    }
} 

let trilho = document.getElementById('trilho')

trilho.addEventListener('click', ()=>{
    trilho.classList.toggle('dark')
    body.classList.toggle('dark')
})

function logar() {

    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;

    if(login == "adm@gmail.com" && senha == "adm123"){
    alert('Sucesso');
    location.href = "home.html";
    } else{
    alert('Usuario ou senha incorretos');
    }
} 


