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

/* partials/dashboard-pages.html.twig */
class __TwigTemplate_dd1e8426a632afd914bb88d740897d297a607b16c38b1b32f90a3629bdf5f207 extends \Twig\Template
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
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.pages", 1 => "admin.super"])) {
            // line 2
            echo "    <div id=\"latest\">
        <div class=\"button-bar\">
            <a class=\"button\" href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/pages"), "html", null, true);
            echo "\"><i class=\"fa fa-fw fa-file-text-o\"></i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.MANAGE_PAGES"), "html", null, true);
            echo "</a>
        </div>
        <h1>";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.LATEST_PAGE_UPDATES"), "html", null, true);
            echo "</h1>
        <table>
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["admin"] ?? null), "latestPages", []));
            foreach ($context['_seq'] as $context["_key"] => $context["latest"]) {
                if ($this->getAttribute(($context["admin"] ?? null), "latestPages", [])) {
                    // line 9
                    echo "            ";
                    $context["route"] = $this->getAttribute($context["latest"], "rawRoute", []);
                    // line 10
                    echo "            <tr>
                <td class=\"triple page-title\">
                    <a href=\"";
                    // line 12
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/pages/" . twig_trim_filter(($context["route"] ?? null), "/"))), "html", null, true);
                    echo "\"><i class=\"fa fa-fw fa-file-text-o\"></i> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["latest"], "title", []), "html", null, true);
                    echo "</a></td>
                <td class=\"triple page-route\">";
                    // line 13
                    echo twig_escape_filter($this->env, ($context["route"] ?? null), "html", null, true);
                    echo "</td><td>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminNicetimeFilter($this->getAttribute($context["latest"], "modified", [])), "html", null, true);
                    echo "</td>
            </tr>
        ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latest'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        </table>
    </div>
";
        } else {
            // line 19
            echo "    <div class=\"padding\">You don't have sufficient access to view the dashboard...</div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/dashboard-pages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 19,  78 => 16,  66 => 13,  60 => 12,  56 => 10,  53 => 9,  48 => 8,  43 => 6,  36 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if authorize(['admin.pages', 'admin.super']) %}
    <div id=\"latest\">
        <div class=\"button-bar\">
            <a class=\"button\" href=\"{{ admin_route('/pages') }}\"><i class=\"fa fa-fw fa-file-text-o\"></i>{{ \"PLUGIN_ADMIN.MANAGE_PAGES\"|tu }}</a>
        </div>
        <h1>{{ \"PLUGIN_ADMIN.LATEST_PAGE_UPDATES\"|tu }}</h1>
        <table>
        {% for latest in admin.latestPages if admin.latestPages %}
            {% set route = latest.rawRoute %}
            <tr>
                <td class=\"triple page-title\">
                    <a href=\"{{ admin_route('/pages/' ~ route|trim('/')) }}\"><i class=\"fa fa-fw fa-file-text-o\"></i> {{ latest.title }}</a></td>
                <td class=\"triple page-route\">{{ route }}</td><td>{{ latest.modified|adminNicetime }}</td>
            </tr>
        {% endfor %}
        </table>
    </div>
{% else %}
    <div class=\"padding\">You don't have sufficient access to view the dashboard...</div>
{% endif %}
", "partials/dashboard-pages.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/dashboard-pages.html.twig");
    }
}
