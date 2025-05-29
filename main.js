// Espere o DOM carregar completamente
document.addEventListener('DOMContentLoaded', function() {
    // Obtenha referências aos elementos
    const formCadastro = document.getElementById('formCadastro');
    const resultadoDiv = document.getElementById('resultado');
    const listaPessoasDiv = document.getElementById('listaPessoas');

    // Verifique se os elementos existem
    if (!formCadastro || !resultadoDiv || !listaPessoasDiv) {
        console.error("Elementos não encontrados no DOM");
        return;
    }

    // Atribua as funções ao escopo global
    window.cadastrarPessoa = function() {
        const formData = new FormData(formCadastro);

        fetch('cadastrar.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            resultadoDiv.innerText = data;
            atualizarLista();
            formCadastro.reset();
        })
        .catch(error => {
            console.error("Erro ao cadastrar:", error);
            resultadoDiv.innerText = "Erro ao cadastrar.";
        });
    };

    window.limparCadastro = function() {
        if (confirm("Deseja realmente apagar todos os cadastros?")) {
            fetch('limpar.php')
            .then(response => response.text())
            .then(data => {
                resultadoDiv.innerText = data;
                atualizarLista();
            })
            .catch(error => {
                console.error("Erro ao limpar:", error);
                resultadoDiv.innerText = "Erro ao limpar.";
            });
        }
    };

    function atualizarLista() {
        fetch('listar.php')
        .then(response => response.text())
        .then(data => {
            listaPessoasDiv.innerHTML = data;
        })
        .catch(error => {
            console.error("Erro ao atualizar a lista:", error);
        });
    }

    // Atualize a lista quando a página carregar
    atualizarLista();
});