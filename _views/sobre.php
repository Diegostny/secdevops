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
        <!-- Inserir código semelhante a este no input. XSS é bloqueado pelo navegador. No IE11 o filtro XSS pode ser desligado.
        '><div style="background-color:#ffff00;height:150px"><marquee style="font-size:48pt">Texto inserido com marquee</marquee></div>
        '><script>document.getElementById("imgdaweb").style.width="100px";</script>
        '><script>document.getElementById("imgdaweb").style.display="none";</script>
        '><script>var x=document.getElementsByTagName("p");x[0].style.color="red";x[0].innerHTML="Texto alterado pelo atacante - XSS"</script>
        -->
        <form method="POST">
            <input type="text" name="origem" value='<?php echo (empty($strImagem)) ? "" : $strImagem; ?>'/>            
            <input type="submit" name="btnEnviar" value="Enviar"/>
        </form>
        <br>
        <img id='imgdobanco' src='<?php echo (isset($imagem['url'])) ? $imagem['url'] : $strImagem; ?>' 
             alt='Imagem com origem no banco ou input text' width='480' border='0' />
    </div>
</div>
