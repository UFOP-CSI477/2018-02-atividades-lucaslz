<?php

/* /base/header.html */
class __TwigTemplate_dced71eaa626f763cfa7b4460a875d8a1572cf378b0000fb40e0f2359e000ec2 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <title>Petshop</title>
    <link rel=\"stylesheet\" href=\"dist/css/all.css\">
</head>
<body>
    <header>
        <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
            <a class=\"navbar-brand\" href=\"#\">Petshop</a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavAltMarkup\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNavAltMarkup\">
            <div class=\"navbar-nav justify-content-end\">
                <a class=\"nav-item nav-link\" id=\"produtos\" href=\"#\">Produtos</a>
                <a class=\"nav-item nav-link\" id=\"cliente\" href=\"#\">Área do Cliente</a>
                <a class=\"nav-item nav-link\" id=\"administrador\" href=\"#\">Área do Administrador</a>
            </div>
          </div>
        </nav>
    </header>";
    }

    public function getTemplateName()
    {
        return "/base/header.html";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/base/header.html", "/var/www/2018-02-atividades-lucaslz/CSI-2018-02-atividades-pratica-002-003/templates/base/header.html");
    }
}
