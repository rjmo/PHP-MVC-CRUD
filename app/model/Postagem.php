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
        }
        return $resultat;

    }

    
}