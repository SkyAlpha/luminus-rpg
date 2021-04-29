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

/* forms/fields/parents/parents.html.twig */
class __TwigTemplate_3a7f9fe339de31bda7fe4014b479a6dd4db2878554a2c9f5a9b723fc1a717d69 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/parents/parents.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        // line 16
        echo "
    ";
        // line 17
        $context["name"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", [])));
        // line 18
        echo "    ";
        if (($context["form"] ?? null)) {
            // line 19
            echo "        ";
            $context["parent"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "object", []), "parent", []), "title", []);
            // line 20
            echo "    ";
        } elseif ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "flex_objects", [], "array"), "hasDirectory", [0 => "pages"], "method")) {
            // line 21
            echo "        ";
            $context["directory"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "flex_objects", [], "array"), "getDirectory", [0 => "pages"], "method");
            // line 22
            echo "        ";
            $context["parent"] = ((($context["value"] ?? null)) ? ($this->getAttribute($this->getAttribute(($context["directory"] ?? null), "getObject", [0 => twig_trim_filter(($context["value"] ?? null), "/")], "method"), "title", [])) : ("<root>"));
            // line 23
            echo "    ";
        } else {
            // line 24
            echo "        ";
            $this->getAttribute(($context["admin"] ?? null), "enablePages", [], "method");
            // line 25
            echo "        ";
            $context["parent"] = $this->getAttribute($this->getAttribute(($context["page"] ?? null), "find", [0 => ($context["value"] ?? null)], "method"), "title", []);
            // line 26
            echo "    ";
        }
        // line 27
        echo "    <div class=\"parents-wrapper\">
        <div class=\"form-input-wrapper\" data-parents=\"";
        // line 28
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" data-remodal-target=\"parents\">
            <div class=\"parent-title\" data-parents-field-name=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["parent"] ?? null), "html", null, true);
        echo "</div>
            <span><i class=\"fa fa-folder-o\"></i> <span data-parents-field-label=\"";
        // line 30
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ((array_key_exists("value", $context)) ? (_twig_default_filter(($context["value"] ?? null), "/")) : ("/")), "html", null, true);
        echo "</span></span>
        </div>

        <input type=\"hidden\" class=\"input\" name=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" data-field-name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "name", []), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, twig_join_filter(($context["value"] ?? null), ", "), "html", null, true);
        echo "\" />
    </div>

    ";
    }

    public function getTemplateName()
    {
        return "forms/fields/parents/parents.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 33,  89 => 30,  83 => 29,  79 => 28,  76 => 27,  73 => 26,  70 => 25,  67 => 24,  64 => 23,  61 => 22,  58 => 21,  55 => 20,  52 => 19,  49 => 18,  47 => 17,  44 => 16,  42 => 4,  39 => 3,  29 => 1,);
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

{% block input %}
    {#
    {% set defaults = {
        show_root: true,
        show_all: show_all_val,
        show_modular: show_modular_val,
        show_slug: show_slug_val,
        show_fullpath: show_fullpath_val,
        default: last_page_route,
        limit_levels: limit_levels_val
    } %}
    {% set field = field|merge(defaults) %}
    #}

    {% set name = (scope ~ field.name)|fieldName %}
    {% if form %}
        {% set parent = form.object.parent.title %}
    {% elseif grav['flex_objects'].hasDirectory('pages') %}
        {% set directory = grav['flex_objects'].getDirectory('pages') %}
        {% set parent = value ? directory.getObject(value|trim('/')).title : '<root>' %}
    {% else %}
        {% do admin.enablePages() %}
        {% set parent = page.find(value).title %}
    {% endif %}
    <div class=\"parents-wrapper\">
        <div class=\"form-input-wrapper\" data-parents=\"{{ name }}\" data-remodal-target=\"parents\">
            <div class=\"parent-title\" data-parents-field-name=\"{{ name }}\">{{ parent }}</div>
            <span><i class=\"fa fa-folder-o\"></i> <span data-parents-field-label=\"{{ name }}\">{{ value|default('/') }}</span></span>
        </div>

        <input type=\"hidden\" class=\"input\" name=\"{{ name }}\" data-field-name=\"{{ field.name }}\" value=\"{{ value|join(', ') }}\" />
    </div>

    {#{% set last_page_route = admin.page.getLastPageRoute %}
    {% set show_slug_val = true %}
    {% set show_fullpath_val = false %}
    {% set show_all_val = true %}

    {% set show_parents = config.get('plugins.admin.pages.show_parents') %}
    {% if show_parents == 'folder' %}
        {% set show_slug_val = false %}
    {% elseif show_parents == 'fullpath' %}
        {% set show_fullpath_val = true %}
    {% endif %}

    {% set limit_levels_val = config.get('plugins.admin.pages.parents_levels') %}

    {% set show_modular_val = config.get('plugins.admin.pages.show_modular', true) %}
    {% if show_modular_val == false %}
        {% set show_all_val = false %}
    {% endif %}

    {% set defaults = {show_root:true, show_all:show_all_val, show_modular:show_modular_val, show_slug:show_slug_val, show_fullpath:show_fullpath_val, default:last_page_route, limit_levels:limit_levels_val} %}
    {% set field = field|merge(defaults) %}
    {{ parent() }}#}
{% endblock %}
", "forms/fields/parents/parents.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/forms/fields/parents/parents.html.twig");
    }
}
