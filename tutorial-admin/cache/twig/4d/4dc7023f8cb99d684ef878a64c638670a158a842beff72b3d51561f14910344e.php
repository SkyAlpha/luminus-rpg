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

/* flex-objects/types/user-accounts/edit.html.twig */
class __TwigTemplate_83e2a746acc39a56c2ca094ce4457856c60f23aa89f1bb2e069a5a3088716b1c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "flex-objects/types/default/edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        if ( !$this->getAttribute(($context["directory"] ?? null), "isAuthorized", [0 => "list", 1 => "admin", 2 => ($context["user"] ?? null)], "method")) {
            // line 4
            $context["back_route"] = "/";
        }
        // line 7
        if ( !$this->getAttribute(($context["object"] ?? null), "exists", [])) {
            // line 8
            $this->getAttribute(($context["object"] ?? null), "onPrepareRegistration", [], "method");
        }
        // line 1
        $this->parent = $this->loadTemplate("flex-objects/types/default/edit.html.twig", "flex-objects/types/user-accounts/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "flex-objects/types/user-accounts/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 1,  41 => 8,  39 => 7,  36 => 4,  34 => 3,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'flex-objects/types/default/edit.html.twig' %}

{% if not directory.isAuthorized('list', 'admin', user) %}
    {% set back_route = '/' %}
{% endif %}

{% if not object.exists %}
    {% do object.onPrepareRegistration() %}
{% endif %}", "flex-objects/types/user-accounts/edit.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/user-accounts/edit.html.twig");
    }
}
