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

/* forms/fields/select/select.html.twig */
class __TwigTemplate_bbeabcf88675e05701082fa812b5d2ca5ca092fc94fa55666f5809400593cb88 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/select/select.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 4
        echo "    data-grav-selectize=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter((($this->getAttribute(($context["field"] ?? null), "selectize", [], "any", true, true)) ? ($this->getAttribute(($context["field"] ?? null), "selectize", [])) : ([]))), "html_attr");
        echo "\"
    ";
        // line 5
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    // line 8
    public function block_input($context, array $blocks = [])
    {
        // line 9
        echo "    <div class=\"";
        ((($context["form_field_wrapper_classes"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["form_field_wrapper_classes"] ?? null), "html", null, true))) : (print ("form-select-wrapper")));
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "wrapper_classes", []), "html", null, true);
        echo "\">
        <select name=\"";
        // line 10
        echo twig_escape_filter($this->env, ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . (($this->getAttribute(($context["field"] ?? null), "multiple", [])) ? ("[]") : (""))), "html", null, true);
        echo "\"
                class=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["form_field_select_classes"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
        echo "\"
                ";
        // line 12
        if ($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", []));
            echo "\" ";
        }
        // line 13
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "style", [], "any", true, true)) {
            echo "style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "style", []));
            echo "\" ";
        }
        // line 14
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "disabled", [])) {
            echo "disabled=\"disabled\"";
        }
        // line 15
        echo "                ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autofocus", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "autofocus=\"autofocus\"";
        }
        // line 16
        echo "                ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "novalidate", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "novalidate=\"novalidate\"";
        }
        // line 17
        echo "                ";
        if (($context["required"] ?? null)) {
            echo "required=\"required\"";
        }
        // line 18
        echo "                ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "multiple", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "multiple=\"multiple\"";
        }
        // line 19
        echo "                ";
        if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        // line 20
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "tabindex", [])) {
            echo "tabindex=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "tabindex", []), "html", null, true);
            echo "\"";
        }
        // line 21
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "form", [])) {
            echo "form=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "form", []), "html", null, true);
            echo "\"";
        }
        // line 22
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "key", [])) {
            // line 23
            echo "                    data-key-observe=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
            echo "\"
                ";
        }
        // line 25
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "datasets", [])) {
            // line 26
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "datasets", []));
            foreach ($context['_seq'] as $context["datakey"] => $context["datavalue"]) {
                // line 27
                echo "                        data-";
                echo twig_escape_filter($this->env, $context["datakey"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["datavalue"], "html_attr");
                echo "\"
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['datakey'], $context['datavalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "                ";
        }
        // line 30
        echo "                >
            ";
        // line 31
        if ($this->getAttribute(($context["field"] ?? null), "placeholder", [])) {
            echo "<option value=\"\" disabled selected>";
            echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder", []));
            echo "</option>";
        }
        // line 32
        echo "
            ";
        // line 33
        $context["options"] = $this->getAttribute(($context["field"] ?? null), "options", []);
        // line 34
        echo "            ";
        if (($this->getAttribute($this->getAttribute(($context["field"] ?? null), "selectize", []), "create", []) && $this->getAttribute(($context["field"] ?? null), "multiple", []))) {
            // line 35
            echo "                ";
            $context["options"] = array_unique(twig_array_merge(($context["options"] ?? null), ((array_key_exists("value", $context)) ? (_twig_default_filter(($context["value"] ?? null), [])) : ([]))));
            // line 36
            echo "            ";
        }
        // line 37
        echo "
            ";
        // line 38
        $context["value"] = ((twig_test_iterable(($context["value"] ?? null))) ? (($context["value"] ?? null)) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter(($context["value"] ?? null))));
        // line 39
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item_value"]) {
            // line 40
            echo "                ";
            if ((twig_test_iterable($context["item_value"]) && $this->getAttribute($context["item_value"], "value", []))) {
                // line 41
                echo "                    ";
                $context["akey"] = ((($this->getAttribute(($context["field"] ?? null), "selectize", []) && $this->getAttribute(($context["field"] ?? null), "multiple", []))) ? ($context["item_value"]) : ($context["key"]));
                // line 42
                echo "                    ";
                $context["avalue"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute($context["item_value"], "value", []));
                // line 43
                echo "                    <option ";
                echo (($this->getAttribute($context["item_value"], "disabled", [])) ? ("disabled=\"disabled\"") : (""));
                echo "
                        ";
                // line 44
                echo (($this->getAttribute($context["item_value"], "selected", [])) ? ("selected=\"selected\"") : (""));
                echo "
                        ";
                // line 45
                (($this->getAttribute($context["item_value"], "label", [])) ? (print (twig_escape_filter($this->env, ("label=" . $this->getAttribute($context["item_value"], "label", [])), "html", null, true))) : (print ("")));
                echo "
                        value=\"";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["item_value"], "akey", []), "html", null, true);
                echo "\"
                    >
                        ";
                // line 48
                echo ($context["avalue"] ?? null);
                echo "
                    </option>
                ";
            } elseif (twig_test_iterable(            // line 50
$context["item_value"])) {
                // line 51
                echo "                    ";
                $context["optgroup_label"] = twig_first($this->env, twig_get_array_keys_filter($context["item_value"]));
                // line 52
                echo "                    <optgroup label=\"";
                echo twig_escape_filter($this->env, ($context["optgroup_label"] ?? null), "html", null, true);
                echo "\">
                      ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["field"] ?? null), "options", []), $context["key"], [], "array"), ($context["optgroup_label"] ?? null), [], "array"));
                foreach ($context['_seq'] as $context["subkey"] => $context["suboption"]) {
                    // line 54
                    echo "                          ";
                    $context["subkey"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter($context["subkey"]);
                    // line 55
                    echo "                          ";
                    $context["item_value"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter(((($this->getAttribute(($context["field"] ?? null), "selectize", []) && $this->getAttribute(($context["field"] ?? null), "multiple", []))) ? ($context["suboption"]) : ($context["subkey"])));
                    // line 56
                    echo "                          ";
                    $context["selected"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter((($this->getAttribute(($context["field"] ?? null), "selectize", [])) ? ($context["suboption"]) : ($context["subkey"])));
                    // line 57
                    echo "                          <option ";
                    if ((($context["subkey"] === ($context["value"] ?? null)) || ($this->getAttribute(($context["field"] ?? null), "multiple", []) && twig_in_filter(($context["selected"] ?? null), ($context["value"] ?? null))))) {
                        echo "selected=\"selected\"";
                    }
                    echo " value=\"";
                    echo twig_escape_filter($this->env, $context["suboption"], "html", null, true);
                    echo "\">
                            ";
                    // line 58
                    echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $context["suboption"]);
                    echo "
                          </option>
                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['subkey'], $context['suboption'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 61
                echo "                    </optgroup>
                ";
            } else {
                // line 63
                echo "                    ";
                $context["val"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter(((($this->getAttribute(($context["field"] ?? null), "selectize", []) && $this->getAttribute(($context["field"] ?? null), "multiple", []))) ? ($context["item_value"]) : ($context["key"])));
                // line 64
                echo "                    ";
                $context["selected"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter((($this->getAttribute(($context["field"] ?? null), "selectize", [])) ? ($context["item_value"]) : ($context["key"])));
                // line 65
                echo "                    <option ";
                if (((($context["val"] ?? null) === ($context["value"] ?? null)) || ($this->getAttribute(($context["field"] ?? null), "multiple", []) && twig_in_filter(($context["selected"] ?? null), ($context["value"] ?? null))))) {
                    echo "selected=\"selected\"";
                }
                echo " value=\"";
                echo twig_escape_filter($this->env, ($context["val"] ?? null), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $context["item_value"]);
                echo "</option>
                ";
            }
            // line 67
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item_value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "
        </select>
    </div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/select/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  300 => 68,  294 => 67,  282 => 65,  279 => 64,  276 => 63,  272 => 61,  263 => 58,  254 => 57,  251 => 56,  248 => 55,  245 => 54,  241 => 53,  236 => 52,  233 => 51,  231 => 50,  226 => 48,  221 => 46,  217 => 45,  213 => 44,  208 => 43,  205 => 42,  202 => 41,  199 => 40,  194 => 39,  192 => 38,  189 => 37,  186 => 36,  183 => 35,  180 => 34,  178 => 33,  175 => 32,  169 => 31,  166 => 30,  163 => 29,  152 => 27,  147 => 26,  144 => 25,  138 => 23,  135 => 22,  128 => 21,  121 => 20,  116 => 19,  111 => 18,  106 => 17,  101 => 16,  96 => 15,  91 => 14,  84 => 13,  78 => 12,  70 => 11,  66 => 10,  57 => 9,  54 => 8,  48 => 5,  43 => 4,  40 => 3,  30 => 1,);
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

{% block global_attributes %}
    data-grav-selectize=\"{{ (field.selectize is defined ? field.selectize : {})|json_encode()|e('html_attr') }}\"
    {{ parent() }}
{% endblock %}

{% block input %}
    <div class=\"{{ form_field_wrapper_classes ?: 'form-select-wrapper' }} {{ field.size }} {{ field.wrapper_classes }}\">
        <select name=\"{{ (scope ~ field.name)|fieldName ~ (field.multiple ? '[]' : '') }}\"
                class=\"{{ form_field_select_classes }} {{ field.classes }} {{ field.size }}\"
                {% if field.id is defined %}id=\"{{ field.id|e }}\" {% endif %}
                {% if field.style is defined %}style=\"{{ field.style|e }}\" {% endif %}
                {% if field.disabled %}disabled=\"disabled\"{% endif %}
                {% if field.autofocus in ['on', 'true', 1] %}autofocus=\"autofocus\"{% endif %}
                {% if field.novalidate in ['on', 'true', 1] %}novalidate=\"novalidate\"{% endif %}
                {% if required %}required=\"required\"{% endif %}
                {% if field.multiple in ['on', 'true', 1] %}multiple=\"multiple\"{% endif %}
                {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                {% if field.tabindex %}tabindex=\"{{ field.tabindex }}\"{% endif %}
                {% if field.form %}form=\"{{ field.form }}\"{% endif %}
                {% if field.key %}
                    data-key-observe=\"{{ (scope ~ field.name)|fieldName }}\"
                {% endif %}
                {% if field.datasets %}
                    {% for datakey, datavalue in field.datasets %}
                        data-{{ datakey }}=\"{{ datavalue|e('html_attr') }}\"
                    {% endfor %}
                {% endif %}
                >
            {% if field.placeholder %}<option value=\"\" disabled selected>{{ field.placeholder|t|raw }}</option>{% endif %}

            {% set options = field.options %}
            {% if field.selectize.create and field.multiple %}
                {% set options = options|merge(value|default([]))|array_unique %}
            {% endif %}

            {% set value = value is iterable ? value : value|string %}
            {% for key, item_value in options %}
                {% if item_value is iterable and item_value.value %}
                    {% set akey = field.selectize and field.multiple ? item_value : key %}
                    {% set avalue = item_value.value|t %}
                    <option {{ item_value.disabled ? 'disabled=\"disabled\"' : '' }}
                        {{ item_value.selected ? 'selected=\"selected\"' : '' }}
                        {{ item_value.label    ? 'label=' ~ item_value.label : '' }}
                        value=\"{{ item_value.akey }}\"
                    >
                        {{ avalue|raw }}
                    </option>
                {% elseif item_value is iterable %}
                    {% set optgroup_label = item_value|keys|first %}
                    <optgroup label=\"{{ optgroup_label }}\">
                      {% for subkey, suboption in field.options[key][optgroup_label] %}
                          {% set subkey = subkey|string %}
                          {% set item_value = (field.selectize and field.multiple ? suboption : subkey)|string %}
                          {% set selected = (field.selectize ? suboption : subkey)|string %}
                          <option {% if subkey is same as (value) or (field.multiple and selected in value) %}selected=\"selected\"{% endif %} value=\"{{ suboption }}\">
                            {{ suboption|t|raw }}
                          </option>
                      {% endfor %}
                    </optgroup>
                {% else %}
                    {% set val = (field.selectize and field.multiple ? item_value : key)|string %}
                    {% set selected = (field.selectize ? item_value : key)|string %}
                    <option {% if val is same as (value) or (field.multiple and selected in value) %}selected=\"selected\"{% endif %} value=\"{{ val }}\">{{ item_value|t|raw }}</option>
                {% endif %}
            {% endfor %}

        </select>
    </div>
{% endblock %}
", "forms/fields/select/select.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/fields/select/select.html.twig");
    }
}
