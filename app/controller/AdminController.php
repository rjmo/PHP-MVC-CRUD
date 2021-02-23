<?php
class AdminController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');


        $objPostagens = Postagem::selecionarTodos();

        $parametros = array();
        $parametros['Postagens'] = $objPostagens;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function create()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');


        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;

    }
    public function insert()
    {
        try {
            Postagem::insert($_POST);
            echo '<script>alert("Publicação inserida com sucesso!");</script>';
            echo '<script>location.href="?pagina=admin&metodo=index"</script>';
        } catch (\Throwable $th) {
            echo '<script>alert("'.$th->getMessage().'");</script>';
            echo '<script>location.href="?pagina=admin&metodo=create"</script>';
        }

    }

    public function delete()
    {
        
    }
}