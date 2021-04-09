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

/* partials/nav-quick-tray.html.twig */
class __TwigTemplate_6ac0071e437ed06d8e7a0cb9ac7739fe947de00202578a7b6eadf281085b2bb3 extends \Twig\Template
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
        $context["clear_cache_url"] = (((($context["base_url_relative"] ?? null) . "/cache.json/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . twig_escape_filter($this->env, "clearCache", "html_attr"));
        // line 2
        echo "<ul id=\"admin-nav-quick-tray\">
    ";
        // line 3
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super", 2 => "admin.cache"])) {
            // line 4
            echo "    <li class=\"hint--bottom\" data-hint=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CLEAR_CACHE"), "html", null, true);
            echo "\">
        <a data-clear-cache-type=\"\" data-clear-cache=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => ($context["clear_cache_url"] ?? null), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
            echo "\">
            <i class=\"fa fa-retweet\"></i>
        </a>
    </li>
    ";
        }
        // line 10
        echo "    ";
        if (($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.super"]) && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "whitelabel", []), "quicktray_recompile", []))) {
            // line 11
            echo "        <li class=\"hint--bottom\" data-hint=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.QUICKTRAY_RECOMPILE_HELP"), "html", null, true);
            echo "\">
            <a data-recompile-scss href=\"#\">
                <i class=\"fa fa-paint-brush\"></i>
            </a>
        </li>
    ";
        }
        // line 17
        echo "    ";
        if ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", []), "plugins_quick_tray", [])) {
            // line 18
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", []), "plugins_quick_tray", []));
            foreach ($context['_seq'] as $context["label"] => $context["item"]) {
                // line 19
                echo "        ";
                if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize(((($this->getAttribute($context["item"], "authorize", [], "any", true, true) && twig_test_iterable($this->getAttribute($context["item"], "authorize", [])))) ? ($this->getAttribute($context["item"], "authorize", [])) : ([0 => (($this->getAttribute($context["item"], "authorize", [])) ? ($this->getAttribute($context["item"], "authorize", [])) : (("admin." . (($this->getAttribute($context["item"], "location", [])) ? ($this->getAttribute($context["item"], "location", [])) : ($this->getAttribute($context["item"], "route", [])))))), 1 => "admin.super"])))) {
                    // line 20
                    echo "            ";
                    $context["data_tags"] = "";
                    // line 21
                    echo "            ";
                    if ($this->getAttribute($context["item"], "data", [])) {
                        // line 22
                        echo "                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "data", []));
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 23
                            echo "                    ";
                            $context["data_tags"] = (((((($context["data_tags"] ?? null) . " data-") . $context["key"]) . "=\"") . $context["value"]) . "\"");
                            // line 24
                            echo "                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 25
                        echo "            ";
                    }
                    // line 26
                    echo "            <li class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "class", []), "html", null, true);
                    echo " hint--bottom\" data-hint=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "hint", []), "html", null, true);
                    echo "\" ";
                    echo ($context["data_tags"] ?? null);
                    echo ">
            ";
                    // line 27
                    if ($this->getAttribute($context["item"], "route", [])) {
                        // line 28
                        echo "                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->urlFunc($this->getAttribute($context["item"], "route", [])), "html", null, true);
                        echo "\" ";
                        if ($this->getAttribute($context["item"], "target", [])) {
                            echo "target=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "target", []), "html", null, true);
                            echo "\"";
                        }
                        echo ">
                    <i class=\"fa fa-fw ";
                        // line 29
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", []), "html", null, true);
                        echo "\"></i>
                </a>
            ";
                    } else {
                        // line 32
                        echo "                <i class=\"fa fa-fw ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", []), "html", null, true);
                        echo "\"></i>
            ";
                    }
                    // line 34
                    echo "            </li>
        ";
                }
                // line 36
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "    ";
        } else {
            // line 38
            echo "        ";
            if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super"])) {
                // line 39
                echo "        <li class=\"hint--bottom\" data-hint=\"Add the 'quick-tray-links' plugin for more...\">
            <a href=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/plugins/install"), "html", null, true);
                echo "\">
                <i class=\"fa fa-plus\"></i>
            </a>
        </li>
        ";
            }
            // line 45
            echo "    ";
        }
        // line 46
        echo "</ul>

";
    }

    public function getTemplateName()
    {
        return "partials/nav-quick-tray.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 46,  158 => 45,  150 => 40,  147 => 39,  144 => 38,  141 => 37,  135 => 36,  131 => 34,  125 => 32,  119 => 29,  108 => 28,  106 => 27,  97 => 26,  94 => 25,  88 => 24,  85 => 23,  80 => 22,  77 => 21,  74 => 20,  71 => 19,  66 => 18,  63 => 17,  53 => 11,  50 => 10,  42 => 5,  37 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set clear_cache_url = base_url_relative ~ '/cache.json/task' ~ config.system.param_sep ~ 'clearCache'|e('html_attr') %}
<ul id=\"admin-nav-quick-tray\">
    {% if authorize(['admin.maintenance', 'admin.super', 'admin.cache']) %}
    <li class=\"hint--bottom\" data-hint=\"{{ \"PLUGIN_ADMIN.CLEAR_CACHE\"|tu }}\">
        <a data-clear-cache-type=\"\" data-clear-cache=\"{{ uri.addNonce(clear_cache_url, 'admin-form', 'admin-nonce') }}\">
            <i class=\"fa fa-retweet\"></i>
        </a>
    </li>
    {% endif %}
    {% if authorize(['admin.super']) and config.plugins.admin.whitelabel.quicktray_recompile %}
        <li class=\"hint--bottom\" data-hint=\"{{ \"PLUGIN_ADMIN.QUICKTRAY_RECOMPILE_HELP\"|tu }}\">
            <a data-recompile-scss href=\"#\">
                <i class=\"fa fa-paint-brush\"></i>
            </a>
        </li>
    {% endif %}
    {% if grav.twig.plugins_quick_tray %}
    {% for label, item in grav.twig.plugins_quick_tray %}
        {% if authorize((item.authorize is defined and item.authorize is iterable) ? item.authorize : [item.authorize ?: ('admin.' ~ (item.location ?: item.route)), 'admin.super']) %}
            {% set data_tags = '' %}
            {% if (item.data) %}
                {% for key, value in item.data %}
                    {% set data_tags = data_tags ~ ' data-' ~ key ~ '=\"' ~ value ~ '\"' %}
                {% endfor %}
            {% endif %}
            <li class=\"{{ item.class }} hint--bottom\" data-hint=\"{{ item.hint }}\" {{ data_tags|raw }}>
            {% if item.route %}
                <a href=\"{{ url(item.route) }}\" {% if item.target %}target=\"{{ item.target }}\"{% endif %}>
                    <i class=\"fa fa-fw {{ item.icon }}\"></i>
                </a>
            {% else %}
                <i class=\"fa fa-fw {{ item.icon }}\"></i>
            {% endif %}
            </li>
        {% endif %}
    {% endfor %}
    {% else %}
        {% if authorize(['admin.maintenance', 'admin.super']) %}
        <li class=\"hint--bottom\" data-hint=\"Add the 'quick-tray-links' plugin for more...\">
            <a href=\"{{ admin_route('/plugins/install') }}\">
                <i class=\"fa fa-plus\"></i>
            </a>
        </li>
        {% endif %}
    {% endif %}
</ul>

", "partials/nav-quick-tray.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/nav-quick-tray.html.twig");
    }
}
