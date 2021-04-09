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

/* partials/notification-dashboard-block.html.twig */
class __TwigTemplate_79c87060fae7410f1c12f4ae441c9c725dbdbbaceb92f7927976154b9df369ed extends \Twig\Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["notifications"] ?? null));
        foreach ($context['_seq'] as $context["entry_id"] => $context["entry"]) {
            // line 2
            echo "    <div class=\"alert ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "type", []), "html", null, true);
            echo " position-dashboard\">
        <a href=\"#\" data-notification-action=\"hide-notification\" data-notification-id=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "id", []), "html", null, true);
            echo "\" class=\"close hide-notification\"><i class=\"fa fa-close\"></i></a>
        ";
            // line 4
            echo $this->getAttribute($context["entry"], "message", []);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['entry_id'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "partials/notification-dashboard-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 4,  39 => 3,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% for entry_id, entry in notifications %}
    <div class=\"alert {{ entry.type }} position-dashboard\">
        <a href=\"#\" data-notification-action=\"hide-notification\" data-notification-id=\"{{ entry.id }}\" class=\"close hide-notification\"><i class=\"fa fa-close\"></i></a>
        {{ entry.message|raw }}
    </div>
{% endfor %}
", "partials/notification-dashboard-block.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/notification-dashboard-block.html.twig");
    }
}
