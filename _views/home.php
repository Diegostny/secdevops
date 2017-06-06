<div id="homeView">
    <h2>View: <?php echo $viewName ?></h2>
    <p>Página com acesso público.</p>
    <div>
        <?php
        if (isset($_SESSION["logged"]) && !empty($_SESSION["uid"])) {
            echo "<p>Sessão estabelecida com o ID: " . $_SESSION['uid'] . "</p>";
        }
        echo "<hr><pre>";
        echo "Valores configurados para a sessão: ";
        print_r($_SESSION);
        echo "<br><br>";

//        session_set_cookie_params(30);
//        session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);

        echo "Paramentros do PHP para a sessão: ";
        print_r(session_get_cookie_params());
        echo "Status: " . session_status() . "<br>";
        echo "_DISABLED = 0, _NONE = 1, _ACTIVE = 2";
        echo "<br><br>";

        echo "session_name: ";
        print_r(session_name());
        echo "<br>";
        echo "session_id: ";
        print_r(session_id());
        echo "<br><br>";
        
        echo "</pre><hr>";


        if (empty($_SESSION['count'])) {
            $_SESSION['count'] = 1;
        } else {
            $_SESSION['count'] ++;
        }
        ?>
        <p>
            Olá visitante, você acessou esta página <?php echo $_SESSION['count']; ?> vezes.
        </p>
        <p>
            Para continuar, <a href="sobre.php?<?php echo htmlspecialchars(SID); ?>">clique aqui</a>.
        </p>
        <p>
        Com session.use_strict_mode=On, um ID de sessão que não tenha sido inicializado não será aceito. 
        O módulo de sessão cria um novo ID de sessão sempre que o ID de sessão não tenha sido inicializado pelo módulo de sessão.
        <a href="http://php.net/manual/pt_BR/features.session.security.management.php">Fonte</a>
        </p>
    </div>
</div>