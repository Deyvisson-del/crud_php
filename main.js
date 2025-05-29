function cadastrarPessoa() {
    const form = document.getElementById('formCadastro');
    const formData = new FormData(form);

    fetch('cadastrar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('resultado').innerText = data;
        atualizarLista();
        form.reset();
    })
    .catch(error => {
        console.error("Erro ao cadastrar:", error);
        document.getElementById('resultado').innerText = "Erro ao cadastrar.";
    });
}

function limparCadastro() {
    if (confirm("Deseja realmente apagar todos os cadastros?")) {
        fetch('limpar.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerText = data;
            atualizarLista();
        })
        .catch(error => {
            console.error("Erro ao limpar:", error);
            document.getElementById('resultado').innerText = "Erro ao limpar.";
        });
    }
}

function atualizarLista() {
    fetch('listar.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('listaPessoas').innerHTML = data;
    })
    .catch(error => {
        console.error("Erro ao atualizar a lista:", error);
    });
}
