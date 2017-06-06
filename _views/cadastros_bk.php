<div id="cadastrosView">
    <h2>View: <?php echo $viewName ?></h2>
    <p>
        Necessário estar logado para visualizar este conteúdo. Não restringe por função.
    </p>
    <h2>Lista de pacientes</h2>
    <?php
    foreach ($listaPac as $p) {
        echo "<table class='listaPacientes'>";
        echo "<caption>" . $p['nome'] . "</caption>";
        echo "<tr><td style='width:30%;'>Nascimento:</td><td>" . $p['nascimento'] . "</td></tr>";
        echo "<tr><td>Sexo:</td><td>" . $p['sexo'] . "</td></tr>";
        echo "<tr><td>Data entrada:</td><td>" . $p['dtEntrada'] . "</td></tr>";
        echo "<tr><td class='titulo' colspan='2'>Contatos:</td></tr>";
        echo "<tr><td>Tel. residencial:</td><td>" . $p['telRes'] . "</td></tr>";
        echo "<tr><td>Tel celular:</td><td>" . $p['telCel'] . "</td></tr>";
        echo "<tr><td>Tel. comercial:</td><td>" . $p['telCom'] . "</td></tr>";
        echo "<tr><td>Tel. adicional:</td><td>" . $p['telAd'] . "</td></tr>";
        echo "<tr><td>E-mail:</td><td>" . $p['email'] . "</td></tr>";
        echo "<tr><td class='titulo' colspan='2'>Endereço:</td></tr>";
        echo "<tr><td>Endereço:</td><td>" . $p['endereco'] . ", " . $p['numero'] . "</td></tr>";
        echo "<tr><td>Cidade/Estado:</td><td>" . $p['cidade'] . "/" . $p['estado'] . "</td></tr>";
        echo "<tr><td class='titulo' colspan='2'>Informações:</td></tr>";
        echo "<tr><td colspan='2'>Importante: " . $p['info'] . "</td></tr>";
        echo "<tr><td class='titulo' colspan='2'>"
        . "<form action='/alterar' method='POST'>"
        . "<input style='display:none;' type='number' name='id' value='" . $p['id'] . "'/>"
        . "<input class='btnAlterar' type='submit' name='submit' value='Alterar Cadastro'/>"
        . "</form></td></tr>";
        echo "</table>";
    }
    ?>
</div>