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

/* forms/fields/tabs/tabs.html.twig */
class __TwigTemplate_ff7557ce9e85f60a577dbd41035dfcb3f535d214203b55aa207f3383a88a382a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        if ( !$this->getAttribute(($context["grav"] ?? null), "admin", [], "any", true, true)) {
            // line 4
            $this->getAttribute(($context["assets"] ?? null), "addJs", [0 => "plugin://form/assets/form.vendor.js", 1 => ["group" => "bottom", "loading" => "defer"]], "method");
            // line 5
            $this->getAttribute(($context["assets"] ?? null), "addJs", [0 => "plugin://form/assets/form.min.js", 1 => ["group" => "bottom", "loading" => "defer"]], "method");
        }
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/tabs/tabs.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_field($context, array $blocks = [])
    {
        // line 9
        echo "<div class=\"form-tabs ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "class", []), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
        echo "\">

  ";
        // line 11
        if ($this->getAttribute(($context["field"] ?? null), "fields", [])) {
            // line 12
            echo "    ";
            $context["tabs"] = [];
            // line 13
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["field"] ?? null), "fields", []));
            foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
                // line 14
                echo "        ";
                if (((($this->getAttribute($context["tab"], "type", []) == "tab") &&  !$this->getAttribute($this->getAttribute($context["tab"], "validate", []), "ignore", [])) && (twig_test_empty($this->getAttribute($context["tab"], "security", [])) || $this->env->getExtension('Grav\Common\Twig\TwigExtension')->authorize($this->env->getExtension('Grav\Common\Twig\TwigExtension')->arrayFilter($this->getAttribute($context["tab"], "security", [])))))) {
                    // line 15
                    echo "        ";
                    $context["tabs"] = twig_array_merge(($context["tabs"] ?? null), [0 => $context["tab"]]);
                    // line 16
                    echo "        ";
                }
                // line 17
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "    ";
            $context["count"] = twig_length_filter($this->env, ($context["tabs"] ?? null));
            // line 19
            echo "
    ";
            // line 20
            if ((($context["count"] ?? null) == 0)) {
                // line 21
                echo "        ";
                // line 22
                echo "    ";
            } elseif (((($context["count"] ?? null) == 1) &&  !($context["admin"] ?? null))) {
                // line 23
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(twig_first($this->env, ($context["tabs"] ?? null)), "fields", []));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                    // line 24
                    echo "            ";
                    if ($this->getAttribute($context["field"], "type", [])) {
                        // line 25
                        echo "                ";
                        $context["value"] = (($this->getAttribute($context["field"], "name", [])) ? (((($context["form"] ?? null)) ? ($this->getAttribute(($context["form"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")) : ($this->getAttribute(($context["data"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")))) : ($this->getAttribute(($context["data"] ?? null), "toArray", [])));
                        // line 26
                        echo "                ";
                        $this->loadTemplate([0 => (((("forms/fields/" . $this->getAttribute($context["field"], "type", [])) . "/") . $this->getAttribute($context["field"], "type", [])) . ".html.twig"), 1 => "forms/fields/text/text.html.twig"], "forms/fields/tabs/tabs.html.twig", 26)->display($context);
                        // line 27
                        echo "            ";
                    }
                    // line 28
                    echo "        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                echo "    ";
            } else {
                // line 30
                echo "        ";
                $context["tabsKey"] = twig_join_filter(twig_get_array_keys_filter($this->getAttribute(($context["field"] ?? null), "fields", [])), ".");
                // line 31
                echo "        ";
                $context["storedValue"] = (($this->getAttribute(($context["grav"] ?? null), "admin", [], "any", true, true)) ? ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->jsonDecodeFilter(_twig_default_filter($this->env->getExtension('Grav\Common\Twig\TwigExtension')->getCookie("grav-tabs-state"), "{}"))) : ([]));
                // line 32
                echo "        ";
                $context["storedTab"] = $this->getAttribute(($context["storedValue"] ?? null), ("tab-" . ($context["tabsKey"] ?? null)));
                // line 33
                echo "
        ";
                // line 34
                if (twig_test_empty(($context["storedTab"] ?? null))) {
                    // line 35
                    echo "            ";
                    if ($this->getAttribute($this->getAttribute(($context["uri"] ?? null), "params", []), "tab", [])) {
                        // line 36
                        echo "                ";
                        $context["active"] = $this->getAttribute($this->getAttribute(($context["uri"] ?? null), "params", []), "tab", []);
                        // line 37
                        echo "            ";
                    } elseif ($this->getAttribute(($context["field"] ?? null), "active", [])) {
                        // line 38
                        echo "                ";
                        $context["active"] = $this->getAttribute(($context["field"] ?? null), "active", []);
                        // line 39
                        echo "            ";
                    } else {
                        // line 40
                        echo "                ";
                        $context["active"] = 1;
                        // line 41
                        echo "            ";
                    }
                    // line 42
                    echo "        ";
                }
                // line 43
                echo "
        <div class=\"tabs-nav\">
            ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
                    // line 46
                    echo "                ";
                    if ((($this->getAttribute($context["tab"], "type", []) == "tab") && ((null === $this->getAttribute($context["tab"], "condition", [])) || ($this->getAttribute($context["tab"], "condition", []) == true)))) {
                        // line 47
                        echo "                <a class=\"tab__link ";
                        echo ((((($context["storedTab"] ?? null) == (($context["scope"] ?? null) . $this->getAttribute($context["tab"], "name", []))) || (($context["active"] ?? null) == $this->getAttribute($context["loop"], "index", [])))) ? ("active") : (""));
                        echo "\" data-tabid=\"tab-";
                        echo twig_escape_filter($this->env, (($context["tabsKey"] ?? null) . $this->getAttribute($context["loop"], "index", [])), "html", null, true);
                        echo "\" data-tabkey=\"tab-";
                        echo twig_escape_filter($this->env, ($context["tabsKey"] ?? null), "html", null, true);
                        echo "\" data-scope=\"";
                        echo twig_escape_filter($this->env, (($context["scope"] ?? null) . $this->getAttribute($context["tab"], "name", [])), "html", null, true);
                        echo "\">
                <span>";
                        // line 48
                        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute($context["tab"], "title", [])), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 50
                    echo "            </a>
        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 52
                echo "        </div>
        <div class=\"tabs-content\">
            ";
                // line 54
                $this->loadTemplate("forms/fields/tabs/tabs.html.twig", "forms/fields/tabs/tabs.html.twig", 54, "1668960540")->display(twig_array_merge($context, ["name" => $this->getAttribute(($context["field"] ?? null), "name", []), "fields" => $this->getAttribute(($context["field"] ?? null), "fields", [])]));
                // line 62
                echo "        </div>
    ";
            }
        }
        // line 65
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/tabs/tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 65,  242 => 62,  240 => 54,  236 => 52,  221 => 50,  216 => 48,  205 => 47,  202 => 46,  185 => 45,  181 => 43,  178 => 42,  175 => 41,  172 => 40,  169 => 39,  166 => 38,  163 => 37,  160 => 36,  157 => 35,  155 => 34,  152 => 33,  149 => 32,  146 => 31,  143 => 30,  140 => 29,  126 => 28,  123 => 27,  120 => 26,  117 => 25,  114 => 24,  96 => 23,  93 => 22,  91 => 21,  89 => 20,  86 => 19,  83 => 18,  77 => 17,  74 => 16,  71 => 15,  68 => 14,  63 => 13,  60 => 12,  58 => 11,  50 => 9,  47 => 8,  42 => 1,  39 => 5,  37 => 4,  35 => 3,  29 => 1,);
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

{% if grav.admin is not defined %}
{% do assets.addJs('plugin://form/assets/form.vendor.js', { 'group': 'bottom', 'loading': 'defer' }) %}
{% do assets.addJs('plugin://form/assets/form.min.js', { 'group': 'bottom', 'loading': 'defer' }) %}
{% endif %}

{% block field %}
<div class=\"form-tabs {{ field.class }} {{ field.classes }}\">

  {% if field.fields %}
    {% set tabs = {} %}
    {% for tab in field.fields %}
        {% if tab.type == 'tab' and not tab.validate.ignore and (tab.security is empty or authorize(array(tab.security))) %}
        {% set tabs = tabs|merge([tab]) %}
        {% endif %}
    {% endfor %}
    {% set count = tabs|length %}

    {% if count == 0 %}
        {# Nothing to display #}
    {% elseif count == 1 and not admin %}
        {% for field in (tabs|first).fields %}
            {% if field.type %}
                {% set value = field.name ? (form ? form.value(field.name) : data.value(field.name)) : data.toArray %}
                {% include [\"forms/fields/#{field.type}/#{field.type}.html.twig\", 'forms/fields/text/text.html.twig'] %}
            {% endif %}
        {% endfor %}
    {% else %}
        {% set tabsKey = field.fields|keys|join('.') %}
        {% set storedValue = grav.admin is defined ? get_cookie('grav-tabs-state')|default('{}')|json_decode : [] %}
        {% set storedTab = attribute(storedValue, 'tab-' ~ tabsKey) %}

        {% if storedTab is empty %}
            {% if uri.params.tab %}
                {% set active = uri.params.tab %}
            {% elseif field.active %}
                {% set active = field.active %}
            {% else %}
                {% set active = 1 %}
            {% endif %}
        {% endif %}

        <div class=\"tabs-nav\">
            {% for tab in tabs %}
                {% if tab.type == 'tab' and (tab.condition is null or tab.condition == true) %}
                <a class=\"tab__link {{ (storedTab == scope ~ tab.name) or active == loop.index ? 'active' : '' }}\" data-tabid=\"tab-{{ tabsKey ~ loop.index }}\" data-tabkey=\"tab-{{ tabsKey }}\" data-scope=\"{{ scope ~ tab.name }}\">
                <span>{{ tab.title|t }}</span>
                {% endif %}
            </a>
        {% endfor %}
        </div>
        <div class=\"tabs-content\">
            {% embed 'forms/default/fields.html.twig' with {name: field.name, fields: field.fields} %}
                {% block inner_markup_field_open %}
                    <div id=\"tab-{{ tabsKey ~ loop.index }}\" class=\"tab__content {{ (storedTab == scope ~ field.name) or active == loop.index ? 'active' : '' }}\">
                {% endblock %}
                {% block inner_markup_field_close %}
                    </div>
                {% endblock %}
            {% endembed %}
        </div>
    {% endif %}
{% endif %}
</div>
{% endblock %}
", "forms/fields/tabs/tabs.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/fields/tabs/tabs.html.twig");
    }
}


/* forms/fields/tabs/tabs.html.twig */
class __TwigTemplate_ff7557ce9e85f60a577dbd41035dfcb3f535d214203b55aa207f3383a88a382a___1668960540 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'inner_markup_field_open' => [$this, 'block_inner_markup_field_open'],
            'inner_markup_field_close' => [$this, 'block_inner_markup_field_close'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 54
        return "forms/default/fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/default/fields.html.twig", "forms/fields/tabs/tabs.html.twig", 54);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 55
    public function block_inner_markup_field_open($context, array $blocks = [])
    {
        // line 56
        echo "                    <div id=\"tab-";
        echo twig_escape_filter($this->env, (($context["tabsKey"] ?? null) . $this->getAttribute(($context["loop"] ?? null), "index", [])), "html", null, true);
        echo "\" class=\"tab__content ";
        echo ((((($context["storedTab"] ?? null) == (($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) || (($context["active"] ?? null) == $this->getAttribute(($context["loop"] ?? null), "index", [])))) ? ("active") : (""));
        echo "\">
                ";
    }

    // line 58
    public function block_inner_markup_field_close($context, array $blocks = [])
    {
        // line 59
        echo "                    </div>
                ";
    }

    public function getTemplateName()
    {
        return "forms/fields/tabs/tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  388 => 59,  385 => 58,  376 => 56,  373 => 55,  363 => 54,  247 => 65,  242 => 62,  240 => 54,  236 => 52,  221 => 50,  216 => 48,  205 => 47,  202 => 46,  185 => 45,  181 => 43,  178 => 42,  175 => 41,  172 => 40,  169 => 39,  166 => 38,  163 => 37,  160 => 36,  157 => 35,  155 => 34,  152 => 33,  149 => 32,  146 => 31,  143 => 30,  140 => 29,  126 => 28,  123 => 27,  120 => 26,  117 => 25,  114 => 24,  96 => 23,  93 => 22,  91 => 21,  89 => 20,  86 => 19,  83 => 18,  77 => 17,  74 => 16,  71 => 15,  68 => 14,  63 => 13,  60 => 12,  58 => 11,  50 => 9,  47 => 8,  42 => 1,  39 => 5,  37 => 4,  35 => 3,  29 => 1,);
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

{% if grav.admin is not defined %}
{% do assets.addJs('plugin://form/assets/form.vendor.js', { 'group': 'bottom', 'loading': 'defer' }) %}
{% do assets.addJs('plugin://form/assets/form.min.js', { 'group': 'bottom', 'loading': 'defer' }) %}
{% endif %}

{% block field %}
<div class=\"form-tabs {{ field.class }} {{ field.classes }}\">

  {% if field.fields %}
    {% set tabs = {} %}
    {% for tab in field.fields %}
        {% if tab.type == 'tab' and not tab.validate.ignore and (tab.security is empty or authorize(array(tab.security))) %}
        {% set tabs = tabs|merge([tab]) %}
        {% endif %}
    {% endfor %}
    {% set count = tabs|length %}

    {% if count == 0 %}
        {# Nothing to display #}
    {% elseif count == 1 and not admin %}
        {% for field in (tabs|first).fields %}
            {% if field.type %}
                {% set value = field.name ? (form ? form.value(field.name) : data.value(field.name)) : data.toArray %}
                {% include [\"forms/fields/#{field.type}/#{field.type}.html.twig\", 'forms/fields/text/text.html.twig'] %}
            {% endif %}
        {% endfor %}
    {% else %}
        {% set tabsKey = field.fields|keys|join('.') %}
        {% set storedValue = grav.admin is defined ? get_cookie('grav-tabs-state')|default('{}')|json_decode : [] %}
        {% set storedTab = attribute(storedValue, 'tab-' ~ tabsKey) %}

        {% if storedTab is empty %}
            {% if uri.params.tab %}
                {% set active = uri.params.tab %}
            {% elseif field.active %}
                {% set active = field.active %}
            {% else %}
                {% set active = 1 %}
            {% endif %}
        {% endif %}

        <div class=\"tabs-nav\">
            {% for tab in tabs %}
                {% if tab.type == 'tab' and (tab.condition is null or tab.condition == true) %}
                <a class=\"tab__link {{ (storedTab == scope ~ tab.name) or active == loop.index ? 'active' : '' }}\" data-tabid=\"tab-{{ tabsKey ~ loop.index }}\" data-tabkey=\"tab-{{ tabsKey }}\" data-scope=\"{{ scope ~ tab.name }}\">
                <span>{{ tab.title|t }}</span>
                {% endif %}
            </a>
        {% endfor %}
        </div>
        <div class=\"tabs-content\">
            {% embed 'forms/default/fields.html.twig' with {name: field.name, fields: field.fields} %}
                {% block inner_markup_field_open %}
                    <div id=\"tab-{{ tabsKey ~ loop.index }}\" class=\"tab__content {{ (storedTab == scope ~ field.name) or active == loop.index ? 'active' : '' }}\">
                {% endblock %}
                {% block inner_markup_field_close %}
                    </div>
                {% endblock %}
            {% endembed %}
        </div>
    {% endif %}
{% endif %}
</div>
{% endblock %}
", "forms/fields/tabs/tabs.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/fields/tabs/tabs.html.twig");
    }
}
