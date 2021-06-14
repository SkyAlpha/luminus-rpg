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

/* partials/nav-user-details.html.twig */
class __TwigTemplate_5d4530a08d0c536f8fe615765bfe56e8479b38e4f3e100ebc2447b44494c4f19 extends \Twig\Template
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
        echo "<div id=\"offline-status\">
    <span><i class=\"fa fa-fw fa-plane\"></i> You are offline</span>
</div>
";
        // line 4
        $context["flex"] = ((($this->getAttribute(($context["grav"] ?? null), "flex_objects", [], "array", true, true) &&  !(null === $this->getAttribute(($context["grav"] ?? null), "flex_objects", [], "array")))) ? ($this->getAttribute(($context["grav"] ?? null), "flex_objects", [], "array")) : (null));
        // line 5
        $context["user"] = $this->getAttribute(($context["admin"] ?? null), "user", []);
        // line 6
        if ((($context["flex"] ?? null) && $this->getAttribute(($context["user"] ?? null), "hasFlexFeature", [0 => "user"], "method"))) {
            // line 7
            echo "    ";
            $context["route"] = $this->getAttribute(($context["flex"] ?? null), "adminRoute", [0 => ($context["user"] ?? null)], "method");
        } else {
            // line 9
            echo "    ";
            $context["route"] = ("/user/" . $this->getAttribute(($context["user"] ?? null), "username", []));
        }
        // line 11
        echo "
<div id=\"admin-user-details\">
    <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(($context["route"] ?? null)), "html", null, true);
        echo "\">
        ";
        // line 14
        $this->loadTemplate("partials/nav-user-avatar.html.twig", "partials/nav-user-details.html.twig", 14)->display($context);
        // line 15
        echo "
        <div class=\"admin-user-names\">
            <h4>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "fullname", []));
        echo " ";
        if (($this->getAttribute(($context["user"] ?? null), "twofa_enabled", []) && $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "twofa_enabled", []))) {
            echo "<span class=\"badge\">2FA</span>";
        }
        echo "</h4>
            <h5>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "title", []));
        echo "</h5>
        </div>
    </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "partials/nav-user-details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 18,  63 => 17,  59 => 15,  57 => 14,  53 => 13,  49 => 11,  45 => 9,  41 => 7,  39 => 6,  37 => 5,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"offline-status\">
    <span><i class=\"fa fa-fw fa-plane\"></i> You are offline</span>
</div>
{% set flex = grav['flex_objects'] ?? null %}
{% set user = admin.user %}
{% if flex and user.hasFlexFeature('user') %}
    {% set route = flex.adminRoute(user) %}
{% else %}
    {% set route = '/user/' ~ user.username %}
{% endif %}

<div id=\"admin-user-details\">
    <a href=\"{{ admin_route(route) }}\">
        {% include 'partials/nav-user-avatar.html.twig' %}

        <div class=\"admin-user-names\">
            <h4>{{ user.fullname|e }} {% if user.twofa_enabled and config.plugins.admin.twofa_enabled %}<span class=\"badge\">2FA</span>{% endif %}</h4>
            <h5>{{ user.title|e }}</h5>
        </div>
    </a>
</div>
", "partials/nav-user-details.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/nav-user-details.html.twig");
    }
}
