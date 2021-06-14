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

/* partials/nav.html.twig */
class __TwigTemplate_4060cca8465c75c4b26a8b04599e62cab138ccb28cd6750f86c70a053c0c5c8b extends \Twig\Template
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
        $context["nav_hover"] = ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "sidebar", []), "activate", []) == "hover");
        // line 2
        if ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.login", 1 => "admin.super"])) {
            // line 3
            echo "    <nav id=\"admin-sidebar\" data-quickopen=\"";
            echo ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "sidebar", []), "activate", []) == "hover")) ? ("true") : ("false"));
            echo "\" data-quickopen-delay=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "sidebar", []), "hover_delay", []), "html", null, true);
            echo "\">

        <div id=\"admin-logo\" class=\"";
            // line 5
            echo ((($context["nav_hover"] ?? null)) ? ("nav-hover") : (""));
            echo "\">
            ";
            // line 6
            if ( !($context["nav_hover"] ?? null)) {
                // line 7
                echo "                <div id=\"open-handle\" data-sidebar-toggle><i class=\"fa fa-angle-right\"></i></div>
            ";
            }
            // line 9
            echo "            ";
            $this->loadTemplate("partials/logo.html.twig", "partials/nav.html.twig", 9)->display($context);
            // line 10
            echo "        </div>

        ";
            // line 12
            $this->loadTemplate("partials/nav-user-details.html.twig", "partials/nav.html.twig", 12)->display($context);
            // line 13
            echo "
        ";
            // line 14
            $this->loadTemplate("partials/nav-quick-tray.html.twig", "partials/nav.html.twig", 14)->display($context);
            // line 15
            echo "
        <div data-simplebar class=\"admin-menu-wrapper\">
            <ul id=\"admin-menu\">
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", []), "plugins_hooked_nav", []));
            foreach ($context['_seq'] as $context["label"] => $context["item"]) {
                // line 19
                echo "                    ";
                $context["route"] = twig_trim_filter(((($this->getAttribute($context["item"], "route", [], "any", true, true) &&  !(null === $this->getAttribute($context["item"], "route", [])))) ? ($this->getAttribute($context["item"], "route", [])) : ($this->getAttribute($context["item"], "location", []))), "/");
                // line 20
                echo "                    ";
                $context["location"] = (twig_trim_filter(((($this->getAttribute($context["item"], "location", [], "any", true, true) &&  !(null === $this->getAttribute($context["item"], "location", [])))) ? ($this->getAttribute($context["item"], "location", [])) : ($this->getAttribute($context["item"], "route", []))), "/") . "/");
                // line 21
                echo "                    ";
                $context["auth_rule"] = ((twig_test_iterable($this->getAttribute($context["item"], "authorize", []))) ? ($this->getAttribute($context["item"], "authorize", [])) : ([0 => (($this->getAttribute($context["item"], "authorize", [])) ? ($this->getAttribute($context["item"], "authorize", [])) : (("admin." . ($context["route"] ?? null)))), 1 => "admin.super"]));
                // line 22
                echo "                    ";
                if ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize(($context["auth_rule"] ?? null))) {
                    // line 23
                    echo "                        <li class=\"";
                    echo (($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->startsWithFilter(($context["nav_route"] ?? null), ($context["location"] ?? null))) ? ("selected") : (""));
                    echo "\">
                            <a href=\"";
                    // line 24
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(($context["route"] ?? null)), "html", null, true);
                    echo "\">
                                <i class=\"fa fa-fw ";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", []), "html", null, true);
                    echo "\"></i>
                                <em>";
                    // line 26
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($context["label"]), "html", null, true);
                    echo "</em>
                                ";
                    // line 27
                    $context["badge"] = ((($this->getAttribute($context["item"], "badge", [], "any", true, true) &&  !(null === $this->getAttribute($context["item"], "badge", [])))) ? ($this->getAttribute($context["item"], "badge", [])) : (null));
                    // line 28
                    echo "                                ";
                    if (($context["badge"] ?? null)) {
                        // line 29
                        echo "                                <span class=\"badges ";
                        if ($this->getAttribute(($context["badge"] ?? null), "updates", [])) {
                            echo "with-updates";
                        }
                        echo "\">
                                    ";
                        // line 30
                        if ($this->getAttribute(($context["badge"] ?? null), "updates", [], "any", true, true)) {
                            echo "<span class=\"badge updates\">";
                            (($this->getAttribute(($context["badge"] ?? null), "updates", [])) ? (print (twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "updates", []), "html", null, true))) : (print ("")));
                            echo "</span>";
                        }
                        // line 31
                        echo "                                    <span class=\"badge count\">";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "count", []), "html", null, true);
                        echo "</span>
                                </span>
                                ";
                    }
                    // line 34
                    echo "                            </a>
                        </li>
                    ";
                }
                // line 37
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "
                ";
            // line 39
            $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = null;
            try {
                $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 =                 $this->loadTemplate("partials/nav-pro.html.twig", "partials/nav.html.twig", 39);
            } catch (LoaderError $e) {
                // ignore missing template
            }
            if ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) {
                $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4->display($context);
            }
            // line 40
            echo "
                <li>
                    <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((($context["base_url_relative"] ?? null) . "/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . "logout"), 1 => "logout-form", 2 => "logout-nonce"], "method"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-sign-out\"></i><em>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.LOGOUT"), "html", null, true);
            echo "</em></a>
                </li>
            </ul>
        </div>
    </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 42,  153 => 40,  143 => 39,  140 => 38,  134 => 37,  129 => 34,  122 => 31,  116 => 30,  109 => 29,  106 => 28,  104 => 27,  100 => 26,  96 => 25,  92 => 24,  87 => 23,  84 => 22,  81 => 21,  78 => 20,  75 => 19,  71 => 18,  66 => 15,  64 => 14,  61 => 13,  59 => 12,  55 => 10,  52 => 9,  48 => 7,  46 => 6,  42 => 5,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set nav_hover = config.plugins.admin.sidebar.activate == 'hover' %}
{% if authorize(['admin.login', 'admin.super']) %}
    <nav id=\"admin-sidebar\" data-quickopen=\"{{ config.plugins.admin.sidebar.activate == 'hover' ? 'true' : 'false' }}\" data-quickopen-delay=\"{{ config.plugins.admin.sidebar.hover_delay }}\">

        <div id=\"admin-logo\" class=\"{{ nav_hover ? 'nav-hover' }}\">
            {% if not nav_hover %}
                <div id=\"open-handle\" data-sidebar-toggle><i class=\"fa fa-angle-right\"></i></div>
            {% endif %}
            {% include 'partials/logo.html.twig' %}
        </div>

        {% include 'partials/nav-user-details.html.twig' %}

        {% include 'partials/nav-quick-tray.html.twig' %}

        <div data-simplebar class=\"admin-menu-wrapper\">
            <ul id=\"admin-menu\">
                {% for label, item in grav.twig.plugins_hooked_nav %}
                    {% set route = (item.route ?? item.location)|trim('/') %}
                    {% set location = (item.location ?? item.route)|trim('/') ~ '/' %}
                    {% set auth_rule = item.authorize is iterable ? item.authorize : [item.authorize ?: 'admin.' ~ route, 'admin.super'] %}
                    {% if authorize(auth_rule) %}
                        <li class=\"{{ nav_route|starts_with(location) ? 'selected' : '' }}\">
                            <a href=\"{{ admin_route(route) }}\">
                                <i class=\"fa fa-fw {{ item.icon }}\"></i>
                                <em>{{ label|tu }}</em>
                                {% set badge = item.badge ?? null %}
                                {% if badge %}
                                <span class=\"badges {% if badge.updates %}with-updates{% endif %}\">
                                    {% if badge.updates is defined %}<span class=\"badge updates\">{{ badge.updates ?: '' }}</span>{% endif %}
                                    <span class=\"badge count\">{{ badge.count }}</span>
                                </span>
                                {% endif %}
                            </a>
                        </li>
                    {% endif %}
                {% endfor %}

                {% include 'partials/nav-pro.html.twig' ignore missing %}

                <li>
                    <a href=\"{{ uri.addNonce(base_url_relative ~ '/task' ~ config.system.param_sep ~ 'logout', 'logout-form', 'logout-nonce') }}\"><i class=\"fa fa-fw fa-sign-out\"></i><em>{{ \"PLUGIN_ADMIN.LOGOUT\"|tu }}</em></a>
                </li>
            </ul>
        </div>
    </nav>
{% endif %}
", "partials/nav.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/nav.html.twig");
    }
}
