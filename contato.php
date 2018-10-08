<?php 
    global $tituloPagina;
    $tituloPagina = "Contato";
    include('partes/cabecalho.php');

    $nome = '';
    $email = '';
    $mensagem = '';
    $erroFormulario = '';
    $sucessoFormulario = '';
    if( isset($_POST['submit']) ){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        if(
            $nome != '' 
            && $email != ''
            && $mensagem != '')
        {
            // usuario preencheu corretamente
            $mensagemEmail = 'Nome: ' . $nome . ' - ';
            $mensagemEmail = 'Email: ' . $email . ' - ';
            $mensagemEmail = 'Mensagem: ' . $mensagem;
            if(mail('renangasperi@gmail.com', 'Mensagem de contato', $mensagemEmail)){
                // email enviado
                $sucessoFormulario = 'Mensagem enviada com sucesso!';
            }
            else{
                //email nao enviado
                $erroFormulario = 'Falha ao enviar a mensagem, tente mais tarde ou através do e-mail xxx@xxx.com';
            }
        }
        else{
            // usuário não preencheu todos os campos
            $erroFormulario = "Por favor verifique o preenchimento dos campos";
        }
    }
?>
    <header class="pagina-cabecalho">
        <h1 class="pagina-cabecalho__titulo">Contato</h1>
    </header>   
    <section class="pagina-conteudo container">
        <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem, totam esse veritatis ipsa dicta quos dolorem quasi. Ducimus, ullam? Voluptatem sapiente dignissimos similique. Reprehenderit deleniti repellat ipsam repudiandae saepe a?</p>
        <form action="#contato.php" class="formulario" method="post">
            <?php if($erroFormulario != ''): ?>
               <div class="formulario__erro">
                   <?php echo $erroFormulario ?>
               </div> 
            <?php endif;?>
            <?php if($sucessoFormulario != ''): ?>
               <div class="formulario__sucesso">
                   <?php echo $sucessoFormulario ?>
               </div> 
            <?php endif;?>
            
            <div class="formulario__grupo formulario__grupo--coluna-esq">
                <label class="formulario_label" for="nome">Nome</label><br>
                <input class="formulario__campo" type="text" name="nome" id="nome">
            </div>
            <div class="formulario__grupo formulario__grupo--coluna-dir">
                <label class="formulario_label" for="email">E-mail</label><br>
                <input class="formulario__campo" type="email" name="email" id="email">
            </div>
            <div class="formulario__grupo">
                <label class="formulario_label" for="mensagem">Mensagem</label><br>
                <textarea class="formulario__campo" name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" class="formulario__botao" value="Enviar" name="submit">
        </form>
        <p class="text-center">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>
            Et tempore odit excepturi incidunt suscipit dignissimos delectus explicabo id,<br>
            corporis ratione similique quos omnis fugiat laudantium quam. Ut fugiat perspiciatis eum!
        </p>
    </section>
    <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14645.969106425955!2d-51.9209876!3d-23.406578!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd0e12b93f16b%3A0xce21c0532f0b8c44!2sParque+Alfredo+Werner+Nyffeler!5e0!3m2!1spt-BR!2sbr!4v1527802369001" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
<?php include('partes/rodape.php'); ?>