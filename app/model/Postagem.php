<?php
class Postagem
{
    public static function selecionarTodos()
    {
        $con = Connection::getConn();  
        $sql = "SELECT * FROM postagem ORDER BY id DESC"; 
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultat = array();

        while ($row = $sql->fetchObject("Postagem")){
            $resultat[] = $row;
        }
        if (!$resultat) {
            throw new Exception("Não foi encontrado nenhuma postagem.");
            
        }
        return $resultat;
    }

    public static function selecionarPoId($idPost)
    {
        $con = Connection::getConn();  
        $sql = "SELECT * FROM postagem WHERE id = :id"; 
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();


        $resultat = $sql->fetchObject('Postagem');

        if (!$resultat) {
            throw new Exception("Não encontrado.");
        }else{
            $resultat->comentarios = Comentario::selecionarComentarios($resultat->id);
            
        }
        return $resultat;

    }

    public static function insert($dadosPost)
    {
        if (empty($dadosPost['titulo']) or empty($dadosPost['conteudo'])) {
            throw new Exception("Preencha todos os campos!");
            return false;
        }
        $con = Connection::getConn();

        $sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)');
        $sql->bindValue(':tit', $dadosPost['titulo']);
        $sql->bindValue(':cont', $dadosPost['conteudo']);
        $res = $sql->execute();


        if ($res == 0) {
            throw new Exception("Falha ao inserir publicação");
            return false;
        }

        return true;
    }
    
}