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

/* partials/stylesheets.html.twig */
class __TwigTemplate_569bf12be2d9aadfc75eabadcadd85aa0996d08848bffa620abbc4082f306582 extends \Twig\Template
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
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css-compiled/nucleus.css"), 1 => ["priority" => 20]], "method");
        // line 2
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css-compiled/template.css"), 1 => ["priority" => 20]], "method");
        // line 3
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["base_url_frontend"] ?? null) . "/assets/admin-preset.css"), 1 => ["priority" => 5]], "method");
        // line 4
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css-compiled/simple-fonts.css")], "method");
        // line 5
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/fork-awesome.min.css")], "method");
        // line 6
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/chartist.min.css")], "method");
        // line 7
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/selectize.min.css")], "method");
        // line 8
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/hint.base.min.css")], "method");
        // line 9
        $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/iconpicker.css")], "method");
        // line 10
        if (((($this->getAttribute(($context["browser"] ?? null), "getBrowser", []) == "msie") && ($this->getAttribute(($context["browser"] ?? null), "getVersion", []) >= 8)) && ($this->getAttribute(($context["browser"] ?? null), "getVersion", []) <= 9))) {
            // line 11
            echo "    ";
            $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/nucleus-ie9.css")], "method");
            // line 12
            echo "    ";
            $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/pure-0.5.0/grids-min.css")], "method");
        }
        // line 14
        if ($this->getAttribute(($context["language_codes"] ?? null), "rtl", [0 => $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "user", []), "language", [])], "method")) {
            // line 15
            echo "    ";
            $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (($context["theme_url"] ?? null) . "/css/rtl.css")], "method");
        }
    }

    public function getTemplateName()
    {
        return "partials/stylesheets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 15,  57 => 14,  53 => 12,  50 => 11,  48 => 10,  46 => 9,  44 => 8,  42 => 7,  40 => 6,  38 => 5,  36 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% do assets.addCss(theme_url~'/css-compiled/nucleus.css', {priority: 20}) %}
{% do assets.addCss(theme_url~'/css-compiled/template.css', {priority: 20}) %}
{% do assets.addCss(base_url_frontend~'/assets/admin-preset.css', {priority: 5}) %}
{% do assets.addCss(theme_url~'/css-compiled/simple-fonts.css') %}
{% do assets.addCss(theme_url~'/css/fork-awesome.min.css') %}
{% do assets.addCss(theme_url~'/css/chartist.min.css') %}
{% do assets.addCss(theme_url~'/css/selectize.min.css') %}
{% do assets.addCss(theme_url~'/css/hint.base.min.css') %}
{% do assets.addCss(theme_url~'/css/iconpicker.css') %}
{% if browser.getBrowser == 'msie' and browser.getVersion >= 8 and browser.getVersion <= 9 %}
    {% do assets.addCss(theme_url~'/css/nucleus-ie9.css') %}
    {% do assets.addCss(theme_url~'/css/pure-0.5.0/grids-min.css') %}
{% endif %}
{% if language_codes.rtl(grav.user.language) %}
    {% do assets.addCss(theme_url~'/css/rtl.css') %}
{% endif %}", "partials/stylesheets.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/stylesheets.html.twig");
    }
}
