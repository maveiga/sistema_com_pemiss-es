<?php
session_start();

    require 'classes/usuarios.class.php';

    require 'config.php';
    require 'classes/documentos.class.php';

    if(!isset($_SESSION['Logado'])){
        header("Location: login.php");
        exit;
    }

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['Logado']);

$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();

?>

<h1>sistema</h1>

<?php if($usuarios->temPermissao('ADD')):?>
<a href="">Adicionar documentos</a></br></br>
<?php endif;?>

<?php if($usuarios->temPermissao('SECRET')):?>
<a href="secreto.php">Pagina secreta</a></br>
<?php endif;?>

<table border="1" width="100%">
    <tr>
        <th>Nome do arquivo</th>
        <th>açoes</th>
    </tr>
    <?php foreach($lista as $item):?>
        <tr>
            <td><?php echo $item['titulo'];?></td>
            <td>
            <?php if($usuarios->temPermissao('EDIT')):?>
                <a href="">Editar</a>
            <?php endif;?>
            <?php if($usuarios->temPermissao('DEL')):?>
                <a href="">Excluir</a>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach;?>
</table>


