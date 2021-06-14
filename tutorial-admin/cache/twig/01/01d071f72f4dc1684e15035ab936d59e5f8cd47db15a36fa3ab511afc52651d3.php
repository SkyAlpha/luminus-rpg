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

/* flex-objects/types/default/modals/remove.html.twig */
class __TwigTemplate_24a2d368fba37b5ffafe8c6c1da474f30495bcc5deafebf4b113d3f2bc9d3a28 extends \Twig\Template
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
        echo "<div class=\"remodal\" data-remodal-id=\"delete\" data-remodal-options=\"hashTracking: false\">
    <form>
        <h1>Delete ";
        // line 3
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->inflectorFilter("singular", ($context["name"] ?? null))), "html", null, true);
        echo "</h1>
        <p class=\"bigger\">
            Are you sure you want to permanently delete the ";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->inflectorFilter("singular", ($context["name"] ?? null)), "html", null, true);
        echo "?
        </p>
        <div class=\"button-bar\">
            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CANCEL"), "html", null, true);
        echo "</button>
            <a class=\"button disable-after-click\" data-delete-action href=\"#\"><i class=\"fa fa-fw fa-check\"></i> ";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONTINUE"), "html", null, true);
        echo "</a>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/modals/remove.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 9,  45 => 8,  39 => 5,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"remodal\" data-remodal-id=\"delete\" data-remodal-options=\"hashTracking: false\">
    <form>
        <h1>Delete {{ name|singularize|capitalize }}</h1>
        <p class=\"bigger\">
            Are you sure you want to permanently delete the {{ name|singularize }}?
        </p>
        <div class=\"button-bar\">
            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|tu }}</button>
            <a class=\"button disable-after-click\" data-delete-action href=\"#\"><i class=\"fa fa-fw fa-check\"></i> {{ \"PLUGIN_ADMIN.CONTINUE\"|tu }}</a>
        </div>
    </form>
</div>
", "flex-objects/types/default/modals/remove.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/default/modals/remove.html.twig");
    }
}
