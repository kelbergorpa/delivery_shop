function getEstados() {
    $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados', function (estados = []) {
        let value = "<option value=\"\" selected>Selecione</option>";
        estados.sort((a, b) => {
            if(a.nome.charCodeAt(0) == b.nome.charCodeAt(0)) {
                return 0;
            } else if(a.nome.charCodeAt(0) < b.nome.charCodeAt(0)) {
                return -1;
            } else { 
                return 1;
            }
        });
        for (let i = 0; i < estados.length; i++) {
            value += `<option value = ${estados[i].id}>${estados[i].nome}</option>`;
        }
        document.getElementById("labelEstados").innerHTML = value;
    });
    aviso();
}

function getCidades() {
    var id_estado = $('#labelEstados').val();
    if (id_estado != "") {
        $.getJSON(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${id_estado}/municipios`, function (cidades) {
            // cidades é um array de cidades do estado
            let value = "<option value=\"\" selected>Selecione</option>";
            cidades.sort((a, b) => {
                if(a.nome.charCodeAt(0) == b.nome.charCodeAt(0)) {
                    return 0;
                } else if(a.nome.charCodeAt(0) < b.nome.charCodeAt(0)) {
                    return -1;
                } else { 
                    return 1;
                }
            });
            for (let i = 0; i < cidades.length; i++) {
                value += `<option value = ${cidades[i].id}>${cidades[i].nome}</option>`;
            }
            document.getElementById("labelCidade").innerHTML = value;
        });
    }else{
        let value = "<option value=\"\" selected>Selecione</option>";
        document.getElementById("labelCidade").innerHTML = value;

    }

}