

function showHistorico(){
    document.getElementById('historico').classList.add('visivel');
    document.getElementById('box').classList.add('fundo');
   
}

function editarCatalogo(){
    document.getElementById('catalogo').classList.add('visivel');
    document.getElementById('box').classList.add('fundo');

}
function editarPerfil(){
    document.getElementById('perfil').classList.add('visivel');
    document.getElementById('box').classList.add('fundo');
}

function abrirPedido(){
    document.getElementById('pedidodetalhado').classList.add('visivel');
    document.getElementById('box').classList.add('fundo');
}

function fecharAba(){
    document.getElementById('pedidodetalhado').classList.remove('visivel');
    document.getElementById('historico').classList.remove('visivel');
    document.getElementById('catalogo').classList.remove('visivel');
    document.getElementById('perfil').classList.remove('visivel');
    document.getElementById('box').classList.remove('fundo');
}

