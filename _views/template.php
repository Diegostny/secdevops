<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta lang="BR" charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="<?php echo URL_BASE; ?>/_assets/css/style.css">
        <script type="text/javascript" src="<?php echo URL_BASE; ?>/_assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_BASE; ?>/_assets/js/script.js"></script>
        <title>Sistema de Atendimento</title>
    </head>
    <body>
        <header>
            <nav id="menu">
                <div id="menubtn">
                    <ul>
                        <a href="/"><li>Home</li></a>
                        <a href="/sobre"><li>Sobre</li></a>
                        <a href="/cadastros"><li>Visualizar</li></a>
                        <a href="/incluir"><li>Cadastrar</li></a>
                    </ul>
                </div>
                <div id="menuusuario">
                    <?php
                    echo isset($_SESSION['username']) ? $_SESSION['username'] . "&nbsp; &nbsp;" .
                            "<a href='/login/sair'>Sair</a>" : "";
                    ?>
                </div>
            </nav>
        </header>
        <main>
            <div id="container">
                <?php
                $this->loadViewTemplate($viewName, $dados);
                ?>
            </div>
            <p id="alertAviso" aviso="<?php echo (isset($aviso)) ? $aviso : ""; ?>"></p>
        </main>
        <footer>
            <p>Sistema de atendimento médico. 2017</p>
        </footer>
    </body>
</html>