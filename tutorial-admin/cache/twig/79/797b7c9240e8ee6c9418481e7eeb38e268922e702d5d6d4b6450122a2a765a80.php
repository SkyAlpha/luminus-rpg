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

/* partials/dashboard-problems.html.twig */
class __TwigTemplate_1486cdd9ab135f1ee872fed39c29da5bbe9a626797e32d1448b593caec5489a1 extends \Twig\Template
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
        if (($this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize([0 => "admin.plugins", 1 => "admin.super"]) && (null === $this->getAttribute(($context["grav"] ?? null), "flex_objects", [], "array")))) {
            // line 2
            echo "    <div id=\"dependency-missing\" class=\"dashboard-item-flex\">
        <div class=\"alert warning\">
            <h1>Admin plugin dependency is missing</h1>

            <p>Admin now requires the Flex Objects plugin for managing <em>User Accounts</em> and <em>Flex Pages</em>. For more information, please <a href=\"https://learn.getgrav.org/17/admin-panel/faq#flex-objects\">check the documentation</a>.</p>
            <p><a href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc("/plugins/flex-objects"), "html", null, true);
            echo "\" class=\"button\"><i class=\"fa fa-download\"></i> Install and enable Flex Objects plugin</a></p>
        </div>
    </div>

";
        }
    }

    public function getTemplateName()
    {
        return "partials/dashboard-problems.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if authorize(['admin.plugins', 'admin.super']) and grav['flex_objects'] is null %}
    <div id=\"dependency-missing\" class=\"dashboard-item-flex\">
        <div class=\"alert warning\">
            <h1>Admin plugin dependency is missing</h1>

            <p>Admin now requires the Flex Objects plugin for managing <em>User Accounts</em> and <em>Flex Pages</em>. For more information, please <a href=\"https://learn.getgrav.org/17/admin-panel/faq#flex-objects\">check the documentation</a>.</p>
            <p><a href=\"{{ admin_route('/plugins/flex-objects') }}\" class=\"button\"><i class=\"fa fa-download\"></i> Install and enable Flex Objects plugin</a></p>
        </div>
    </div>

{% endif %}
", "partials/dashboard-problems.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/dashboard-problems.html.twig");
    }
}
