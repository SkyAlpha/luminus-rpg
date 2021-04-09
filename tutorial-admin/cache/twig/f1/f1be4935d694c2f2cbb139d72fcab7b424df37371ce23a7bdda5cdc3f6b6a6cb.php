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

/* forms/fields/text/text.html.twig */
class __TwigTemplate_30117d09abafff75e91d2dab8a3032f325ee44eb915508086a88750b13ff100b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'prepend' => [$this, 'block_prepend'],
            'input_attributes' => [$this, 'block_input_attributes'],
            'append' => [$this, 'block_append'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 5
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if ((($this->getAttribute(($context["field"] ?? null), "prepend", []) || $this->getAttribute(($context["field"] ?? null), "append", [])) || $this->getAttribute(($context["field"] ?? null), "copy_to_clipboard", []))) {
            // line 2
            $context["field"] = twig_array_merge(($context["field"] ?? null), ["wrapper_classes" => "form-input-addon-wrapper"]);
        }
        // line 5
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/text/text.html.twig", 5);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_prepend($context, array $blocks = [])
    {
        // line 8
        if ($this->getAttribute(($context["field"] ?? null), "prepend", [])) {
            // line 9
            echo "    <div class=\"form-input-addon form-input-prepend\">";
            // line 10
            echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "prepend", []));
            // line 11
            echo "</div>
";
        }
    }

    // line 15
    public function block_input_attributes($context, array $blocks = [])
    {
        // line 16
        echo "    type=\"text\"
    ";
        // line 17
        if ($this->getAttribute(($context["field"] ?? null), "size", [])) {
            echo "size=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
            echo "\"";
        }
        // line 18
        echo "    ";
        if (($this->getAttribute(($context["field"] ?? null), "minlength", [], "any", true, true) || $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", [], "any", false, true), "min", [], "any", true, true))) {
            echo "minlength=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "minlength", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "minlength", []), $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", []))) : ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "min", []))), "html", null, true);
            echo "\"";
        }
        // line 19
        echo "    ";
        if (($this->getAttribute(($context["field"] ?? null), "maxlength", [], "any", true, true) || $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", [], "any", false, true), "max", [], "any", true, true))) {
            echo "maxlength=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "maxlength", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "maxlength", []), $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", []))) : ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "max", []))), "html", null, true);
            echo "\"";
        }
        // line 20
        echo "    ";
        $this->displayParentBlock("input_attributes", $context, $blocks);
        echo "
";
    }

    // line 23
    public function block_append($context, array $blocks = [])
    {
        // line 24
        echo "    ";
        if ($this->getAttribute(($context["field"] ?? null), "copy_to_clipboard", [])) {
            // line 25
            echo "        <div class=\"form-input-addon form-input-append copy-to-clipboard\">
            ";
            // line 26
            if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "copy_to_clipboard", []), [0 => "0", 1 => "1"])) {
                // line 27
                echo "                <i class=\"fa fa-clipboard\"></i>
            ";
            } else {
                // line 29
                echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "copy_to_clipboard", []));
            }
            // line 31
            echo "        </div>
    ";
        } elseif ($this->getAttribute(        // line 32
($context["field"] ?? null), "append", [])) {
            // line 33
            echo "        <div class=\"form-input-addon form-input-append\">";
            // line 34
            echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "append", []));
            // line 35
            echo "</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "forms/fields/text/text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 35,  120 => 34,  118 => 33,  116 => 32,  113 => 31,  110 => 29,  106 => 27,  104 => 26,  101 => 25,  98 => 24,  95 => 23,  88 => 20,  81 => 19,  74 => 18,  68 => 17,  65 => 16,  62 => 15,  56 => 11,  54 => 10,  52 => 9,  50 => 8,  47 => 7,  42 => 5,  39 => 2,  37 => 1,  31 => 5,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if field.prepend or field.append or field.copy_to_clipboard %}
    {% set field = field|merge({'wrapper_classes': 'form-input-addon-wrapper'}) %}
{% endif %}

{% extends \"forms/field.html.twig\" %}

{% block prepend %}
{% if field.prepend %}
    <div class=\"form-input-addon form-input-prepend\">
        {{- field.prepend|t|raw -}}
    </div>
{% endif %}
{% endblock %}

{% block input_attributes %}
    type=\"text\"
    {% if field.size %}size=\"{{ field.size }}\"{% endif %}
    {% if field.minlength is defined or field.validate.min is defined %}minlength=\"{{ field.minlength | default(field.validate.min) }}\"{% endif %}
    {% if field.maxlength is defined or field.validate.max is defined %}maxlength=\"{{ field.maxlength | default(field.validate.max) }}\"{% endif %}
    {{ parent() }}
{% endblock %}

{% block append %}
    {% if field.copy_to_clipboard %}
        <div class=\"form-input-addon form-input-append copy-to-clipboard\">
            {% if field.copy_to_clipboard in ['0', '1'] %}
                <i class=\"fa fa-clipboard\"></i>
            {% else %}
                {{- field.copy_to_clipboard|t|raw -}}
            {% endif %}
        </div>
    {% elseif field.append %}
        <div class=\"form-input-addon form-input-append\">
            {{- field.append|t|raw -}}
        </div>
    {% endif %}
{% endblock %}


", "forms/fields/text/text.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/fields/text/text.html.twig");
    }
}
