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

/* flex-objects/types/default/list/list_actions.html.twig */
class __TwigTemplate_a7276174d413a5aff65904bf4890a299e39244faaced00bb3d5a687effacddc8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'action_preview' => [$this, 'block_action_preview'],
            'action_edit' => [$this, 'block_action_edit'],
            'action_read' => [$this, 'block_action_read'],
            'action_delete' => [$this, 'block_action_delete'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["object_title"] = ((($context["title_field"] ?? null)) ? ((("'" . twig_join_filter($this->getAttribute(($context["object"] ?? null), ($context["title_field"] ?? null), [], "array"), " ")) . "'")) : ("Item"));
        // line 2
        $context["can_read"] = $this->getAttribute(($context["object"] ?? null), "isAuthorized", [0 => "read", 1 => "admin", 2 => ($context["user"] ?? null)], "method");
        // line 3
        $context["can_update"] = $this->getAttribute(($context["object"] ?? null), "isAuthorized", [0 => "update", 1 => "admin", 2 => ($context["user"] ?? null)], "method");
        // line 4
        $context["can_delete"] = $this->getAttribute(($context["object"] ?? null), "isAuthorized", [0 => "delete", 1 => "admin", 2 => ($context["user"] ?? null)], "method");
        // line 5
        echo "
";
        // line 6
        if ((($context["can_read"] ?? null) && $this->getAttribute(($context["object"] ?? null), "getRoute", [], "method"))) {
            // line 7
            echo "    ";
            $this->displayBlock('action_preview', $context, $blocks);
        }
        // line 13
        echo "
";
        // line 14
        if (($context["can_update"] ?? null)) {
            // line 15
            echo "    ";
            $this->displayBlock('action_edit', $context, $blocks);
        } elseif (        // line 20
($context["can_read"] ?? null)) {
            // line 21
            echo "    ";
            $this->displayBlock('action_read', $context, $blocks);
        }
        // line 27
        echo "
";
        // line 28
        if (($context["can_delete"] ?? null)) {
            // line 29
            echo "    ";
            $this->displayBlock('action_delete', $context, $blocks);
        }
    }

    // line 7
    public function block_action_preview($context, array $blocks = [])
    {
        // line 8
        echo "        <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["route"] ?? null), "withAddedPath", [0 => $this->getAttribute(($context["object"] ?? null), "getKey", [], "method")], "method"), "withoutParams", [], "method"), "withQueryParam", [0 => "preview", 1 => 1], "method"), "getUri", [], "method"), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PREVIEW"), "html", null, true);
        echo "\" class=\"preview-action\">
            <i class=\"fa fa-eye\"></i>
        </a>
    ";
    }

    // line 15
    public function block_action_edit($context, array $blocks = [])
    {
        // line 16
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["route"] ?? null), "withAddedPath", [0 => $this->getAttribute(($context["object"] ?? null), "getKey", [], "method")], "method"), "withoutParams", [], "method"), "getUri", [], "method"), "html", null, true);
        echo "\" title=\"Edit ";
        echo twig_escape_filter($this->env, ($context["object_title"] ?? null), "html", null, true);
        echo "\" class=\"edit-action\">
        <i class=\"fa fa-pencil\"></i>
    </a>
    ";
    }

    // line 21
    public function block_action_read($context, array $blocks = [])
    {
        // line 22
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["route"] ?? null), "withAddedPath", [0 => $this->getAttribute(($context["object"] ?? null), "getKey", [], "method")], "method"), "withoutParams", [], "method"), "getUri", [], "method"), "html", null, true);
        echo "\" title=\"View ";
        echo twig_escape_filter($this->env, ($context["object_title"] ?? null), "html", null, true);
        echo "\" class=\"edit-action\">
        <i class=\"fa fa-search\"></i>
    </a>
    ";
    }

    // line 29
    public function block_action_delete($context, array $blocks = [])
    {
        // line 30
        echo "    <a href=\"#delete\"
       class=\"page-delete delete-action\"
       title=\"Delete ";
        // line 32
        echo twig_escape_filter($this->env, ($context["object_title"] ?? null), "html", null, true);
        echo "\"
       data-remodal-target=\"delete\"
       data-delete-url=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "uri", []), "addNonce", [0 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["route"] ?? null), "withAddedPath", [0 => $this->getAttribute(($context["object"] ?? null), "getKey", [], "method")], "method"), "withoutParams", [], "method"), "withGravParam", [0 => "task", 1 => "delete"], "method"), "getUri", [], "method"), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
        echo "\"
    >
       <i class=\"fa fa-close\"></i>
   </a>
    ";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/list/list_actions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 34,  125 => 32,  121 => 30,  118 => 29,  107 => 22,  104 => 21,  93 => 16,  90 => 15,  79 => 8,  76 => 7,  70 => 29,  68 => 28,  65 => 27,  61 => 21,  59 => 20,  56 => 15,  54 => 14,  51 => 13,  47 => 7,  45 => 6,  42 => 5,  40 => 4,  38 => 3,  36 => 2,  34 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set object_title = title_field ? \"'\" ~ object[title_field]|join(' ') ~ \"'\" : 'Item' %}
{% set can_read = object.isAuthorized('read', 'admin', user) %}
{% set can_update = object.isAuthorized('update', 'admin', user) %}
{% set can_delete = object.isAuthorized('delete', 'admin', user) %}

{% if can_read and object.getRoute() %}
    {% block action_preview %}
        <a href=\"{{ route.withAddedPath(object.getKey()).withoutParams().withQueryParam('preview', 1).getUri() }}\" title=\"{{ \"PLUGIN_ADMIN.PREVIEW\"|tu }}\" class=\"preview-action\">
            <i class=\"fa fa-eye\"></i>
        </a>
    {% endblock %}
{% endif %}

{% if can_update %}
    {% block action_edit %}
    <a href=\"{{ route.withAddedPath(object.getKey()).withoutParams().getUri() }}\" title=\"Edit {{ object_title }}\" class=\"edit-action\">
        <i class=\"fa fa-pencil\"></i>
    </a>
    {% endblock %}
{% elseif can_read %}
    {% block action_read %}
    <a href=\"{{ route.withAddedPath(object.getKey()).withoutParams().getUri() }}\" title=\"View {{ object_title }}\" class=\"edit-action\">
        <i class=\"fa fa-search\"></i>
    </a>
    {% endblock %}
{% endif %}

{% if can_delete %}
    {% block action_delete %}
    <a href=\"#delete\"
       class=\"page-delete delete-action\"
       title=\"Delete {{ object_title }}\"
       data-remodal-target=\"delete\"
       data-delete-url=\"{{ grav.uri.addNonce(route.withAddedPath(object.getKey()).withoutParams().withGravParam('task', 'delete').getUri(), 'admin-form', 'admin-nonce') }}\"
    >
       <i class=\"fa fa-close\"></i>
   </a>
    {% endblock %}
{% endif %}
", "flex-objects/types/default/list/list_actions.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/default/list/list_actions.html.twig");
    }
}
