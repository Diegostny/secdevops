<div class="sobreView">
    <h2>View: <?php echo $viewName ?></h2>
    <p>Página com acesso público.</p>
    <p>
    </p>
    <div style="text-align: center">
        <h2>Imagem fixa de https://unsplash.it</h2>
        <img id='imgdaweb' src='https://unsplash.it/0/0?image=10' 
             alt='Imagem aleatória de unsplash.it' width='480' border='0' />
        <hr>
        <h2>Imagem aleatória do banco</h2>
        Endereço da imagem:
        <form method="POST">
            <input type="text" name="origem" value='<?php echo (empty($strImagem)) ? "" : $strImagem; ?>'/>            
            <input type="submit" name="btnEnviar" value="Enviar"/>
        </form>
        <br>
        <img id='imgdobanco' src='<?php echo (isset($imagem['url'])) ? $imagem['url'] : $strImagem; ?>' 
             alt='Imagem com origem no banco ou input text' width='480' border='0' />
    </div>
</div>
