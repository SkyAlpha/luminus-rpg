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

/* flex-objects/types/pages/buttons/nav-parent.html.twig */
class __TwigTemplate_f04cddaea14688429099bb3310af7da1d1e9e1cba80168a206135e98a6d4a1fd extends \Twig\Template
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
        if (($context["parent_url"] ?? null)) {
            // line 2
            echo "<a id=\"titlebar-button-nav-parent\" class=\"button\" href=\"";
            echo twig_escape_filter($this->env, ($context["parent_url"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "\">
    <i class=\"fa fa-chevron-up\"></i>
</a>
";
        } else {
            // line 6
            echo "    <span class=\"button disabled\">
        <i class=\"fa fa-chevron-up\"></i>
    </span>
";
        }
    }

    public function getTemplateName()
    {
        return "flex-objects/types/pages/buttons/nav-parent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 6,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if parent_url %}
<a id=\"titlebar-button-nav-parent\" class=\"button\" href=\"{{ parent_url }}\" title=\"{{ title }}\">
    <i class=\"fa fa-chevron-up\"></i>
</a>
{% else %}
    <span class=\"button disabled\">
        <i class=\"fa fa-chevron-up\"></i>
    </span>
{% endif %}
", "flex-objects/types/pages/buttons/nav-parent.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/pages/buttons/nav-parent.html.twig");
    }
}
