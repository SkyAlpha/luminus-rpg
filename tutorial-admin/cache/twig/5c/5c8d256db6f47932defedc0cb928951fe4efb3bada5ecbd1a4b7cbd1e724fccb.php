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

/* forms/fields/2fa_secret/2fa_secret.html.twig */
class __TwigTemplate_ba98eeeb27a2b56968374d1a325165d310d472a1e6fe3e88ffb52780bd480b2a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'input' => [$this, 'block_input'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/2fa_secret/2fa_secret.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = [])
    {
        // line 4
        echo "    <div class=\"form-input-wrapper twofa-wrapper\">
        ";
        // line 5
        try {            // line 6
            echo "            ";
            $context["user"] = ((($this->getAttribute(($context["form"] ?? null), "object", [], "any", true, true) &&  !(null === $this->getAttribute(($context["form"] ?? null), "object", [])))) ? ($this->getAttribute(($context["form"] ?? null), "object", [])) : ($this->getAttribute(($context["grav"] ?? null), "user", [])));
            // line 7
            echo "
            ";
            // line 8
            $context["secret"] = (($this->getAttribute(($context["user"] ?? null), "twofa_secret", [])) ? ($this->getAttribute(($context["user"] ?? null), "twofa_secret", [])) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "login", []), "twoFactorAuth", []), "createSecret", [], "method")));
            // line 9
            echo "            ";
            $context["image"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "login", []), "twoFactorAuth", []), "getQrImageData", [0 => $this->getAttribute(($context["user"] ?? null), "username", []), 1 => ($context["secret"] ?? null)], "method");
            // line 10
            echo "
            <img style=\"border: 1px solid #ddd\" data-2fa-image src=\"";
            // line 11
            echo twig_escape_filter($this->env, ($context["image"] ?? null), "html", null, true);
            echo "\" />
            <div>
                <span>";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_LOGIN.2FA_SECRET"), "html", null, true);
            echo ": </span><span class=\"twofa-secret-code\" data-2fa-secret>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->regexReplace(($context["secret"] ?? null), "/(\\w{4})/", "\\1 "), "html", null, true);
            echo "</span>
            </div>

            <div class=\"danger twofa-wrapper\">
                <button data-hint=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_LOGIN.2FA_REGEN_HINT"), "html", null, true);
            echo "\" class=\"button button-small hint--bottom\" data-2fa-regenerate><i class=\"fa fa-fw fa-refresh\"></i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_LOGIN.2FA_REGENERATE"), "html", null, true);
            echo "</button>
            </div>

            <input type=\"text\" class=\"no-form\" style=\"display:none;\" name=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
            echo "\" data-2fa-value value=\"";
            echo twig_escape_filter($this->env, ($context["secret"] ?? null), "html", null, true);
            echo "\" />

        ";
        } catch (\Exception $e) {
            if (isset($context['grav']['debugger'])) $context['grav']['debugger']->addException($e);
            $context['e'] = $e;
            // line 23
            echo "            <div class=\"notice error\">
                <p>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute(($context["e"] ?? null), "message", []), "html", null, true);
            echo "</p>
            </div>
        ";
        }
        // line 27
        echo "    </div>

    ";
        // line 29
        $this->getAttribute(($context["assets"] ?? null), "addJs", [0 => "jquery", 1 => 101], "method");
        // line 30
        echo "    ";
        $this->getAttribute(($context["assets"] ?? null), "addJs", [0 => "plugin://login/js/2fa.js", 1 => ["group" => "bottom", "loading" => "defer"]], "method");
    }

    public function getTemplateName()
    {
        return "forms/fields/2fa_secret/2fa_secret.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 30,  105 => 29,  101 => 27,  95 => 24,  92 => 23,  82 => 20,  74 => 17,  65 => 13,  60 => 11,  57 => 10,  54 => 9,  52 => 8,  49 => 7,  46 => 6,  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/field.html.twig\" %}

{% block input %}
    <div class=\"form-input-wrapper twofa-wrapper\">
        {% try %}
            {% set user = form.object ?? grav.user %}

            {% set secret = user.twofa_secret ?: grav.login.twoFactorAuth.createSecret() %}
            {% set image = grav.login.twoFactorAuth.getQrImageData(user.username, secret) %}

            <img style=\"border: 1px solid #ddd\" data-2fa-image src=\"{{ image }}\" />
            <div>
                <span>{{ 'PLUGIN_LOGIN.2FA_SECRET'|t }}: </span><span class=\"twofa-secret-code\" data-2fa-secret>{{ secret|regex_replace('/(\\\\w{4})/', '\\\\1 ') }}</span>
            </div>

            <div class=\"danger twofa-wrapper\">
                <button data-hint=\"{{ 'PLUGIN_LOGIN.2FA_REGEN_HINT'|t }}\" class=\"button button-small hint--bottom\" data-2fa-regenerate><i class=\"fa fa-fw fa-refresh\"></i> {{ 'PLUGIN_LOGIN.2FA_REGENERATE'|t }}</button>
            </div>

            <input type=\"text\" class=\"no-form\" style=\"display:none;\" name=\"{{ (scope ~ field.name)|fieldName }}\" data-2fa-value value=\"{{ secret }}\" />

        {% catch %}
            <div class=\"notice error\">
                <p>{{ e.message }}</p>
            </div>
        {% endcatch %}
    </div>

    {% do assets.addJs('jquery', 101) %}
    {% do assets.addJs('plugin://login/js/2fa.js', { 'group': 'bottom', 'loading': 'defer' }) %}
{% endblock %}
", "forms/fields/2fa_secret/2fa_secret.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/login/templates/forms/fields/2fa_secret/2fa_secret.html.twig");
    }
}
