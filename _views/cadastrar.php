<div id="loginView">
    <fieldset><legend>Novo Funcionário</legend>
        <form id="formLogin" method="POST">
            <label>Nome:</label><br/>
            <input type="text" name="nome" maxlength="50" placeholder="Informe seu nome" autofocus/><br/><br/>
            <label>Email:</label><br/>
            <input type="email" name="email" maxlength="50" placeholder="Informe seu e-mail"/>
            <br/><br/>
            <label>Função:</label></br>
            <input type="radio" class="inpradio" id="rdfuncaoM" name="funcao" value="1"/><label for="rdfuncaoM">Médico</label>
            <input type="radio" class="inpradio" id="rdfuncaoF" name="funcao" value="2" checked/><label for="rdfuncaoF">Enfermeiro</label>
            </br></br>
            <label>Senha:</label><br/>
            <input type="password" name="senha1" size="15" placeholder="Informe uma senha"/>
            <br/><br/>
            <label>Repita a senha:</label><br/>
            <input type="password" name="senha2" size="15" placeholder="Digite novamente"/>
            <br/><br/>
            <input id="btnlogin" type="submit" name="cadastrar" value="Cadastrar"/>
        </form>
    </fieldset>

    <center><a id="voltar" href="javascript:window.history.go(-1)">Voltar</a></center>

</div>