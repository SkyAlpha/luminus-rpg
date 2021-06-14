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

/* forms/fields/datetime/datetime.html.twig */
class __TwigTemplate_ec43011e9ab9f7b363dbaca8dd49033445be9e2a6a7db9703aa76e3fa7c055bf extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'input' => [$this, 'block_input'],
            'input_attributes' => [$this, 'block_input_attributes'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["value"] = (((null === ($context["value"] ?? null))) ? ($this->getAttribute(($context["field"] ?? null), "default", [])) : (($context["value"] ?? null)));
        // line 4
        $context["default_php_dateformat"] = $this->getAttribute(($context["admin"] ?? null), "guessDateFormat", [0 => ($context["value"] ?? null)], "method");
        // line 5
        $context["php_dateformat"] = (($this->getAttribute(($context["field"] ?? null), "format", [])) ? ($this->getAttribute(($context["field"] ?? null), "format", [])) : (((((($context["form"] ?? null)) ? ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "object", []), "dateformat", [])) : ($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "page", []), "dateformat", [])))) ? (((($context["form"] ?? null)) ? ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "object", []), "dateformat", [])) : ($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "page", []), "dateformat", [])))) : ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "pages", []), "dateformat", []), "default", [])) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "pages", []), "dateformat", []), "default", [])) : (($context["default_php_dateformat"] ?? null)))))));
        // line 6
        $context["js_dateformat"] = $this->getAttribute(($context["admin"] ?? null), "dateformatToMomentJS", [0 => ($context["php_dateformat"] ?? null)], "method");
        // line 7
        $context["value"] = (((null === ($context["value"] ?? null))) ? (($context["value"] ?? null)) : (twig_date_format_filter($this->env, ($context["value"] ?? null), ($context["php_dateformat"] ?? null))));
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/datetime/datetime.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_input($context, array $blocks = [])
    {
        // line 10
        echo "<div class=\"form-input-wrapper datetime-picker-wrapper ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
        echo "\">
    ";
        // line 11
        $context["input_value"] = ((twig_test_iterable(($context["value"] ?? null))) ? (twig_join_filter(($context["value"] ?? null), ",")) : ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->stringFilter(($context["value"] ?? null))));
        // line 12
        echo "    <input
            name=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
            value=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["input_value"] ?? null), "html", null, true);
        echo "\"
            ";
        // line 15
        $this->displayBlock('input_attributes', $context, $blocks);
        // line 22
        echo "    />
    <span class=\"field-icons\">
        <i class=\"fa fa-fw fa-calendar\"></i>
    </span>
</div>
";
    }

    // line 15
    public function block_input_attributes($context, array $blocks = [])
    {
        // line 16
        echo "                type=\"text\"
                data-grav-datetime=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_jsonencode_filter(["format" => ($context["js_dateformat"] ?? null)]), "html_attr");
        echo "\"
                ";
        // line 18
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", [])) {
            echo "min=\"";
            echo twig_escape_filter($this->env, (((null === $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", []))) ? ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", [])) : (twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", []), ($context["php_dateformat"] ?? null)))), "html", null, true);
            echo "\"";
        }
        // line 19
        echo "                ";
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", [])) {
            echo "max=\"";
            echo twig_escape_filter($this->env, (((null === $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", []))) ? ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", [])) : (twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", []), ($context["php_dateformat"] ?? null)))), "html", null, true);
            echo "\"";
        }
        // line 20
        echo "                ";
        $this->displayParentBlock("input_attributes", $context, $blocks);
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "forms/fields/datetime/datetime.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 20,  99 => 19,  93 => 18,  89 => 17,  86 => 16,  83 => 15,  74 => 22,  72 => 15,  68 => 14,  64 => 13,  61 => 12,  59 => 11,  54 => 10,  51 => 9,  46 => 1,  44 => 7,  42 => 6,  40 => 5,  38 => 4,  36 => 3,  30 => 1,);
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

{% set value = (value is null ? field.default : value) %}
{% set default_php_dateformat = admin.guessDateFormat(value) %}
{% set php_dateformat = field.format ?: (form ? form.object.dateformat : admin.page.dateformat) ?: config.system.pages.dateformat.default ?: default_php_dateformat %}
{% set js_dateformat = admin.dateformatToMomentJS(php_dateformat) %}
{% set value = (value is null ? value : value|date(php_dateformat)) %}

{% block input %}
<div class=\"form-input-wrapper datetime-picker-wrapper {{ field.size }}\">
    {% set input_value = value is iterable ? value|join(',') : value|string %}
    <input
            name=\"{{ (scope ~ field.name)|fieldName }}\"
            value=\"{{ input_value }}\"
            {% block input_attributes %}
                type=\"text\"
                data-grav-datetime=\"{{ {'format': js_dateformat} | json_encode | e('html_attr') }}\"
                {% if field.validate.min %}min=\"{{ (field.validate.min is null ? field.validate.min : field.validate.min|date(php_dateformat)) }}\"{% endif %}
                {% if field.validate.max %}max=\"{{ (field.validate.max is null ? field.validate.max : field.validate.max|date(php_dateformat)) }}\"{% endif %}
                {{ parent() }}
            {% endblock %}
    />
    <span class=\"field-icons\">
        <i class=\"fa fa-fw fa-calendar\"></i>
    </span>
</div>
{% endblock %}
", "forms/fields/datetime/datetime.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/forms/fields/datetime/datetime.html.twig");
    }
}
