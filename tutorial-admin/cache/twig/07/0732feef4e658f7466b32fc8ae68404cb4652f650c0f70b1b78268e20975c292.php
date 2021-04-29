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

/* forms/fields/save-redirect/save-redirect.html.twig */
class __TwigTemplate_b89382de0c41855c7ec22b7cb00cbd09ebec7973bed528d8809c49cfabf2b244 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
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
        $context["isNew"] = ((($context["key"] ?? null)) ? (false) : (true));
        // line 6
        $context["savedOption"] = (($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "session", [], "any", false, true), "post_entries_save", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "session", [], "any", false, true), "post_entries_save", []), "create-new")) : ("create-new"));
        // line 8
        if (($context["isNew"] ?? null)) {
            // line 9
            $context["options"] = ["create-new" => "PLUGIN_FLEX_OBJECTS.CREATE_NEW", "edit" => "PLUGIN_FLEX_OBJECTS.EDIT", "list" => "PLUGIN_FLEX_OBJECTS.LIST"];
        } else {
            // line 11
            $context["options"] = ["edit" => "PLUGIN_FLEX_OBJECTS.EDIT", "list" => "PLUGIN_FLEX_OBJECTS.LIST"];
        }
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/save-redirect/save-redirect.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_input($context, array $blocks = [])
    {
        // line 15
        echo "    ";
        $context["savedOption"] = ((( !($context["isNew"] ?? null) && (($context["savedOption"] ?? null) == "create-new"))) ? ("edit") : (($context["savedOption"] ?? null)));
        // line 16
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["text"]) {
            // line 17
            echo "        ";
            $context["id"] = (((($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "id", []), $this->getAttribute(($context["field"] ?? null), "name", []))) : ($this->getAttribute(($context["field"] ?? null), "name", []))) . "-") . $context["key"]);
            // line 18
            echo "
        ";
            // line 19
            if ((($context["savedOption"] ?? null) == $context["key"])) {
                // line 20
                echo "            ";
                $context["value"] = ($context["savedOption"] ?? null);
                // line 21
                echo "        ";
            }
            // line 22
            echo "
        <span class=\"radio\">
            <input type=\"radio\"
                   value=\"";
            // line 25
            echo twig_escape_filter($this->env, $context["key"]);
            echo "\"
                   id=\"";
            // line 26
            echo twig_escape_filter($this->env, ($context["id"] ?? null));
            echo "\"
                   name=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter($this->getAttribute(($context["field"] ?? null), "name", [])), "html", null, true);
            echo "\"
                   ";
            // line 28
            if (($context["key"] == ($context["value"] ?? null))) {
                echo "checked=\"checked\" ";
            }
            // line 29
            echo "                    ";
            if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
                echo "disabled=\"disabled\"";
            }
            // line 30
            echo "                    ";
            if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "required", []), [0 => "on", 1 => "true", 2 => 1])) {
                echo "required=\"required\"";
            }
            // line 31
            echo "            />
            <label style=\"display: inline\" class=\"inline\" for=\"";
            // line 32
            echo twig_escape_filter($this->env, ($context["id"] ?? null));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($context["text"]));
            echo "</label>
        </span>


    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forms/fields/save-redirect/save-redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 32,  112 => 31,  107 => 30,  102 => 29,  98 => 28,  94 => 27,  90 => 26,  86 => 25,  81 => 22,  78 => 21,  75 => 20,  73 => 19,  70 => 18,  67 => 17,  62 => 16,  59 => 15,  56 => 14,  51 => 1,  48 => 11,  45 => 9,  43 => 8,  41 => 6,  39 => 5,  37 => 4,  35 => 3,  29 => 1,);
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
{% set isNew = key ? false : true %}
{% set savedOption = grav.session.post_entries_save|default('create-new') %}

{% if isNew %}
    {% set options = {'create-new':'PLUGIN_FLEX_OBJECTS.CREATE_NEW', 'edit':'PLUGIN_FLEX_OBJECTS.EDIT', 'list':'PLUGIN_FLEX_OBJECTS.LIST'} %}
{% else %}
    {% set options = {'edit':'PLUGIN_FLEX_OBJECTS.EDIT', 'list':'PLUGIN_FLEX_OBJECTS.LIST'} %}
{% endif %}

{% block input %}
    {% set savedOption = not isNew and savedOption == 'create-new' ? 'edit' : savedOption %}
    {% for key, text in options %}
        {% set id = field.id|default(field.name) ~ '-' ~ key %}

        {% if savedOption == key %}
            {% set value = savedOption %}
        {% endif %}

        <span class=\"radio\">
            <input type=\"radio\"
                   value=\"{{ key|e }}\"
                   id=\"{{ id|e }}\"
                   name=\"{{ (field.name)|fieldName }}\"
                   {% if key == value %}checked=\"checked\" {% endif %}
                    {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                    {% if field.validate.required in ['on', 'true', 1] %}required=\"required\"{% endif %}
            />
            <label style=\"display: inline\" class=\"inline\" for=\"{{ id|e }}\">{{ text|tu|e }}</label>
        </span>


    {% endfor %}
{% endblock %}", "forms/fields/save-redirect/save-redirect.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/forms/fields/save-redirect/save-redirect.html.twig");
    }
}
