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

/* flex-objects/types/default/list.html.twig */
class __TwigTemplate_c40e437f3c43364e8849b43e5b62a0c92dc0a02318c5bc8c474af0e9a377763e extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $_trait_0 = $this->loadTemplate("flex-objects/types/default/titlebar/list.html.twig", "flex-objects/types/default/list.html.twig", 2);
        // line 2
        if (!$_trait_0->isTraitable()) {
            throw new RuntimeError('Template "'."flex-objects/types/default/titlebar/list.html.twig".'" cannot be used as a trait.', 2, $this->getSourceContext());
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'body' => [$this, 'block_body'],
                'content_top' => [$this, 'block_content_top'],
                'content' => [$this, 'block_content'],
                'content_list' => [$this, 'block_content_list'],
            ]
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "partials/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 5
        $context["export"] = ((($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.export"], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.export"], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.export"], "method")) : (((($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.export"], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.export"], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.export"], "method")) : ([]))));
        // line 6
        $context["can_export"] = (($context["can_export"]) ?? ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->boolFilter(((($this->getAttribute(($context["export"] ?? null), "enabled", [], "array", true, true) &&  !(null === $this->getAttribute(($context["export"] ?? null), "enabled", [], "array")))) ? ($this->getAttribute(($context["export"] ?? null), "enabled", [], "array")) : (count($this->env->getExtension('Grav\Common\Twig\TwigExtension')->arrayFilter(($context["export"] ?? null))))))));
        // line 7
        $context["can_create"] = (($context["can_create"]) ?? ($this->getAttribute(($context["directory"] ?? null), "isAuthorized", [0 => "create", 1 => "admin", 2 => ($context["user"] ?? null)], "method")));
        // line 8
        $context["can_translate"] = (($context["can_translate"]) ?? (($this->getAttribute(($context["admin"] ?? null), "multilang", []) && $this->getAttribute($this->getAttribute(($context["directory"] ?? null), "object", []), "hasFlexFeature", [0 => "flex-translate"], "method"))));
        // line 10
        $context["per_page"] = (($context["per_page"]) ?? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "uri", []), "currentUri", []), "queryParam", [0 => "per_page"], "method")));
        // line 13
        if (($context["can_translate"] ?? null)) {
            // line 14
            $context["translate_include_default"] = (($context["translate_include_default"]) ?? ($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "config", []), "get", [0 => "system.languages.include_default_lang_file_extension", 1 => true], "method")));
            // line 15
            $context["all_languages"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "admin", []), "siteLanguages", []);
            // line 16
            $context["admin_languages"] = $this->getAttribute(($context["admin"] ?? null), "languages_enabled", []);
            // line 17
            $context["default_language"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "language", []), "default", []);
            // line 18
            $context["language"] = $this->getAttribute(($context["controller"] ?? null), "language", []);
            // line 25
            $context["language"] = ((($context["language"] ?? null)) ? (($context["language"] ?? null)) : (($context["default_language"] ?? null)));
        }
        // line 30
        $context["allowed"] = (($context["allowed"]) ?? ((($context["directory"] ?? null) && $this->getAttribute(($context["directory"] ?? null), "isAuthorized", [0 => "list", 1 => "admin", 2 => ($context["user"] ?? null)], "method"))));
        // line 31
        $context["back_route"] = (($context["back_route"]) ?? ($this->getAttribute(($context["route"] ?? null), "getRoute", [0 => 1, 1 =>  -1], "method")));
        // line 33
        $context["configure_path"] = $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.router.actions.configure.path"], "method");
        // line 34
        $context["configure_route"] = (($context["configure_route"]) ?? (((($context["configure_path"] ?? null)) ? ($this->getAttribute(($context["route"] ?? null), "withRoute", [0 => twig_trim_filter($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(($context["configure_path"] ?? null)), "/")], "method")) : (null))));
        // line 35
        $context["configure_route"] = (($context["configure_route"]) ?? ($this->getAttribute(($context["route"] ?? null), "withGravParam", [0 => "", 1 => "configure"], "method")));
        // line 37
        $context["title_icon"] = (($context["title_icon"]) ?? (((($this->getAttribute(($context["view_config"] ?? null), "icon", [], "array", true, true) &&  !(null === $this->getAttribute(($context["view_config"] ?? null), "icon", [], "array")))) ? ($this->getAttribute(($context["view_config"] ?? null), "icon", [], "array")) : (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["directory"] ?? null), "config", [], "any", false, true), "admin", [], "any", false, true), "menu", [], "any", false, true), "list", [], "any", false, true), "icon", [], "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["directory"] ?? null), "config", [], "any", false, true), "admin", [], "any", false, true), "menu", [], "any", false, true), "list", [], "any", false, true), "icon", [])))) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["directory"] ?? null), "config", [], "any", false, true), "admin", [], "any", false, true), "menu", [], "any", false, true), "list", [], "any", false, true), "icon", [])) : ("fa-file-text-o"))))));
        // line 38
        ob_start();
        // line 39
        $context["title_config"] = ((($this->getAttribute(($context["view_config"] ?? null), "title", [], "array", true, true) &&  !(null === $this->getAttribute(($context["view_config"] ?? null), "title", [], "array")))) ? ($this->getAttribute(($context["view_config"] ?? null), "title", [], "array")) : (null));
        // line 40
        if ($this->getAttribute(($context["title_config"] ?? null), "template", [])) {
            // line 41
            echo twig_include($this->env, $context, twig_template_from_string($this->env, $this->getAttribute(($context["title_config"] ?? null), "template", []), "configure title template"));
        } else {
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute(($context["directory"] ?? null), "title", []), "html", null, true);
        }
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 47
        $context["schema"] = $this->getAttribute($this->getAttribute(($context["directory"] ?? null), "blueprint", []), "schema", []);
        // line 49
        $this->getAttribute(($context["assets"] ?? null), "addJs", [0 => "plugin://flex-objects/js/flex-objects.js", 1 => ["group" => "bottom", "loading" => "defer"]], "method");
        // line 1
        $this->parent = $this->loadTemplate("partials/base.html.twig", "flex-objects/types/default/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 51
    public function block_body($context, array $blocks = [])
    {
        // line 52
        echo "    ";
        $context["collection"] = ((($context["directory"] ?? null)) ? ($this->getAttribute(($context["collection"] ?? null), "isAuthorized", [0 => "list", 1 => "admin", 2 => ($context["user"] ?? null)], "method")) : (""));
        // line 53
        echo "    ";
        $context["directory_config"] = ((($this->getAttribute(($context["view_config"] ?? null), "options", [], "array", true, true) &&  !(null === $this->getAttribute(($context["view_config"] ?? null), "options", [], "array")))) ? ($this->getAttribute(($context["view_config"] ?? null), "options", [], "array")) : ($this->getAttribute(($context["config"] ?? null), "get", [0 => "plugins.flex-objects.admin_list", 1 => ["per_page" => 15, "order" => ["by" => "updated_timestamp", "dir" => "desc"]]], "method")));
        // line 54
        echo "    ";
        $context["per_page"] = max(1, (($context["per_page"]) ?? ($this->getAttribute(($context["directory_config"] ?? null), "per_page", []))));
        // line 55
        echo "    ";
        $context["table"] = ((($context["directory"] ?? null)) ? ($this->getAttribute(($context["flex"] ?? null), "dataTable", [0 => $this->getAttribute(($context["collection"] ?? null), "flexDirectory", [], "method"), 1 => ["collection" => ($context["collection"] ?? null), "limit" => ($context["per_page"] ?? null), "sort" => (($this->getAttribute($this->getAttribute(($context["directory_config"] ?? null), "order", []), "by", []) . "|") . $this->getAttribute($this->getAttribute(($context["directory_config"] ?? null), "order", []), "dir", []))]], "method")) : (""));
        // line 56
        echo "    ";
        $context["back_url"] = $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(($context["back_route"] ?? null));
        // line 57
        echo "    ";
        $context["configure_url"] = (( !(((($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.configure.hidden"], "method", true, true) &&  !(null === $this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.configure.hidden"], "method")))) ? ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.views.configure.hidden"], "method")) : ($this->getAttribute(($context["directory"] ?? null), "config", [0 => "admin.configure.hidden", 1 => false], "method"))) === true)) ? ($this->getAttribute(($context["configure_route"] ?? null), "toString", [0 => true], "method")) : (""));
        // line 58
        echo "
    ";
        // line 59
        $context["fields"] = $this->getAttribute(($context["table"] ?? null), "getColumns", [], "method");
        // line 60
        echo "    ";
        $context["fields_count"] = ((($context["fields"] ?? null)) ? (count(($context["fields"] ?? null))) : (0));
        // line 61
        echo "    ";
        $context["fields_width"] = 8;
        // line 62
        echo "    ";
        $context["fields_set"] = 0;
        // line 63
        echo "    ";
        $context["title_field"] = $this->getAttribute(($context["view_config"] ?? null), "title", [], "array");
        // line 64
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["options"]) {
            // line 65
            echo "        ";
            $context["fields_width"] = (((($context["fields_width"] ?? null) + $this->getAttribute($context["options"], "width", []))) ? ((($context["fields_width"] ?? null) + $this->getAttribute($context["options"], "width", []))) : (0));
            // line 66
            echo "        ";
            $context["fields_set"] = (($context["fields_set"] ?? null) + (($this->getAttribute($context["options"], "width", [])) ? (1) : (0)));
            // line 67
            echo "        ";
            if (( !($context["title_field"] ?? null) && ($this->getAttribute($context["options"], "link", []) == "edit"))) {
                // line 68
                echo "            ";
                $context["title_field"] = $context["key"];
                // line 69
                echo "        ";
            }
            // line 70
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['options'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "
    ";
        // line 72
        $this->displayParentBlock("body", $context, $blocks);
        echo "
";
    }

    // line 75
    public function block_content_top($context, array $blocks = [])
    {
        // line 76
        if ((($context["allowed"] ?? null) && $this->getAttribute(($context["user"] ?? null), "authorize", [0 => "admin.super"], "method"))) {
            // line 77
            echo "    ";
            $context["save_location"] = $this->getAttribute(($context["directory"] ?? null), "getStorageFolder", [], "method");
            // line 78
            echo "    <div class=\"alert notice\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SAVE_LOCATION"), "html", null, true);
            echo ": <b>";
            echo twig_escape_filter($this->env, twig_trim_filter($this->env->getExtension('Grav\Common\Twig\TwigExtension')->urlFunc(($context["save_location"] ?? null), false, true), "/"), "html", null, true);
            echo "</b></div>
";
        }
    }

    // line 82
    public function block_content($context, array $blocks = [])
    {
        // line 83
        if (($context["allowed"] ?? null)) {
            // line 84
            echo "    ";
            $this->displayBlock('content_list', $context, $blocks);
        } else {
            // line 88
            echo "    ";
            $this->getAttribute(($context["page"] ?? null), "modifyHeader", [0 => "http_response_code", 1 => 404], "method");
            // line 89
            echo "    <div class=\"error-block\">
        <h1>Error 404</h1>
        <div class=\"padding\">
            <p>
                Woops! Looks like this page doesn't exist.
            </p>
        </div>
    </div>
";
        }
    }

    // line 84
    public function block_content_list($context, array $blocks = [])
    {
        // line 85
        echo "    ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/list/list.html.twig"), 1 => "flex-objects/types/default/list/list.html.twig"], "flex-objects/types/default/list.html.twig", 85)->display($context);
        // line 86
        echo "    ";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 86,  228 => 85,  225 => 84,  212 => 89,  209 => 88,  205 => 84,  203 => 83,  200 => 82,  190 => 78,  187 => 77,  185 => 76,  182 => 75,  176 => 72,  173 => 71,  167 => 70,  164 => 69,  161 => 68,  158 => 67,  155 => 66,  152 => 65,  147 => 64,  144 => 63,  141 => 62,  138 => 61,  135 => 60,  133 => 59,  130 => 58,  127 => 57,  124 => 56,  121 => 55,  118 => 54,  115 => 53,  112 => 52,  109 => 51,  104 => 1,  102 => 49,  100 => 47,  96 => 43,  93 => 41,  91 => 40,  89 => 39,  87 => 38,  85 => 37,  83 => 35,  81 => 34,  79 => 33,  77 => 31,  75 => 30,  72 => 25,  70 => 18,  68 => 17,  66 => 16,  64 => 15,  62 => 14,  60 => 13,  58 => 10,  56 => 8,  54 => 7,  52 => 6,  50 => 5,  44 => 1,  23 => 2,);
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
{% use 'flex-objects/types/default/titlebar/list.html.twig' %}

{# Allowed actions #}
{% set export = directory.config('admin.views.export') ?? directory.config('admin.export') ?? [] %}
{% set can_export = can_export ?? (export['enabled'] ?? export|array|count)|bool %}
{% set can_create = can_create ?? directory.isAuthorized('create', 'admin', user) %}
{% set can_translate = can_translate ?? (admin.multilang and directory.object.hasFlexFeature('flex-translate')) %}

{% set per_page = per_page ?? grav.uri.currentUri.queryParam('per_page') %}

{# Translations #}
{% if can_translate %}
    {% set translate_include_default = translate_include_default ?? grav.config.get('system.languages.include_default_lang_file_extension', true) %}
    {% set all_languages = grav.admin.siteLanguages %}
    {% set admin_languages = admin.languages_enabled %}
    {% set default_language = grav.language.default %}
    {% set language = controller.language %}
    {#
    {% if translate_include_default %}
        {% set all_languages = all_languages|merge({'': 'Default'}) %}
        {% set admin_languages = admin_languages|merge({'': ''}) %}
    {% else %}
    #}
        {% set language = language ?: default_language %}
    {# endif #}
{% endif %}

{# These variables can be overridden from the main template file #}
{% set allowed = allowed ?? (directory and directory.isAuthorized('list', 'admin', user)) %}
{% set back_route = back_route ?? route.getRoute(1, -1) %}

{% set configure_path = directory.config('admin.router.actions.configure.path') %}
{% set configure_route = configure_route ?? (configure_path ? route.withRoute(admin_route(configure_path)|trim('/')) : null) %}
{% set configure_route = configure_route ?? route.withGravParam('', 'configure') %}

{% set title_icon = title_icon ?? view_config['icon'] ?? directory.config.admin.menu.list.icon ?? 'fa-file-text-o' %}
{% set title -%}
    {%- set title_config = view_config['title'] ?? null -%}
    {%- if title_config.template -%}
        {{- include(template_from_string(title_config.template, 'configure title template')) -}}
    {%- else -%}
        {{- directory.title -}}
    {% endif %}
{%- endset %}

{% set schema = directory.blueprint.schema %}

{% do assets.addJs('plugin://flex-objects/js/flex-objects.js', { 'group': 'bottom', 'loading': 'defer' }) %}

{% block body %}
    {% set collection = directory ? collection.isAuthorized('list', 'admin', user) %}
    {% set directory_config = view_config['options'] ?? config.get('plugins.flex-objects.admin_list', { per_page: 15, order: { by: 'updated_timestamp', dir: 'desc' }}) %}
    {% set per_page = max(1, per_page ?? directory_config.per_page) %}
    {% set table = directory ? flex.dataTable(collection.flexDirectory(), {  collection: collection, limit: per_page, sort: directory_config.order.by ~ '|' ~ directory_config.order.dir }) %}
    {% set back_url = admin_route(back_route) %}
    {% set configure_url = (directory.config('admin.views.configure.hidden') ?? directory.config('admin.configure.hidden', false)) is not same as(true) ? configure_route.toString(true) %}

    {% set fields = table.getColumns() %}
    {% set fields_count = fields ? count(fields) : 0 %}
    {% set fields_width = 8 %}
    {% set fields_set = 0 %}
    {% set title_field = view_config['title'] %}
    {% for key,options in fields %}
        {% set fields_width = fields_width + options.width ?: 0 %}
        {% set fields_set = fields_set + (options.width ? 1 : 0) %}
        {% if not title_field and options.link == 'edit' %}
            {% set title_field = key %}
        {% endif %}
    {% endfor %}

    {{ parent() }}
{% endblock body %}

{% block content_top %}
{% if allowed and user.authorize('admin.super') %}
    {% set save_location = directory.getStorageFolder() %}
    <div class=\"alert notice\">{{ \"PLUGIN_ADMIN.SAVE_LOCATION\"|tu }}: <b>{{ url(save_location, false, true)|trim('/') }}</b></div>
{% endif %}
{% endblock %}

{% block content %}
{% if allowed %}
    {% block content_list %}
    {% include ['flex-objects/types/' ~ target ~ '/list/list.html.twig', 'flex-objects/types/default/list/list.html.twig'] %}
    {% endblock %}
{% else %}
    {% do page.modifyHeader('http_response_code', 404) %}
    <div class=\"error-block\">
        <h1>Error 404</h1>
        <div class=\"padding\">
            <p>
                Woops! Looks like this page doesn't exist.
            </p>
        </div>
    </div>
{% endif %}
{% endblock %}
", "flex-objects/types/default/list.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/default/list.html.twig");
    }
}
