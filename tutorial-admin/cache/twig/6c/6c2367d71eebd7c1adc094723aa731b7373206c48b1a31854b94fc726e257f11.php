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

/* forms/fields/array/array.html.twig */
class __TwigTemplate_435c820dc679173cb405b6dea598f7996d42a21b1a342c18ff374dfbc724ee8c extends \Twig\Template
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
        // line 43
        $context["array_field"] = $this;
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/array/array.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 45
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 46
        echo "    data-grav-array-name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
    data-grav-array-keyname=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_key", []))), "html", null, true);
        echo "\"
    data-grav-array-valuename=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", []))), "html", null, true);
        echo "\"
    data-grav-array-textarea=\"";
        // line 49
        echo twig_escape_filter($this->env, ($this->getAttribute(($context["field"] ?? null), "value_type", []) == "textarea"), "html", null, true);
        echo "\"
    ";
        // line 50
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    // line 53
    public function block_input($context, array $blocks = [])
    {
        // line 54
        echo "    <div class=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
        echo "\" data-grav-array-type=\"container\"";
        if ($this->getAttribute(($context["field"] ?? null), "value_only", [])) {
            echo " data-grav-array-mode=\"value_only\"";
        }
        echo (((twig_length_filter($this->env, ($context["value"] ?? null)) <= 1)) ? (" class=\"one-child\"") : (""));
        echo ">
        ";
        // line 55
        if (twig_length_filter($this->env, ($context["value"] ?? null))) {
            // line 56
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["text"]) {
                // line 57
                if ( !twig_test_iterable($context["text"])) {
                    // line 58
                    echo "                    ";
                    echo $context["array_field"]->getrenderer($context["key"], $context["text"], ($context["field"] ?? null), ($context["scope"] ?? null));
                    echo "
                ";
                } else {
                    // line 60
                    echo "                    ";
                    // line 61
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["text"]);
                    foreach ($context['_seq'] as $context["subkey"] => $context["subtext"]) {
                        // line 62
                        echo $context["array_field"]->getrenderer(((($context["key"] . "[") . $context["subkey"]) . "]"), $context["subtext"], ($context["field"] ?? null), ($context["scope"] ?? null));
                        echo "
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['subkey'], $context['subtext'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 64
                    echo "                ";
                }
                // line 65
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 68
            echo "            <div class=\"form-row\" data-grav-array-type=\"row\">
                <span data-grav-array-action=\"sort\" class=\"fa fa-bars\"></span>
                ";
            // line 70
            if (($this->getAttribute(($context["field"] ?? null), "value_only", []) != true)) {
                // line 71
                echo "                    <input
                        data-grav-array-type=\"key\"
                        type=\"text\"
                        ";
                // line 74
                if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                    echo "disabled=\"disabled\"";
                }
                // line 75
                echo "                        placeholder=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_key", []))), "html", null, true);
                echo "\" />
                ";
            }
            // line 77
            echo "                ";
            if (($this->getAttribute(($context["field"] ?? null), "value_type", []) == "textarea")) {
                // line 78
                echo "                    <textarea
                        data-grav-array-type=\"value\"
                        name=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
                echo "\"
                        ";
                // line 81
                if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                    echo "disabled=\"disabled\"";
                }
                // line 82
                echo "                        placeholder=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", []))), "html", null, true);
                echo "\"></textarea>
                ";
            } else {
                // line 84
                echo "                    <input
                        data-grav-array-type=\"value\"
                        type=\"text\"
                        name=\"";
                // line 87
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
                echo "\"
                        ";
                // line 88
                if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                    echo "disabled=\"disabled\"";
                }
                // line 89
                echo "                        placeholder=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", []))), "html", null, true);
                echo "\" />
                ";
            }
            // line 91
            echo "                <span data-grav-array-action=\"rem\" class=\"fa fa-minus\"></span>
                <span data-grav-array-action=\"add\" class=\"fa fa-plus\"></span>
            </div>";
        }
        // line 95
        echo "    </div>
";
    }

    // line 3
    public function getrenderer($__key__ = null, $__text__ = null, $__field__ = null, $__scope__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "key" => $__key__,
            "text" => $__text__,
            "field" => $__field__,
            "scope" => $__scope__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 4
            echo "
    ";
            // line 5
            if ( !twig_test_iterable(($context["text"] ?? null))) {
                // line 6
                echo "        <div class=\"form-row";
                if ($this->getAttribute(($context["field"] ?? null), "value_only", [])) {
                    echo " array-field-value_only";
                }
                echo "\"
             data-grav-array-type=\"row\">
            <span data-grav-array-action=\"sort\" class=\"fa fa-bars\"></span>
            ";
                // line 9
                if (($this->getAttribute(($context["field"] ?? null), "value_only", []) != true)) {
                    // line 10
                    echo "                ";
                    if (((($context["key"] ?? null) == "0") && (($context["text"] ?? null) == ""))) {
                        // line 11
                        echo "                    ";
                        $context["key"] = "";
                        // line 12
                        echo "                ";
                    }
                    // line 13
                    echo "
                <input
                        data-grav-array-type=\"key\"
                        type=\"text\" value=\"";
                    // line 16
                    echo twig_escape_filter($this->env, ($context["key"] ?? null), "html", null, true);
                    echo "\"
                        ";
                    // line 17
                    if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                        echo "disabled=\"disabled\"";
                    }
                    // line 18
                    echo "                        placeholder=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_key", []))), "html", null, true);
                    echo "\" />
            ";
                }
                // line 20
                echo "
            ";
                // line 21
                if (($this->getAttribute(($context["field"] ?? null), "value_type", []) == "textarea")) {
                    // line 22
                    echo "                <textarea
                        data-grav-array-type=\"value\"
                        name=\"";
                    // line 24
                    echo twig_escape_filter($this->env, ((($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[") . ($context["key"] ?? null)) . "]"), "html", null, true);
                    echo "\"
                        placeholder=\"";
                    // line 25
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", []))), "html", null, true);
                    echo "\"
                        ";
                    // line 26
                    if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                        echo "disabled=\"disabled\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, ($context["text"] ?? null), "html", null, true);
                    echo "</textarea>
            ";
                } else {
                    // line 28
                    echo "                <input
                        data-grav-array-type=\"value\"
                        type=\"text\"
                        name=\"";
                    // line 31
                    echo twig_escape_filter($this->env, ((($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[") . ($context["key"] ?? null)) . "]"), "html", null, true);
                    echo "\"
                        placeholder=\"";
                    // line 32
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder_value", []))), "html", null, true);
                    echo "\"
                        ";
                    // line 33
                    if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                        echo "disabled=\"disabled\"";
                    }
                    // line 34
                    echo "                        value=";
                    if ((($context["text"] ?? null) == "true")) {
                        echo "true";
                    } elseif ((($context["text"] ?? null) == "false")) {
                        echo "false";
                    } else {
                        echo "\"";
                        echo twig_escape_filter($this->env, twig_join_filter(($context["text"] ?? null), ", "));
                        echo "\"";
                    }
                    echo " />
            ";
                }
                // line 36
                echo "
            <span data-grav-array-action=\"rem\" class=\"fa fa-minus\"></span>
            <span data-grav-array-action=\"add\" class=\"fa fa-plus\"></span>
        </div>
    ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "forms/fields/array/array.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 36,  295 => 34,  291 => 33,  287 => 32,  283 => 31,  278 => 28,  269 => 26,  265 => 25,  261 => 24,  257 => 22,  255 => 21,  252 => 20,  246 => 18,  242 => 17,  238 => 16,  233 => 13,  230 => 12,  227 => 11,  224 => 10,  222 => 9,  213 => 6,  211 => 5,  208 => 4,  193 => 3,  188 => 95,  183 => 91,  177 => 89,  173 => 88,  169 => 87,  164 => 84,  158 => 82,  154 => 81,  150 => 80,  146 => 78,  143 => 77,  137 => 75,  133 => 74,  128 => 71,  126 => 70,  122 => 68,  115 => 65,  112 => 64,  104 => 62,  99 => 61,  97 => 60,  91 => 58,  89 => 57,  84 => 56,  82 => 55,  72 => 54,  69 => 53,  63 => 50,  59 => 49,  55 => 48,  51 => 47,  46 => 46,  43 => 45,  38 => 1,  36 => 43,  30 => 1,);
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

{% macro renderer(key, text, field, scope) %}

    {% if text is not iterable %}
        <div class=\"form-row{% if field.value_only %} array-field-value_only{% endif %}\"
             data-grav-array-type=\"row\">
            <span data-grav-array-action=\"sort\" class=\"fa fa-bars\"></span>
            {% if field.value_only != true %}
                {% if key == '0' and text == '' %}
                    {% set key = '' %}
                {% endif %}

                <input
                        data-grav-array-type=\"key\"
                        type=\"text\" value=\"{{ key }}\"
                        {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                        placeholder=\"{{ field.placeholder_key|e|tu }}\" />
            {% endif %}

            {% if field.value_type == 'textarea' %}
                <textarea
                        data-grav-array-type=\"value\"
                        name=\"{{ ((scope ~ field.name)|fieldName) ~ '[' ~ key ~ ']' }}\"
                        placeholder=\"{{ field.placeholder_value|e|tu }}\"
                        {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}>{{ text }}</textarea>
            {% else %}
                <input
                        data-grav-array-type=\"value\"
                        type=\"text\"
                        name=\"{{ ((scope ~ field.name)|fieldName) ~ '[' ~ key ~ ']' }}\"
                        placeholder=\"{{ field.placeholder_value|e|tu }}\"
                        {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                        value={% if text == 'true' %}true{% elseif text == 'false' %}false{% else %}\"{{ text|join(', ')|e }}\"{% endif %} />
            {% endif %}

            <span data-grav-array-action=\"rem\" class=\"fa fa-minus\"></span>
            <span data-grav-array-action=\"add\" class=\"fa fa-plus\"></span>
        </div>
    {% endif %}
{% endmacro %}

{% import _self as array_field %}

{% block global_attributes %}
    data-grav-array-name=\"{{ (scope ~ field.name)|fieldName }}\"
    data-grav-array-keyname=\"{{ field.placeholder_key|e|tu }}\"
    data-grav-array-valuename=\"{{ field.placeholder_value|e|tu }}\"
    data-grav-array-textarea=\"{{ field.value_type == 'textarea' }}\"
    {{ parent() }}
{% endblock %}

{% block input %}
    <div class=\"{{ field.size }}\" data-grav-array-type=\"container\"{% if field.value_only %} data-grav-array-mode=\"value_only\"{% endif %}{{ value|length <= 1 ? ' class=\"one-child\"' : '' }}>
        {% if value|length %}
            {% for key, text in value -%}
                {% if text is not iterable %}
                    {{ array_field.renderer(key, text, field, scope) }}
                {% else %}
                    {# Backward compatibility for nested arrays (metas) which are not supported anymore #}
                    {% for subkey, subtext in text -%}
                        {{ array_field.renderer(key ~ '[' ~ subkey ~ ']', subtext, field, scope) }}
                    {% endfor %}
                {% endif %}
            {% endfor %}
        {%- else -%}
            {# Empty value, mock the entry field#}
            <div class=\"form-row\" data-grav-array-type=\"row\">
                <span data-grav-array-action=\"sort\" class=\"fa fa-bars\"></span>
                {% if field.value_only != true %}
                    <input
                        data-grav-array-type=\"key\"
                        type=\"text\"
                        {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                        placeholder=\"{{ field.placeholder_key|e|tu }}\" />
                {% endif %}
                {% if field.value_type == 'textarea' %}
                    <textarea
                        data-grav-array-type=\"value\"
                        name=\"{{ (scope ~ field.name)|fieldName }}\"
                        {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                        placeholder=\"{{ field.placeholder_value|e|tu }}\"></textarea>
                {% else %}
                    <input
                        data-grav-array-type=\"value\"
                        type=\"text\"
                        name=\"{{ (scope ~ field.name)|fieldName }}\"
                        {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                        placeholder=\"{{ field.placeholder_value|e|tu }}\" />
                {% endif %}
                <span data-grav-array-action=\"rem\" class=\"fa fa-minus\"></span>
                <span data-grav-array-action=\"add\" class=\"fa fa-plus\"></span>
            </div>
        {%- endif %}
    </div>
{% endblock %}
", "forms/fields/array/array.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/forms/fields/array/array.html.twig");
    }
}
