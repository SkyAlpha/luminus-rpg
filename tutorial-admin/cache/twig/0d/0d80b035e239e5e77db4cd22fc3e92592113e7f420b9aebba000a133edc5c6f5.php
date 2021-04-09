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

/* forms/fields/checkboxes/checkboxes.html.twig */
class __TwigTemplate_525868e81acc559d3ccba8596815f5172ecb28a8acb6cf846c21829fea1ac695 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'global_attributes' => [$this, 'block_global_attributes'],
            'input' => [$this, 'block_input'],
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
        $context["originalValue"] = ($context["value"] ?? null);
        // line 4
        $context["value"] = (((null === ($context["value"] ?? null))) ? ($this->getAttribute(($context["field"] ?? null), "default", [])) : (($context["value"] ?? null)));
        // line 5
        if ((($this->getAttribute(($context["field"] ?? null), "use", []) == "keys") && $this->getAttribute(($context["field"] ?? null), "default", []))) {
            // line 6
            $context["value"] = twig_array_merge($this->getAttribute(($context["field"] ?? null), "default", []), ($context["value"] ?? null));
        }
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/checkboxes/checkboxes.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 10
        echo "    ";
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
    data-grav-keys=\"";
        // line 11
        echo ((($this->getAttribute(($context["field"] ?? null), "use", []) == "keys")) ? ("true") : ("false"));
        echo "\"
    data-grav-field-name=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
";
    }

    // line 15
    public function block_input($context, array $blocks = [])
    {
        // line 16
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "options", []));
        foreach ($context['_seq'] as $context["key"] => $context["text"]) {
            // line 17
            echo "
        ";
            // line 18
            $context["id"] = (($this->env->getExtension('Grav\Common\Twig\TwigExtension')->inflectorFilter("hyphen", (($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "id", []), $this->getAttribute(($context["field"] ?? null), "name", []))) : ($this->getAttribute(($context["field"] ?? null), "name", [])))) . "-") . $context["key"]);
            // line 19
            echo "        ";
            $context["name"] = ((($this->getAttribute(($context["field"] ?? null), "use", []) == "keys")) ? ($context["key"]) : (($context["id"] ?? null)));
            // line 20
            echo "        ";
            $context["val"] = ((($this->getAttribute(($context["field"] ?? null), "use", []) == "keys")) ? ("1") : ($context["key"]));
            // line 21
            echo "        ";
            $context["checked"] = ((($this->getAttribute(($context["field"] ?? null), "use", []) == "keys")) ? ($this->getAttribute(($context["value"] ?? null), $context["key"], [], "array")) : (twig_in_filter($context["key"], ($context["value"] ?? null))));
            // line 22
            echo "        ";
            $context["help"] = ((twig_in_filter($context["key"], twig_get_array_keys_filter($this->getAttribute(($context["field"] ?? null), "help_options", [])))) ? ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "help_options", []), $context["key"], [], "array")) : (false));
            // line 23
            echo "
        <div class=\"checkboxes ";
            // line 24
            echo twig_escape_filter($this->env, ($context["form_field_wrapper_classes"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "wrapper_classes", []), "html", null, true);
            echo "\">
            <input type=\"checkbox\"
                   id=\"";
            // line 26
            echo twig_escape_filter($this->env, ($context["id"] ?? null));
            echo "\"
                   value=\"";
            // line 27
            echo twig_escape_filter($this->env, ($context["val"] ?? null));
            echo "\"
                   name=\"";
            // line 28
            echo twig_escape_filter($this->env, ((($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[") . ($context["name"] ?? null)) . "]"), "html", null, true);
            echo "\"
                   class=\"";
            // line 29
            echo twig_escape_filter($this->env, ($context["form_field_checkbox_classes"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo "\"
                   ";
            // line 30
            if (($context["checked"] ?? null)) {
                echo "checked=\"checked\"";
            }
            // line 31
            echo "                   ";
            if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                echo "disabled=\"disabled\"";
            }
            // line 32
            echo "            >
            <label style=\"display: inline\" for=\"";
            // line 33
            echo twig_escape_filter($this->env, ($context["id"] ?? null));
            echo "\">
                ";
            // line 34
            if (($context["help"] ?? null)) {
                // line 35
                echo "                    <span class=\"hint--bottom\" data-hint=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, ($context["help"] ?? null)), "html_attr");
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $context["text"]));
                echo "</span>
                ";
            } else {
                // line 37
                echo "                    ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $context["text"]));
                echo "
                ";
            }
            // line 39
            echo "            </label>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forms/fields/checkboxes/checkboxes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 39,  147 => 37,  139 => 35,  137 => 34,  133 => 33,  130 => 32,  125 => 31,  121 => 30,  115 => 29,  111 => 28,  107 => 27,  103 => 26,  96 => 24,  93 => 23,  90 => 22,  87 => 21,  84 => 20,  81 => 19,  79 => 18,  76 => 17,  71 => 16,  68 => 15,  62 => 12,  58 => 11,  53 => 10,  50 => 9,  45 => 1,  42 => 6,  40 => 5,  38 => 4,  36 => 3,  30 => 1,);
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

{% set originalValue = value %}
{% set value = (value is null ? field.default : value) %}
{% if field.use == 'keys' and field.default %}
    {% set value = field.default|merge(value) %}
{% endif %}

{% block global_attributes %}
    {{ parent() }}
    data-grav-keys=\"{{ field.use == 'keys' ? 'true' : 'false' }}\"
    data-grav-field-name=\"{{ (scope ~ field.name)|fieldName }}\"
{% endblock %}

{% block input %}
    {% for key, text in field.options %}

        {% set id = field.id|default(field.name)|hyphenize ~ '-' ~ key %}
        {% set name = field.use == 'keys' ? key : id %}
        {% set val = field.use == 'keys' ? '1' : key %}
        {% set checked = (field.use == 'keys' ? value[key] : key in value) %}
        {% set help = (key in field.help_options|keys ? field.help_options[key] : false) %}

        <div class=\"checkboxes {{ form_field_wrapper_classes }} {{ field.wrapper_classes }}\">
            <input type=\"checkbox\"
                   id=\"{{ id|e }}\"
                   value=\"{{ val|e }}\"
                   name=\"{{ (scope ~ field.name)|fieldName ~ '[' ~ name ~ ']' }}\"
                   class=\"{{ form_field_checkbox_classes }} {{ field.classes }}\"
                   {% if checked %}checked=\"checked\"{% endif %}
                   {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
            >
            <label style=\"display: inline\" for=\"{{ id|e }}\">
                {% if help %}
                    <span class=\"hint--bottom\" data-hint=\"{{ help|t|e('html_attr') }}\">{{ text|t|e }}</span>
                {% else %}
                    {{ text|t|e }}
                {% endif %}
            </label>
        </div>
    {% endfor %}
{% endblock %}
", "forms/fields/checkboxes/checkboxes.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/fields/checkboxes/checkboxes.html.twig");
    }
}
