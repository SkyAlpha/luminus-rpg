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

/* flex-objects/types/pages/buttons/preview.html.twig */
class __TwigTemplate_ddfd2c582eab6f8791ec6bcc31f5222509525c1bc3fb3990e81fab6164262635 extends \Twig\Template
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
        if (($this->getAttribute(($context["object"] ?? null), "routable", []) && $this->getAttribute(($context["object"] ?? null), "published", []))) {
            // line 2
            echo "<a id=\"titlebar-button-preview\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["route"] ?? null), "withGravParam", [0 => "", 1 => "preview"], "method"), "html", null, true);
            echo "\" class=\"button\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PREVIEW"), "html", null, true);
            echo "\">
    <i class=\"fa fa-eye\"></i>
</a>
";
        }
    }

    public function getTemplateName()
    {
        return "flex-objects/types/pages/buttons/preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if object.routable and object.published %}
<a id=\"titlebar-button-preview\" href=\"{{ route.withGravParam('', 'preview') }}\" class=\"button\" title=\"{{ \"PLUGIN_ADMIN.PREVIEW\"|tu }}\">
    <i class=\"fa fa-eye\"></i>
</a>
{% endif %}
", "flex-objects/types/pages/buttons/preview.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/pages/buttons/preview.html.twig");
    }
}
