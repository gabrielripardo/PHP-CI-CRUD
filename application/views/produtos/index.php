<html>
<head>  
    <!-- <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?> "> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Loja de informática</title>
</head>
<body>
    <div class="container">
        <h1>Produtos</h1>
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>         
            <tr>
                <td>Notebook Alien</td>
                <td>note gamer com placa de vídeo de alta definição</td>
                <td>R$ 860,00</td>                
            </tr>   
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?= $produto['nome'] ?></td>
                    <td><?= $produto['description'] ?></td>
                    <td><?= $produto['preco']?></td>                   
                </tr>   
            <?php endforeach ?>
        </table>

        <!-- Abrir formulário de novo produto -->
        <?= anchor("produtos/formulario", 
            "Novo Produto", 
            array(
                "class" => "btn btn-primary")) 
        ?>

        <h1>Cadastro</h1>
        <?php


            //Listar produtos
            echo form_open("produtos/novo");

            echo form_label("Nome", "nome");
            echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label("Preço", "preco");
            echo form_input(array(
                "name" => "preco",
                "id" => "preco",
                "class" => "form-control",
                "maxlength" => "255"
            ));            

            echo form_label("Descrição", "descricao");
            echo form_password(array(
                "name" => "descricao",
                "id" => "descricao",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "type" => "submit",
                "content" => "Cadastrar"
            ));
            
            echo form_close();

            
        ?>
    </div>
</body>
</html>
