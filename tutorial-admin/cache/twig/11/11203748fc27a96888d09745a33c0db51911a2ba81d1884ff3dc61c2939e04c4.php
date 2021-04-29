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

/* partials/login.html.twig */
class __TwigTemplate_83098ecb21d7b337e487b2fa5c66489dcf5facdc4ea5ef84fea1f8e31e2a0864 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'messages' => [$this, 'block_messages'],
            'body' => [$this, 'block_body'],
            'instructions' => [$this, 'block_instructions'],
            'integration' => [$this, 'block_integration'],
            'form' => [$this, 'block_form'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["scope"] = $this->getAttribute(($context["form"] ?? null), "scope", []);
        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "partials/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_messages($context, array $blocks = [])
    {
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        // line 7
        echo "<body id=\"admin-login-wrapper\">
    <section id=\"admin-login\" class=\"login-box-shadow ";
        // line 8
        echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
        echo "\">

        ";
        // line 10
        $this->loadTemplate("partials/login-logo.html.twig", "partials/login.html.twig", 10)->display($context);
        // line 11
        echo "
        ";
        // line 12
        $this->loadTemplate("partials/messages.html.twig", "partials/login.html.twig", 12)->display($context);
        // line 13
        echo "
        ";
        // line 14
        $this->displayBlock('instructions', $context, $blocks);
        // line 15
        echo "
        ";
        // line 16
        $this->displayBlock('integration', $context, $blocks);
        // line 17
        echo "
        <form method=\"post\" action=\"\">
            <div class=\"padding\">
                ";
        // line 20
        $this->displayBlock('form', $context, $blocks);
        // line 21
        echo "                ";
        echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->nonceFieldFunc($this->getAttribute(($context["form"] ?? null), "getNonceAction", [], "method"), $this->getAttribute(($context["form"] ?? null), "getNonceName", [], "method"));
        echo "
            </div>
        </form>

        <script>
            \$(document).ready( function() {
                \$('#messages').delay(5000).animate({ height: 'toggle', opacity: 'toggle' }, 'slow');
            });
        </script>
    </section>
</body>
";
    }

    // line 14
    public function block_instructions($context, array $blocks = [])
    {
    }

    // line 16
    public function block_integration($context, array $blocks = [])
    {
    }

    // line 20
    public function block_form($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "partials/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 20,  108 => 16,  103 => 14,  86 => 21,  84 => 20,  79 => 17,  77 => 16,  74 => 15,  72 => 14,  69 => 13,  67 => 12,  64 => 11,  62 => 10,  57 => 8,  54 => 7,  51 => 6,  46 => 4,  41 => 1,  39 => 2,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'partials/base.html.twig' %}
{% set scope = form.scope %}

{% block messages %}{% endblock %}

{% block body %}
<body id=\"admin-login-wrapper\">
    <section id=\"admin-login\" class=\"login-box-shadow {{ classes }}\">

        {% include 'partials/login-logo.html.twig' %}

        {% include 'partials/messages.html.twig' %}

        {% block instructions %}{% endblock %}

        {% block integration %}{% endblock %}

        <form method=\"post\" action=\"\">
            <div class=\"padding\">
                {% block form %}{% endblock %}
                {{ nonce_field(form.getNonceAction(), form.getNonceName())|raw }}
            </div>
        </form>

        <script>
            \$(document).ready( function() {
                \$('#messages').delay(5000).animate({ height: 'toggle', opacity: 'toggle' }, 'slow');
            });
        </script>
    </section>
</body>
{% endblock %}
", "partials/login.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/login.html.twig");
    }
}
