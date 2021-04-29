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

/* partials/userinfo-avatar.html.twig */
class __TwigTemplate_31688423dd7087a29e89ec80b02d1f8768b31ab851d726c5fb0abd71fcf0a1f6 extends \Twig\Template
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
        if ($this->getAttribute(($context["data"] ?? null), "avatar", [])) {
            // line 2
            echo "    <label><img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "getAvatarUrl", [], "method"), "html", null, true);
            echo "\" /></label>
";
        } else {
            // line 4
            echo "    <label><img referrerpolicy=\"no-referrer\" src=\"https://www.gravatar.com/avatar/";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->md5Filter($this->getAttribute(($context["data"] ?? null), "email", [])), "html", null, true);
            echo "?s=200\" /></label>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/userinfo-avatar.html.twig";
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
        return new Source("{% if data.avatar %}
    <label><img src=\"{{ data.getAvatarUrl() }}\" /></label>
{% else %}
    <label><img referrerpolicy=\"no-referrer\" src=\"https://www.gravatar.com/avatar/{{ data.email|md5 }}?s=200\" /></label>
{% endif %}", "partials/userinfo-avatar.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/userinfo-avatar.html.twig");
    }
}
