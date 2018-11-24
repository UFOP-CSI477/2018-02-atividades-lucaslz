<?php

/* produtos.html */
class __TwigTemplate_e212781eda70d25445b9b4553a8fb8f540f9492a710588b786840dbce2739ad7 extends Twig_Template
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
        echo twig_include($this->env, $context, "/base/header.html");
        echo "
    <main>
        ";
        // line 3
        echo twig_escape_filter($this->env, ($context["dados"] ?? null), "html", null, true);
        echo "
        <?php var_dump(\$dados); ?>
        <div class=\"container\">
            <div class=\"row mt-5\">
                <div class=\"col-md-8 offset-2 justify-content-center text-center\">
                    <table class=\"table table-hover\">
                        <thead class=\"thead-dark\">
                            <tr>
                                <th>Nome</th>
                                <th>Foto</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Macarrão</td>
                                <td>Teste</td>
                                <td>0,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </main>
";
        // line 28
        echo twig_include($this->env, $context, "/base/rodape.html");
    }

    public function getTemplateName()
    {
        return "produtos.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 28,  28 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "produtos.html", "/var/www/2018-02-atividades-lucaslz/CSI-2018-02-atividades-pratica-002-003/templates/produtos.html");
    }
}
