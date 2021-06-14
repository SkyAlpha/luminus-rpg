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

/* forms/fields/order/order.html.twig */
class __TwigTemplate_fed5056ace194192af0395c8208313118e9b911ca635c46c35dd32d9927fe82f extends \Twig\Template
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
        $context["value"] = (((null === ($context["value"] ?? null))) ? ($this->getAttribute(($context["field"] ?? null), "default", [])) : (($context["value"] ?? null)));
        // line 4
        if (($context["form"] ?? null)) {
            // line 5
            $context["siblings"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "object", []), "parent", []), "children", []), "collection", []);
            // line 6
            $context["canOrder"] = $this->getAttribute($this->getAttribute(($context["form"] ?? null), "object", []), "order", []);
            // line 7
            if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "object", []), "exists", [])) {
                // line 8
                $this->getAttribute(($context["siblings"] ?? null), "add", [0 => $this->getAttribute(($context["form"] ?? null), "object", [])], "method");
            }
        } else {
            // line 11
            $this->getAttribute(($context["admin"] ?? null), "enablePages", [], "method");
            // line 12
            $context["siblings"] = $this->getAttribute($this->getAttribute(($context["context"] ?? null), "parent", []), "children", []);
            // line 13
            $context["canOrder"] = $this->getAttribute(($context["context"] ?? null), "order", []);
        }
        // line 15
        $context["vertical"] = ($this->getAttribute(($context["field"] ?? null), "style", []) == "vertical");
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/order/order.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 17
    public function block_field($context, array $blocks = [])
    {
        // line 18
        echo "<div class=\"form-field grid pure-g";
        if (($context["vertical"] ?? null)) {
            echo " vertical";
        }
        echo "\">
    <div class=\"form-label";
        // line 19
        if ( !($context["vertical"] ?? null)) {
            echo " block size-1-3 pure-u-1-3";
        }
        echo "\">
        <label>
            ";
        // line 21
        if ($this->getAttribute(($context["field"] ?? null), "help", [])) {
            // line 22
            echo "            <span class=\"tooltip\" data-asTooltip-position=\"w\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "help", []))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "label", [])), "html", null, true);
            echo "</span>
            ";
        } else {
            // line 24
            echo "            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "label", [])), "html", null, true);
            echo "
            ";
        }
        // line 26
        echo "            ";
        echo ((twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "required", []), [0 => "on", 1 => "true", 2 => 1])) ? ("<span class=\"required\">*</span>") : (""));
        echo "
        </label>
    </div>
    <div class=\"form-data";
        // line 29
        if ( !($context["vertical"] ?? null)) {
            echo " block size-2-3 pure-u-2-3";
        }
        echo "\">
        <div class=\"form-order-wrapper ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
        echo "\">

            <input
                type=\"hidden\"
                data-order
                ";
        // line 35
        if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        // line 36
        echo "                name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
                value=\"\" />
            ";
        // line 38
        if ( !($context["canOrder"] ?? null)) {
            // line 39
            echo "                <div class=\"notice\">";
            echo $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ORDERING_DISABLED_BECAUSE_PAGE_NO_PREFIX");
            echo "</div>
            ";
        }
        // line 41
        echo "
            ";
        // line 42
        if ((twig_length_filter($this->env, ($context["siblings"] ?? null)) < 200)) {
            // line 43
            echo "                ";
            $context["sortable_count"] = 0;
            // line 44
            echo "                <ul id=\"ordering\" class=\"orderable ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo "\">
                ";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["siblings"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                if ($this->getAttribute($context["page"], "order", [])) {
                    // line 46
                    echo "                    <li class=\"drag-handle\" data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["page"], "slug", []), "html", null, true);
                    echo "\" ";
                    echo ((($this->getAttribute($context["page"], "slug", []) == $this->getAttribute(($context["data"] ?? null), "slug", []))) ? ("data-active-id") : (""));
                    echo "><span class=\"page-order\">";
                    echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->intFilter($this->getAttribute($context["page"], "order", []));
                    echo ".</span> ";
                    (($this->getAttribute($context["page"], "title", [])) ? (print (twig_escape_filter($this->env, $this->getAttribute($context["page"], "title", []), "html", null, true))) : (print ("NEW")));
                    echo " <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->getPageUrl($context["page"]), "html", null, true);
                    echo "\"><i class=\"fa fa-external-link\"></i></a></li>
                    ";
                    // line 47
                    $context["sortable_count"] = $this->getAttribute($context["loop"], "index", []);
                    // line 48
                    echo "                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "                </ul>
                ";
            // line 50
            if ((($context["sortable_count"] ?? null) < twig_length_filter($this->env, ($context["siblings"] ?? null)))) {
                // line 51
                echo "                <label>";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.UNSORTABLE_PAGES"), "html", null, true);
                echo "</label>
                <ul class=\"orderable disabled\">
                    ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["siblings"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                    if ( !$this->getAttribute($context["page"], "order", [])) {
                        // line 54
                        echo "                        <li ";
                        echo ((($this->getAttribute($context["page"], "slug", []) == $this->getAttribute(($context["data"] ?? null), "slug", []))) ? ("data-active-id") : (""));
                        echo ">";
                        (($this->getAttribute($context["page"], "title", [])) ? (print (twig_escape_filter($this->env, $this->getAttribute($context["page"], "title", []), "html", null, true))) : (print ("NEW")));
                        echo " <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->getPageUrl($context["page"]), "html", null, true);
                        echo "\"><i class=\"fa fa-external-link\"></i></a></li>
                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                </ul>
                ";
            }
            // line 58
            echo "            ";
        } else {
            // line 59
            echo "                <div class=\"notice\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ORDERING_DISABLED_BECAUSE_TOO_MANY_SIBLINGS"), "html", null, true);
            echo "</div>
            ";
        }
        // line 61
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/order/order.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 61,  221 => 59,  218 => 58,  214 => 56,  200 => 54,  195 => 53,  189 => 51,  187 => 50,  184 => 49,  174 => 48,  172 => 47,  159 => 46,  148 => 45,  143 => 44,  140 => 43,  138 => 42,  135 => 41,  129 => 39,  127 => 38,  121 => 36,  117 => 35,  109 => 30,  103 => 29,  96 => 26,  90 => 24,  82 => 22,  80 => 21,  73 => 19,  66 => 18,  63 => 17,  58 => 1,  56 => 15,  53 => 13,  51 => 12,  49 => 11,  45 => 8,  43 => 7,  41 => 6,  39 => 5,  37 => 4,  35 => 3,  29 => 1,);
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

{% set value = (value is null ? field.default : value) %}
{% if form %}
    {% set siblings = form.object.parent.children.collection %}
    {% set canOrder = form.object.order %}
    {% if not form.object.exists %}
        {% do siblings.add(form.object) %}
    {% endif %}
{% else %}
    {% do admin.enablePages() %}
    {% set siblings = context.parent.children %}
    {% set canOrder = context.order %}
{% endif %}
{% set vertical = field.style == 'vertical' %}

{% block field %}
<div class=\"form-field grid pure-g{% if vertical %} vertical{% endif %}\">
    <div class=\"form-label{% if not vertical %} block size-1-3 pure-u-1-3{% endif %}\">
        <label>
            {% if field.help %}
            <span class=\"tooltip\" data-asTooltip-position=\"w\" title=\"{{ field.help|e|tu }}\">{{ field.label|tu }}</span>
            {% else %}
            {{ field.label|tu }}
            {% endif %}
            {{ field.validate.required in ['on', 'true', 1] ? '<span class=\"required\">*</span>' }}
        </label>
    </div>
    <div class=\"form-data{% if not vertical %} block size-2-3 pure-u-2-3{% endif %}\">
        <div class=\"form-order-wrapper {{ field.size }}\">

            <input
                type=\"hidden\"
                data-order
                {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                name=\"{{ (scope ~ field.name)|fieldName }}\"
                value=\"\" />
            {% if not canOrder %}
                <div class=\"notice\">{{ \"PLUGIN_ADMIN.ORDERING_DISABLED_BECAUSE_PAGE_NO_PREFIX\"|tu|raw }}</div>
            {% endif %}

            {% if siblings|length < 200 %}
                {% set sortable_count = 0 %}
                <ul id=\"ordering\" class=\"orderable {{ field.classes }}\">
                {% for page in siblings if page.order %}
                    <li class=\"drag-handle\" data-id=\"{{ page.slug }}\" {{ page.slug == data.slug ? 'data-active-id' : ''}}><span class=\"page-order\">{{ page.order|int }}.</span> {{ page.title ?: 'NEW' }} <a href=\"{{ getPageUrl(page) }}\"><i class=\"fa fa-external-link\"></i></a></li>
                    {% set sortable_count = loop.index %}
                {% endfor %}
                </ul>
                {% if sortable_count < siblings|length %}
                <label>{{ \"PLUGIN_ADMIN.UNSORTABLE_PAGES\"|tu }}</label>
                <ul class=\"orderable disabled\">
                    {% for page in siblings if not page.order %}
                        <li {{ page.slug == data.slug ? 'data-active-id' : ''}}>{{ page.title ?: 'NEW' }} <a href=\"{{ getPageUrl(page) }}\"><i class=\"fa fa-external-link\"></i></a></li>
                    {% endfor %}
                </ul>
                {% endif %}
            {% else %}
                <div class=\"notice\">{{ \"PLUGIN_ADMIN.ORDERING_DISABLED_BECAUSE_TOO_MANY_SIBLINGS\"|tu }}</div>
            {% endif %}
        </div>
    </div>
</div>
{% endblock %}
", "forms/fields/order/order.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/forms/fields/order/order.html.twig");
    }
}
