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

/* forms/fields/hidden/hidden.html.twig */
class __TwigTemplate_8af919150f987c4b167f21bd391fccd69c92654b49f875080ccbf8c17b5cad8a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/hidden/hidden.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = [])
    {
        // line 4
        echo "
";
        // line 6
        $context["value"] = (($context["value"]) ?? (((($this->getAttribute(($context["field"] ?? null), "value", [], "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "value", [])))) ? ($this->getAttribute(($context["field"] ?? null), "value", [])) : ((($this->getAttribute(($context["field"] ?? null), "evaluate", [])) ? ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->evaluateStringFunc($context, $this->getAttribute(($context["field"] ?? null), "default", []))) : ($this->getAttribute(($context["field"] ?? null), "default", [])))))));
        // line 7
        echo "
";
        // line 9
        if ((( !($context["has_value"] ?? null) && ($context["value"] ?? null)) && $this->getAttribute(($context["field"] ?? null), "evaluate", []))) {
            // line 10
            echo "    ";
            $context["value"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->evaluateStringFunc($context, ($context["value"] ?? null));
        }
        // line 12
        $context["input_value"] = ((twig_test_iterable(($context["value"] ?? null))) ? (twig_join_filter(($context["value"] ?? null), ",")) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter(($context["value"] ?? null))));
        // line 13
        echo "
<input data-grav-field=\"hidden\" data-grav-disabled=\"false\" ";
        // line 14
        if ($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", []));
            echo "\" ";
        }
        echo "type=\"hidden\" class=\"input\" name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, ($context["input_value"] ?? null), "html_attr");
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "forms/fields/hidden/hidden.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 14,  58 => 13,  56 => 12,  52 => 10,  50 => 9,  47 => 7,  45 => 6,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/field.html.twig\" %}

{% block field %}

{#  Used if the field is being used directly outside of form #}
{% set value = value ?? field.value ?? (field.evaluate ? evaluate(field.default) : field.default) %}

{# Evaluate support for the form #}
{% if not has_value and value and field.evaluate %}
    {% set value = evaluate(value) %}
{% endif %}
{% set input_value = value is iterable ? value|join(',') : value|string %}

<input data-grav-field=\"hidden\" data-grav-disabled=\"false\" {% if field.id is defined %}id=\"{{ field.id|e }}\" {% endif %}type=\"hidden\" class=\"input\" name=\"{{ (scope ~ field.name)|fieldName }}\" value=\"{{ input_value|e('html_attr') }}\" />
{% endblock %}
", "forms/fields/hidden/hidden.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/fields/hidden/hidden.html.twig");
    }
}
