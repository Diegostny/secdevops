$(document).ready(function() {

    if (document.getElementById('alertAviso')) {
        emitirAviso();
    }

    if (document.getElementById('divFormItem')) {
        loadData();
    }

});

//$('#alertAviso').ready(function() {
//    console.log("Entrou em alertAviso");
//    var texto = $('#alertAviso').attr('aviso');
//    if (texto !== "") {
//        alert("Mensagem:\n" + texto);
//    }
//});

//$('div', '#divFormItem').ready(function() {
//    console.log("Entrou em divFormItem. Chamando loadData...");
//    loadData();
//});

function emitirAviso() {
    var texto = $('#alertAviso').attr('aviso');
    if (texto !== "") {
        alert("Mensagem:\n" + texto);
    }
}

function alterarCadastro(id) {
    $('.inpAlterar' + id).css('background-color', 'rgba(0,0,0,0.1)');
    $('.inpAlterar' + id).css('font-weight', '500');
    $('.inpAlterar' + id).css('color', '#FFFF00');
    $('.inpAlterar' + id).prop('readonly', false);
    $('#idTdAlterar' + id).css('display', 'none');
    $('#idTdCancelar' + id).css('display', 'table-cell');
    $('#idTdEnviar' + id).css('display', 'table-cell');
}

function enviarCadastro(idForm) {
    $.post('/cadastros/update/', $('#' + idForm).serialize()).done(function(data) {
        if (data === '1') {
            console.log("POST SUCCESS. Code returned: " + data);
            loadData();
        } else if (data === '2') {
            console.log("POST returned code: " + data);
            alert('Ocorreu um erro ao salvar os dados.');
        } else {
            alert(data);
            loadData();
        }
    }).fail(console.log("POST FAILED"));
}

function loadData() {
    $.getJSON("/cadastros/getcadastros").done(function(data) {
        $('#divFormItem').find('form').remove();
        var listaIDs = [];
        $.each(data, function(index, item) {
            listaIDs.push(item.id);
            formItem =
                    "<form id='form" + item.id + "' method='POST'>"
                    + "<table class='listaPacientes'>"
                    + "<caption>" + item.nome + "</caption>"
                    + "<tr><td style='width:30%'>Nome:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtNome' value='" + item.nome + "' readonly></td></tr>"
                    + "<tr><td>Nascimento:</td>"
                    + "<td><input type='date' class='inpAlterar" + item.id + "' name='txtNascimento' value='" + item.nascimento + "' readonly></td></tr>"
                    + "<tr><td>Sexo:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtSexo' value='" + item.sexo + "' readonly></td></tr>"
                    + "<tr><td>Data entrada:</td>"
                    + "<td><input type='date' class='inpAlterar" + item.id + "' name='txtDtEntrada' value='" + item.dtEntrada + "' readonly></td></tr>"
                    + "<tr><td class='titulo' colspan='2'>Contatos:</td></tr>"
                    + "<tr><td>Tel+ residencial:</td"
                    + "><td><input type='text' class='inpAlterar" + item.id + "' name='txtTelRes' value='" + item.telRes + "' readonly></td></tr>"
                    + "<tr><td>Tel celular:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtTelCel' value='" + item.telCel + "' readonly></td></tr>"
                    + "<tr><td>Tel+ comercial:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtTelCom' value='" + item.telCom + "' readonly></td></tr>"
                    + "<tr><td>Tel+ adicional:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtTelAd' value='" + item.telAd + "' readonly></td></tr>"
                    + "<tr><td>E-mail:</td>"
                    + "<td><input type='email' class='inpAlterar" + item.id + "' name='txtEmail' value='" + item.email + "' readonly></td></tr>"
                    + "<tr><td class='titulo' colspan='2'>Endereço:</td></tr>"
                    + "<tr><td>Endereço:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtEndereco' value='" + item.endereco + "' readonly></td></tr>"
                    + "<tr><td>Número:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtNumero' value='" + item.numero + "' readonly></td></tr>"
                    + "<tr><td>Cidade:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtCidade' value='" + item.cidade + "' readonly></td></tr>"
                    + "<tr><td>Estado:</td>"
                    + "<td><input type='text' class='inpAlterar" + item.id + "' name='txtEstado' value='" + item.estado + "' readonly></td></tr>"
                    + "<tr><td class='titulo' colspan='2'>Informações:</td></tr>"
                    + "<tr><td colspan='2'>"
                    + "<textarea class='inpAlterar" + item.id + "' name='txtInformacoes' cols='56' rows='05' maxlength='1000' readonly>"
                    + item.info + "</textarea></td></tr>"

                    + "<tr><td class='titulo' id='idTdAlterar" + item.id + "' colspan='2'>"
                    + "<input style='display:none;' type='number' name='txtid' value='" + item.id + "'/>"
                    + "<input type='button' class='btnAlterar' value='Alterar Cadastro' "
                    + " onclick='alterarCadastro(" + item.id + ")'></td></tr>"

                    + "<tr><td class='titulo' id='idTdEnviar" + item.id + "' style='display: none;' colspan='2'>"
                    + "<input type='button' class='btnAlterar' name='submitEnviar' form='form" + item.id + "' "
                    + "value='Enviar' onclick=\"enviarCadastro('form" + item.id + "')\">"

                    + "<input type='button' class='btnAlterar' value='Cancelar' "
                    + " onclick='loadData()'></td></tr>"
                    + "</table>"
                    + "</form>";
            $('#divFormItem').append($(formItem));
        });
        $.each(listaIDs, function(index, id) {
            $('.inpAlterar' + id).css('background-color', '#a7c7c7');
            $('.inpAlterar' + id).css('width', '98%');
            $('.inpAlterar' + id).css('font-size', '12pt');
            $('.inpAlterar' + id).css('border', '0px');
        });
    }).fail(function() {
        console.log("GET FAILED");
    });
}
