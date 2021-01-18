<?php

class Comentario
{
    
    public static function selecionarComentarios($idPost){
        $con = Connection::getConn();
        $sql = "SELECT * FROM comentario WHERE idConteudo = :id ";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultat = array();

        while ($row = $sql->fetchObject('Comentario')){
            $resultat[] = $row;
        }
        return $resultat;
    
    }
}