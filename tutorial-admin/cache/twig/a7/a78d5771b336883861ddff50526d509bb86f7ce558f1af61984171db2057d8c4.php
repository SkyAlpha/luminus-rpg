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

/* partials/messages.html.twig */
class __TwigTemplate_0e47f105a7900bb21bec7990eedcd1bd53629e2daed5eba1192d048213a4a1e0 extends \Twig\Template
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
        $context["type_mapping"] = ["info" => "success", "error" => "error", "warning" => "warning"];
        // line 2
        $context["icon_mapping"] = ["info" => "checkmark", "error" => "wrong", "warning" => "information"];
        // line 3
        echo "
";
        // line 4
        if ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "messages", []), "all", [])) {
            // line 5
            echo "    <div id=\"messages\">
    ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "messages", []), "fetch", []));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 7
                echo "
        ";
                // line 8
                $context["scope"] = twig_escape_filter($this->env, $this->getAttribute($context["message"], "scope", []));
                // line 9
                echo "        ";
                $context["type"] = $this->getAttribute(($context["type_mapping"] ?? null), ($context["scope"] ?? null), [], "array");
                // line 10
                echo "        ";
                $context["icon"] = $this->getAttribute(($context["icon_mapping"] ?? null), ($context["scope"] ?? null), [], "array");
                // line 11
                echo "
        <div class=\"toast toast-";
                // line 12
                echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ($context["scope"] ?? null), "html", null, true);
                echo "\">
            <i class=\"icon dripicons-";
                // line 13
                echo twig_escape_filter($this->env, ($context["icon"] ?? null), "html", null, true);
                echo "\"></i> ";
                echo $this->getAttribute($context["message"], "message", []);
                echo "
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 16,  66 => 13,  60 => 12,  57 => 11,  54 => 10,  51 => 9,  49 => 8,  46 => 7,  42 => 6,  39 => 5,  37 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set type_mapping = {'info':'success', 'error': 'error', 'warning': 'warning'} %}
{% set icon_mapping = {'info':'checkmark', 'error':'wrong', 'warning':'information'} %}

{% if grav.messages.all %}
    <div id=\"messages\">
    {% for message in grav.messages.fetch %}

        {% set scope = message.scope|e %}
        {% set type = type_mapping[scope] %}
        {% set icon = icon_mapping[scope] %}

        <div class=\"toast toast-{{ type }} {{ scope }}\">
            <i class=\"icon dripicons-{{ icon }}\"></i> {{ message.message|raw }}
        </div>
    {% endfor %}
    </div>
{% endif %}", "partials/messages.html.twig", "/Users/jonatan/Downloads/grav-admin/user/themes/quark/templates/partials/messages.html.twig");
    }
}
