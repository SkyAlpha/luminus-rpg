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

/* flex-objects/types/default/buttons/configuration.html.twig */
class __TwigTemplate_ea6aacb552ae34d4ac4add936f544121178172ad76995acd075826eb0c2f1c1f extends \Twig\Template
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
        $context["authorize"] = ((($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.configure.authorize"], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.configure.authorize"], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.configure.authorize"], "method")) : (((($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.configure.authorize"], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.configure.authorize"], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.configure.authorize"], "method")) : ("admin.super"))));
        // line 3
        if ((($context["configure_url"] ?? null) && $this->getAttribute(($context["user"] ?? null), "authorize", [0 => ($context["authorize"] ?? null)], "method"))) {
            // line 4
            echo "<a id=\"titlebar-button-configure\" class=\"button\" href=\"";
            echo twig_escape_filter($this->env, ($context["configure_url"] ?? null), "html", null, true);
            echo "\">
    <i class=\"fa fa-cog\"></i> ";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONFIGURATION"), "html", null, true);
            echo "
</a>
";
        }
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/buttons/configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 5,  34 => 4,  32 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{%- set authorize = directory.config('admin.views.configure.authorize') ?? directory.config('admin.configure.authorize') ?? 'admin.super' %}

{%- if configure_url and user.authorize(authorize) %}
<a id=\"titlebar-button-configure\" class=\"button\" href=\"{{ configure_url }}\">
    <i class=\"fa fa-cog\"></i> {{ 'PLUGIN_ADMIN.CONFIGURATION'|tu }}
</a>
{% endif %}
", "flex-objects/types/default/buttons/configuration.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/default/buttons/configuration.html.twig");
    }
}
