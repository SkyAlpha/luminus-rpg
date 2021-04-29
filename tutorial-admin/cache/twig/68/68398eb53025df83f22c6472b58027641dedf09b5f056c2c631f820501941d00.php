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

/* flex-objects.html.twig */
class __TwigTemplate_8357426e6bd60e1d7af94541f1e379ea70b9e96111f7419a9d43b4b2753ec685 extends \Twig\Template
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
        $context["user"] = $this->getAttribute(($context["admin"] ?? null), "user", []);
        // line 2
        $context["route"] = $this->getAttribute(($context["controller"] ?? null), "route", []);
        // line 3
        $context["type"] = ((($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.template"], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.template"], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.template"], "method")) : (($context["target"] ?? null)));
        // line 6
        if ((($context["key"] ?? null) && $this->getAttribute($this->getAttribute(($context["uri"] ?? null), "currentUri", [], "method"), "queryParam", [0 => "preview"], "method"))) {
            // line 7
            echo "    ";
            $context["action"] = "preview";
        }
        // line 10
        ob_start();
        // line 11
        if ((($context["action"] ?? null) == "add")) {
            // line 12
            echo "edit";
        } elseif ((        // line 13
($context["action"] ?? null) == "delete")) {
            // line 14
            echo "list";
        } else {
            // line 16
            echo twig_escape_filter($this->env, ((($context["action"] ?? null)) ? (($context["action"] ?? null)) : (((($context["task"] ?? null)) ? (($context["task"] ?? null)) : ("types")))), "html", null, true);
        }
        $context["template"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 20
        $context["separator"] = $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", []);
        // line 21
        $context["view_config"] = ((($this->getAttribute(($context["directory"] ?? null), "config", [0 => ("admin.views." . ($context["template"] ?? null))], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => ("admin.views." . ($context["template"] ?? null))], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => ("admin.views." . ($context["template"] ?? null))], "method")) : (((($this->getAttribute(($context["directory"] ?? null), "config", [0 => ("admin." . ($context["template"] ?? null))], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => ("admin." . ($context["template"] ?? null))], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => ("admin." . ($context["template"] ?? null))], "method")) : ([]))));
        // line 23
        $this->loadTemplate(((($context["target"] ?? null)) ? ([0 => (((("flex-objects/types/" .         // line 24
($context["type"] ?? null)) . "/") . ($context["template"] ?? null)) . ".html.twig"), 1 => (("flex-objects/types/default/" .         // line 25
($context["template"] ?? null)) . ".html.twig"), 2 => "flex-objects/layouts/404.html.twig"]) : ([0 => (("flex-objects/types/default/" .         // line 28
($context["template"] ?? null)) . ".html.twig"), 1 => "flex-objects/layouts/404.html.twig"])), "flex-objects.html.twig", 23)->display($context);
    }

    public function getTemplateName()
    {
        return "flex-objects.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 28,  63 => 25,  62 => 24,  61 => 23,  59 => 21,  57 => 20,  53 => 16,  50 => 14,  48 => 13,  46 => 12,  44 => 11,  42 => 10,  38 => 7,  36 => 6,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{%- set user = admin.user -%}
{%- set route = controller.route -%}
{%- set type = directory.config('admin.template') ?? target -%}

{# Set action from ?preview=1 #}
{%- if key and uri.currentUri().queryParam('preview') %}
    {% set action = 'preview' %}
{% endif -%}

{%- set template -%}
    {%- if action == 'add' -%}
        edit
    {%- elseif action == 'delete' -%}
        list
    {%- else -%}
        {{- action ?: task ?: 'types' -}}
    {%- endif -%}
{%- endset -%}

{%- set separator = config.system.param_sep -%}
{%- set view_config = directory.config('admin.views.' ~ template) ?? directory.config('admin.' ~ template) ?? [] -%}

{%- include target ? [
        'flex-objects/types/' ~ type ~ '/' ~ template ~ '.html.twig',
        'flex-objects/types/default/' ~ template ~ '.html.twig',
        'flex-objects/layouts/404.html.twig'
    ] : [
        'flex-objects/types/default/' ~ template ~ '.html.twig',
        'flex-objects/layouts/404.html.twig'
    ] -%}
", "flex-objects.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects.html.twig");
    }
}
