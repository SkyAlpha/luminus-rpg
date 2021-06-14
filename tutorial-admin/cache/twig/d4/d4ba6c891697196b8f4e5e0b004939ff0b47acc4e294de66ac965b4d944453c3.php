<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* flex-objects/types/pages/buttons/delete.html.twig */
class __TwigTemplate_3091df0e21ea01d2b81409cd0759df7713052b1690dccf9996a5d09cd80a240e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<a id=\"titlebar-button-delete\" href=\"#delete\" data-remodal-target=\"delete\" data-delete-url=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => $this->getAttribute($this->getAttribute($this->getAttribute(($context["route"] ?? null), "withoutParams", [], "method"), "withGravParam", [0 => "task", 1 => "delete"], "method"), "getUri", [], "method"), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
        echo "\" class=\"button danger\">
    <i class=\"fa fa-fw fa-trash-o\"></i> ";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DELETE"), "html", null, true);
        echo "
</a>
";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/pages/buttons/delete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<a id=\"titlebar-button-delete\" href=\"#delete\" data-remodal-target=\"delete\" data-delete-url=\"{{ uri.addNonce(route.withoutParams().withGravParam('task', 'delete').getUri(), 'admin-form', 'admin-nonce') }}\" class=\"button danger\">
    <i class=\"fa fa-fw fa-trash-o\"></i> {{ \"PLUGIN_ADMIN.DELETE\"|tu }}
</a>
", "flex-objects/types/pages/buttons/delete.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/pages/buttons/delete.html.twig");
    }
}
