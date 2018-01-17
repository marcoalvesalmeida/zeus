<?php
 session_start();
ini_set( 'display_errors', 0 );
include_once "conexao.php";
if(!isset($_SESSION["autenticado"]))
{
    header("location:/ZEUS/site/examples/login");
}    
/******
 * Upload de imagens
 ******/

if(isset($_GET['id'])){
    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
        echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
     
        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];
     
        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
     
        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );
     
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;
     
            // Concatena a pasta com o nome
            $destino = 'imagens/' . $novoNome;
     
            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                echo ' < Destino da imagem: "' . $destino . '" />';
                $ide = $_GET['id'];
                $sql = $con->prepare("INSERT INTO img VALUES(DEFAULT,'$novoNome','$destino','$ide')");
                $sql->execute();
               header('Location: fotos_per.php?op=atualizar_fotos&zeus='.$ide);      
            }
            else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        }
        else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
    else{
        echo 'Você não enviou nenhum arquivo!';
        header('Location: index.php'); 
    }   

}else{
 
    // verifica se foi enviado um arquivo

    if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
        echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
     
        $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
        $nome = $_FILES[ 'arquivo' ][ 'name' ];
     
        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
     
        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );
     
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;
     
            // Concatena a pasta com o nome
            $destino = 'imagens/' . $novoNome;
     
            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                echo ' < Destino da imagem: "' . $destino . '" />';
                $ide = $_SESSION['id'];
                $sql = $con->prepare("INSERT INTO img VALUES(DEFAULT,'$novoNome','$destino','$ide')");
                $sql->execute();
                $_SESSION['id'] = $ide;   
                header('Location: persistir.php');      
            }
            else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        }
        else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
    else{
        echo 'Você não enviou nenhum arquivo!';
        header('Location: index.php'); 
    }   
} 
?>