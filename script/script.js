const botaoLogin = document.querySelector("[data-botao]");

botaoLogin.addEventListener("click", (evento) => {

    evento.preventDefault();

    const user = document.getElementById('user').value;
    const senha = document.getElementById('password').value;

    if (user == "admin" && senha == "admin") {
        alert('Sucesso');
        location.href = "../index.html";
    }else if (user == "" && senha == "") {
            alert('Preencha Usuário e Senha');
    } else if (user == "") {
        alert('Preencha Usuário');
    }else if (senha == "") {
            alert('Preencha Senha');
    }else{
        alert('Usuario ou senha incorretos');

    }

    return false
})

