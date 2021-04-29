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

/* flex-objects/types/pages/list.html.twig */
class __TwigTemplate_4e832aa222f23295cf0faf37080e2bee39955dcce3aa25301da935b5547ca1b2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'back_button' => [$this, 'block_back_button'],
            'create_button' => [$this, 'block_create_button'],
            'content_top' => [$this, 'block_content_top'],
            'content_list' => [$this, 'block_content_list'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "flex-objects/types/default/list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["can_create"] = true;
        // line 1
        $this->parent = $this->loadTemplate("flex-objects/types/default/list.html.twig", "flex-objects/types/pages/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_back_button($context, array $blocks = [])
    {
        // line 6
        echo "    ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/back.html.twig"), 1 => "flex-objects/types/pages/buttons/back.html.twig"], "flex-objects/types/pages/list.html.twig", 6)->display($context);
    }

    // line 9
    public function block_create_button($context, array $blocks = [])
    {
        // line 10
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "add_modals", []));
        foreach ($context['_seq'] as $context["key"] => $context["add_modal"]) {
            // line 11
            echo "        ";
            if (((($this->getAttribute($context["add_modal"], "show_in", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["add_modal"], "show_in", []), "bar")) : ("bar")) == "bar")) {
                // line 12
                echo "            <a class=\"button ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["add_modal"], "link_classes", []), "html", null, true);
                echo "\" href=\"#modal-add_modal-";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\" data-remodal-target=\"modal-add_modal-";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\"><i class=\"fa fa-plus\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute($context["add_modal"], "label", [])), "html", null, true);
                echo "</a>
        ";
            }
            // line 14
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['add_modal'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "
    ";
        // line 16
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/add.html.twig"), 1 => "flex-objects/types/pages/buttons/add.html.twig"], "flex-objects/types/pages/list.html.twig", 16)->display($context);
    }

    // line 19
    public function block_content_top($context, array $blocks = [])
    {
    }

    // line 21
    public function block_content_list($context, array $blocks = [])
    {
        // line 22
        echo "    ";
        $context["list_layout"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "uri", []), "param", [0 => "layout", 1 => "columns"], "method");
        // line 23
        echo "    ";
        $this->loadTemplate([0 => (((("flex-objects/types/" .         // line 24
($context["target"] ?? null)) . "/list/") . ($context["list_layout"] ?? null)) . ".html.twig"), 1 => (("flex-objects/types/pages/list/" .         // line 25
($context["list_layout"] ?? null)) . ".html.twig"), 2 => (("flex-objects/types/" .         // line 26
($context["target"] ?? null)) . "/list/list.html.twig"), 3 => "flex-objects/types/pages/list/list.html.twig"], "flex-objects/types/pages/list.html.twig", 23)->display($context);
    }

    public function getTemplateName()
    {
        return "flex-objects/types/pages/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 26,  103 => 25,  102 => 24,  100 => 23,  97 => 22,  94 => 21,  89 => 19,  85 => 16,  82 => 15,  76 => 14,  64 => 12,  61 => 11,  56 => 10,  53 => 9,  48 => 6,  45 => 5,  40 => 1,  38 => 3,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'flex-objects/types/default/list.html.twig' %}

{% set can_create = true %}

{% block back_button %}
    {% include ['flex-objects/types/' ~ target ~ '/buttons/back.html.twig', 'flex-objects/types/pages/buttons/back.html.twig'] %}
{% endblock back_button %}

{% block create_button %}
    {% for key, add_modal in config.plugins.admin.add_modals %}
        {% if add_modal.show_in|default('bar') == 'bar' %}
            <a class=\"button {{ add_modal.link_classes }}\" href=\"#modal-add_modal-{{ key }}\" data-remodal-target=\"modal-add_modal-{{ key }}\"><i class=\"fa fa-plus\"></i> {{ add_modal.label|tu }}</a>
        {% endif %}
    {% endfor %}

    {% include ['flex-objects/types/' ~ target ~ '/buttons/add.html.twig', 'flex-objects/types/pages/buttons/add.html.twig'] %}
{% endblock %}

{% block content_top %}{% endblock %}

{% block content_list %}
    {% set list_layout = grav.uri.param('layout', 'columns') %}
    {% include [
        'flex-objects/types/' ~ target ~ '/list/' ~ list_layout ~ '.html.twig',
        'flex-objects/types/pages/list/' ~ list_layout ~ '.html.twig',
        'flex-objects/types/' ~ target ~ '/list/list.html.twig',
        'flex-objects/types/pages/list/list.html.twig'
        ] %}
{% endblock %}
", "flex-objects/types/pages/list.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/pages/list.html.twig");
    }
}
