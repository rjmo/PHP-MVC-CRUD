<?php
class Postagem
{
    public static function selecionarTodos()
    {
        $con = Connection::getConn();  
        $sql = "SELECT * FROM postagem ORDER BY idConteudo DESC"; 
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
    
}