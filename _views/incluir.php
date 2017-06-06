<div id="incluirView">
    <p align="center">
        Necessário estar logado para visualizar este conteúdo.</br>Apenas a função admin (0) ou médico (1) possuem acesso.
    </p>
    <p><center><a id="novoFuncionario" href="/login/cadastrar">Cadastrar Funcionário</a></center></p>
<h2>Cadastro de entrada de paciente</h2>
<form method="POST" id="formContato" accept-charset="UTF-8">
    <fieldset id="usuario"><legend>Identificação</legend>
        <p><label for="idNome">Nome:</label>
            <input id="idNome" type="text" name="txtNome" size="40" maxlength="50" placeholder="nome completo" required/>
        </p>
        <p><label for="idNascimento">Data de Nascimento:</label>
            <input id="idNascimento" type="date" min="1900-01-01" name="txtNascimento" required/>
        </p>
        <p><label for="idSexo">Sexo:</label>
            <input id="idSexo" type="text" name="txtSexo" size="20" maxlength="20" required/>
        </p>
        <p><label for="iddtentrada">Data de entrada:</label>
            <input id="iddtentrada" type="date" name="txtDtEntrada" value="<?php echo date('Y-m-d'); ?>"/>
        </p>
    </fieldset>

    <fieldset id="contatos"><legend>Contatos</legend>
        <fieldset id="telefones"><legend>Telefones</legend>
            <table>
                <tr><td><label for="idTelRes">Residencial:</label></td>
                    <td><input id="idTelRes" type="text" name="txtTelRes" size="18" maxlength="11" placeholder="telefone residencial"/></td>
                <tr><td><label for="idTelCel">Celular:</label></td>
                    <td><input id="idTelCel" type="text" name="txtTelCel" size="18" maxlength="11" placeholder="telefone celular principal"/></td>
                <tr><td><label for="idTelCom">Comercial:</label></td>
                    <td><input id="idTelCom" type="text" name="txtTelCom" size="18" maxlength="11" placeholder="telefone comercial"/></td>
                <tr><td><label for="idTelAd">Adicional:</label></td>
                    <td><input id="idTelAd" type="text" name="txtTelAd" size="18" maxlength="11" placeholder="telefone adicional"/></td>
            </table>
        </fieldset>
        <p><label for="idEmail">E-mail:</label>
            <input id="idEmail" type="email" name="txtEmail" size="30" maxlength="50" placeholder="email"/>
        </p>
    </fieldset>

    <fieldset id="endereco"><legend>Endereço</legend>
        <p><label for="idEndereco">Logradouro:</label>
            <input id="idEndereco" type="text" name="txtEndereco" size="20" maxlength="50" placeholder="rua, avenida, travessa..."/>
        </p>
        <p><label for="idNumero">Número:</label>
            <input id="idNumero" type="number"  name="txtNumero" min="0" max="99999"/>
        </p>
        <p><label for="idEstado">Estado:</label>
            <select id="idEstado" name="txtEstado">
                <optgroup label="Sul">
                    <option value="PR">PR</option>
                    <option value="RS" selected>RS</option>
                    <option value="SC">SC</option>
                </optgroup>
                <optgroup label="Sudeste">
                    <option value="ES">ES</option>
                    <option value="MG">MG</option>
                    <option value="RJ">RJ</option>
                    <option value="SP">SP</option>
                </optgroup>
            </select>
        </p>
        <p><label for="idCidade">Cidade:</label>
            <input id="idCidade" type="text" name="txtCidade" size="20" maxlength="30" placeholder="cidade"
                   list="listaCidades" required/>
            <datalist id="listaCidades">
                <option value="São Leopoldo"></option>
                <option value="Novo Hamburgo"></option>
                <option value="Porto Alegre"></option>
                <option value="Esteio"></option>
                <option value="Canoas"></option>
                <option value="Dois Irmãos"></option>
                <option value="Ivoti"></option>
                <option value="Sapucaia do Sul"></option>
            </datalist>
        </p>
    </fieldset>
    <fieldset id="mensagem"><legend>Informações importantes</legend>
        <p><label for="idMensagem">Mensagem:</label><br/>
            <textarea id="idMensagem" class="txMensagem" name="txtInformacoes" cols="56" rows="10" maxlength="1000"
                      placeholder="Digite aqui informações importantes sobre o paciente."></textarea>
        </p>
    </fieldset>
    <center><input id="btnEnviar" type="submit" name="submitenviar" value="Enviar"/></center>
</form>

</div>