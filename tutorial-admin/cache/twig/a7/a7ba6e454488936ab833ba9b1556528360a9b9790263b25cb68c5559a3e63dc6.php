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

/* edit title template (string template b2c66b8c2c0ca9b468f59b3b4916afd5deb2d8999d7fae3fecf32124121dcbd0) */
class __TwigTemplate_a5042c5b01f77ddf40d692ca60579b655d4b4fa4c21f1b4e63be8d04ddddffc4 extends \Twig\Template
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
        echo twig_escape_filter($this->env, ((($this->getAttribute(($context["form"] ?? null), "value", [0 => "fullname"], "method", true, true) &&  !(null === $this->getAttribute(($context["form"] ?? null), "value", [0 => "fullname"], "method")))) ? ($this->getAttribute(($context["form"] ?? null), "value", [0 => "fullname"], "method")) : ($this->getAttribute(($context["form"] ?? null), "value", [0 => "username"], "method"))), "html", null, true);
        echo " &lt;";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "value", [0 => "email"], "method"), "html", null, true);
        echo "&gt;";
    }

    public function getTemplateName()
    {
        return "edit title template (string template b2c66b8c2c0ca9b468f59b3b4916afd5deb2d8999d7fae3fecf32124121dcbd0)";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{{ form.value('fullname') ?? form.value('username') }} &lt;{{ form.value('email') }}&gt;", "edit title template (string template b2c66b8c2c0ca9b468f59b3b4916afd5deb2d8999d7fae3fecf32124121dcbd0)", "");
    }
}
