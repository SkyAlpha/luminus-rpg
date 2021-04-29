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

/* partials/footer.html.twig */
class __TwigTemplate_8c7cd162dfd75b1189814a1f094d590465a1b86f2641fa891f186811421099d9 extends \Twig\Template
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
        if (($context["custom_admin_footer"] ?? null)) {
            // line 2
            echo "    ";
            echo ($context["custom_admin_footer"] ?? null);
            echo "
";
        } else {
            // line 4
            echo "    <a href=\"http://getgrav.org\" target=\"_blank\" rel=\"noopener noreferrer\">Grav</a> v<span class=\"grav-version\">";
            echo twig_escape_filter($this->env, twig_constant("GRAV_VERSION"), "html", null, true);
            echo "</span> - Admin v";
            echo twig_escape_filter($this->env, ($context["admin_version"] ?? null), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.WAS_MADE_WITH")), "html", null, true);
            echo " <i class=\"fa fa-heart-o pulse\"></i> ";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.BY")), "html", null, true);
            echo " <a href=\"https://trilby.media\" target=\"_blank\" rel=\"noopener noreferrer\">Trilby Media</a>.
";
        }
    }

    public function getTemplateName()
    {
        return "partials/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if custom_admin_footer %}
    {{ custom_admin_footer|raw }}
{% else %}
    <a href=\"http://getgrav.org\" target=\"_blank\" rel=\"noopener noreferrer\">Grav</a> v<span class=\"grav-version\">{{ constant('GRAV_VERSION') }}</span> - Admin v{{ admin_version }} - {{ \"PLUGIN_ADMIN.WAS_MADE_WITH\"|tu|lower }} <i class=\"fa fa-heart-o pulse\"></i> {{ \"PLUGIN_ADMIN.BY\"|tu|lower }} <a href=\"https://trilby.media\" target=\"_blank\" rel=\"noopener noreferrer\">Trilby Media</a>.
{% endif %}
", "partials/footer.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/footer.html.twig");
    }
}
