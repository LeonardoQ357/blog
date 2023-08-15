<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysql.php';
    require_once '../core/mysql.php';
    require_once '../core/sql.php';

    insert_teste('8','Passou','5','1');
    select_teste();
    update_teste(2,'5','Nao passou');
    select_teste();
    delete_teste(2);
    select_teste();


    function insert_teste($nota, $comentario, $user_id, $post_id) : void
    {
        $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $user_id, 'post_id' => $post_id];
        insere('avaliacao', $dados);
    }

    function select_teste() : void
    {
        $usuarios = buscar('avaliacao', ['id', 'nota', 'comentario', 'usuario_id', 'post_id', 'data_criacao'], [], '');
        print_r($usuarios);
    }

    function update_teste($id, $nota, $comentario) : void
    {
        $dados = ['nota' => $nota, 'comentario' => $comentario];
        $criterio = [['id', '=', $id]];
        atualiza('avaliacao', $dados, $criterio);
    }

    function delete_teste($id) : void
    {
        $criterio = [['id', '=', $id]];
        deleta('avaliacao', $criterio);
    }
?>