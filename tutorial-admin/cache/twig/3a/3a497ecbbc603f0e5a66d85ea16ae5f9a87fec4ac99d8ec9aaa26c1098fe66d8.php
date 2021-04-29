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

/* partials/backups-button.html.twig */
class __TwigTemplate_3718a67c5751a4a679187ea90c49c29be561996f72776d86c57224cbe2f67700 extends \Twig\Template
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
        echo "<div class=\"button-group\">
    ";
        // line 2
        $context["profiles"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "backups", []), "getBackupProfiles", [], "method");
        // line 3
        echo "    ";
        $context["backup_url"] = $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((((($context["base_url_relative"] ?? null) . "/backup.json/id") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . "%BACKUP_ID/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . "backup"), 1 => "admin-form", 2 => "admin-nonce"], "method");
        // line 4
        echo "
    <button class=\"button\" data-backup data-ajax=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_replace_filter(($context["backup_url"] ?? null), ["%BACKUP_ID" => "0"]), "html", null, true);
        echo "\">
        <i class=\"fa fa-life-ring\"></i> ";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BACKUP_NOW"), "html", null, true);
        echo "
    </button>
    <button type=\"button\" class=\"button dropdown-toggle\" data-toggle=\"dropdown\">
        <i class=\"fa fa-caret-down\"></i>
    </button>
    <ul class=\"dropdown-menu\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["profiles"] ?? null));
        foreach ($context['_seq'] as $context["id"] => $context["profile"]) {
            // line 13
            echo "            <li>
                <a data-backup data-ajax=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_replace_filter(($context["backup_url"] ?? null), ["%BACKUP_ID" => $context["id"]]), "html", null, true);
            echo "\" class=\"button\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["profile"], "name", []), "html", null, true);
            echo "</a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['profile'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "        <li>
            <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/tools/backups"), "html", null, true);
        echo "\" class=\"button\">Backups Manager</a>
        </li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "partials/backups-button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 18,  72 => 17,  61 => 14,  58 => 13,  54 => 12,  45 => 6,  41 => 5,  38 => 4,  35 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"button-group\">
    {% set profiles = grav.backups.getBackupProfiles() %}
    {% set backup_url = uri.addNonce(base_url_relative ~ \"/backup.json/id\" ~ config.system.param_sep ~ \"%BACKUP_ID/task\" ~ config.system.param_sep ~ \"backup\", 'admin-form', 'admin-nonce') %}

    <button class=\"button\" data-backup data-ajax=\"{{ backup_url|replace({'%BACKUP_ID':'0'}) }}\">
        <i class=\"fa fa-life-ring\"></i> {{ \"PLUGIN_ADMIN.BACKUP_NOW\"|tu }}
    </button>
    <button type=\"button\" class=\"button dropdown-toggle\" data-toggle=\"dropdown\">
        <i class=\"fa fa-caret-down\"></i>
    </button>
    <ul class=\"dropdown-menu\">
        {% for id, profile in profiles %}
            <li>
                <a data-backup data-ajax=\"{{ backup_url|replace({'%BACKUP_ID':id}) }}\" class=\"button\">{{ profile.name }}</a>
            </li>
        {% endfor %}
        <li>
            <a href=\"{{ admin_route('/tools/backups') }}\" class=\"button\">Backups Manager</a>
        </li>
    </ul>
</div>
", "partials/backups-button.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/backups-button.html.twig");
    }
}
