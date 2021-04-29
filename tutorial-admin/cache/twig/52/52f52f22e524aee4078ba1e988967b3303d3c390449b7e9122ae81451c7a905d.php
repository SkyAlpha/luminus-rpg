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

/* partials/dashboard-maintenance.html.twig */
class __TwigTemplate_035ef31f430d19e8a5cfd88015a646c0bc4d721948f165a9f030b7167c0f9bc4 extends \Twig\Template
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
        if ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.maintenance", 1 => "admin.super"])) {
            // line 2
            echo "    ";
            $context["backup"] = $this->getAttribute(($context["admin"] ?? null), "lastBackup", [], "method");
            // line 3
            echo "
    <div id=\"updates\" class=\"dashboard-item dashboard-left\">
        <div class=\"secondary-accent default-box-shadow\">
            <h1>";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.MAINTENANCE"), "html", null, true);
            echo "</h1>
            <div class=\"admin-update-charts\">
                <div class=\"updates-chart\" data-chart-name=\"updates\" data-chart-type=\"pie\" data-chart-data=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["series" => [0 => 100, 1 => 0]]), "html_attr");
            echo "\">
                    <div class=\"chart-wrapper\">
                        <div class=\"ct-chart chart-loader\"><i class=\"fa fa-refresh fa-spin\"></i></div>
                        <span class=\"numeric hidden\"><span>-</span><em>";
            // line 11
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.UPDATED")), "html", null, true);
            echo "</em></span>
                    </div>
                    <p class=\"js__updates-available-description\">&nbsp;</p>
                </div>
                <div class=\"backups-chart\" data-chart-name=\"backups\" data-chart-type=\"pie\" data-chart-data=\"";
            // line 15
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["series" => [0 => $this->getAttribute(($context["backup"] ?? null), "chart_fill", []), 1 => $this->getAttribute(($context["backup"] ?? null), "chart_empty", [])]]), "html_attr");
            echo "\">
                    <div class=\"chart-wrapper\">
                        <div class=\"ct-chart chart-loader\"><i class=\"fa fa-refresh fa-spin\"></i></div>
                        <span class=\"numeric hidden\">";
            // line 18
            echo $this->getAttribute(($context["backup"] ?? null), "days", []);
            echo "<em>";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DAYS")), "html", null, true);
            echo "</em></span>
                    </div>
                    <p class=\"hidden\">";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.LAST_BACKUP"), "html", null, true);
            echo "</p>
                </div>
            </div>

            <div class=\"flush-bottom button-bar\">
                <a class=\"button hidden\" href=\"#\" data-update-packages data-remodal-target=\"update-packages\"  data-plugin-action=\"start-packages-update\"><i class=\"fa fa-cloud-download\"></i> ";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.UPDATE"), "html", null, true);
            echo "</a>
                ";
            // line 26
            $this->loadTemplate("partials/backups-button.html.twig", "partials/dashboard-maintenance.html.twig", 26)->display($context);
            // line 27
            echo "            </div>
        </div>
    </div>

    ";
            // line 31
            $this->loadTemplate("partials/modal-update-packages.html.twig", "partials/dashboard-maintenance.html.twig", 31)->display(twig_array_merge($context, ["type" => "plugin"]));
            // line 32
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "partials/dashboard-maintenance.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 32,  91 => 31,  85 => 27,  83 => 26,  79 => 25,  71 => 20,  64 => 18,  58 => 15,  51 => 11,  45 => 8,  40 => 6,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if authorize(['admin.maintenance', 'admin.super']) %}
    {% set backup = admin.lastBackup() %}

    <div id=\"updates\" class=\"dashboard-item dashboard-left\">
        <div class=\"secondary-accent default-box-shadow\">
            <h1>{{ \"PLUGIN_ADMIN.MAINTENANCE\"|tu }}</h1>
            <div class=\"admin-update-charts\">
                <div class=\"updates-chart\" data-chart-name=\"updates\" data-chart-type=\"pie\" data-chart-data=\"{{ {'series': [100, 0]}|json_encode|e('html_attr') }}\">
                    <div class=\"chart-wrapper\">
                        <div class=\"ct-chart chart-loader\"><i class=\"fa fa-refresh fa-spin\"></i></div>
                        <span class=\"numeric hidden\"><span>-</span><em>{{ \"PLUGIN_ADMIN.UPDATED\"|tu|lower }}</em></span>
                    </div>
                    <p class=\"js__updates-available-description\">&nbsp;</p>
                </div>
                <div class=\"backups-chart\" data-chart-name=\"backups\" data-chart-type=\"pie\" data-chart-data=\"{{ {'series': [backup.chart_fill, backup.chart_empty]}|json_encode|e('html_attr') }}\">
                    <div class=\"chart-wrapper\">
                        <div class=\"ct-chart chart-loader\"><i class=\"fa fa-refresh fa-spin\"></i></div>
                        <span class=\"numeric hidden\">{{ backup.days|raw }}<em>{{ \"PLUGIN_ADMIN.DAYS\"|tu|lower }}</em></span>
                    </div>
                    <p class=\"hidden\">{{ \"PLUGIN_ADMIN.LAST_BACKUP\"|tu }}</p>
                </div>
            </div>

            <div class=\"flush-bottom button-bar\">
                <a class=\"button hidden\" href=\"#\" data-update-packages data-remodal-target=\"update-packages\"  data-plugin-action=\"start-packages-update\"><i class=\"fa fa-cloud-download\"></i> {{ \"PLUGIN_ADMIN.UPDATE\"|tu }}</a>
                {% include 'partials/backups-button.html.twig' %}
            </div>
        </div>
    </div>

    {% include 'partials/modal-update-packages.html.twig' with { type: 'plugin' } %}

{% endif %}
", "partials/dashboard-maintenance.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/dashboard-maintenance.html.twig");
    }
}
