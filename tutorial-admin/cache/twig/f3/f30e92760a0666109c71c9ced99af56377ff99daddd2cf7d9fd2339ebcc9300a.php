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

/* forms/default/fields.html.twig */
class __TwigTemplate_9a745096699b87d0942269b33f851e3f55cffb5f0f4dd1779d5bfcde0e342910 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'inner_markup_field_open' => [$this, 'block_inner_markup_field_open'],
            'field' => [$this, 'block_field'],
            'inner_markup_field_close' => [$this, 'block_inner_markup_field_close'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
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
        foreach ($context['_seq'] as $context["field_name"] => $context["field"]) {
            // line 2
            echo "    ";
            if (($this->getAttribute($context["field"], "type", []) &&  !$this->getAttribute($this->getAttribute($context["field"], "validate", []), "ignore", []))) {
                // line 3
                if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["field_name"]) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ".") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
                    // line 4
                    $context["field_name"] = ((($context["name"] ?? null)) ? ((($context["name"] ?? null) . $context["field_name"])) : (twig_slice($this->env, $context["field_name"], 1, null)));
                    // line 5
                    echo "            ";
                    $context["field"] = twig_array_merge($context["field"], ["name" => $context["field_name"]]);
                    // line 6
                    echo "        ";
                }
                // line 7
                echo "
        ";
                // line 8
                $context["value"] = ((($context["form"] ?? null)) ? ($this->getAttribute(($context["form"] ?? null), "value", [0 => $context["field_name"]], "method")) : ($this->getAttribute(($context["data"] ?? null), "value", [0 => $context["field_name"]], "method")));
                // line 9
                echo "        ";
                $this->displayBlock('inner_markup_field_open', $context, $blocks);
                // line 10
                echo "        ";
                $this->displayBlock('field', $context, $blocks);
                // line 13
                echo "        ";
                $this->displayBlock('inner_markup_field_close', $context, $blocks);
                // line 14
                echo "    ";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 9
    public function block_inner_markup_field_open($context, array $blocks = [])
    {
    }

    // line 10
    public function block_field($context, array $blocks = [])
    {
        // line 11
        echo "            ";
        $this->loadTemplate([0 => (((("forms/fields/" . $this->getAttribute(($context["field"] ?? null), "type", [])) . "/") . $this->getAttribute(($context["field"] ?? null), "type", [])) . ".html.twig"), 1 => "forms/fields/text/text.html.twig"], "forms/default/fields.html.twig", 11)->display($context);
        // line 12
        echo "        ";
    }

    // line 13
    public function block_inner_markup_field_close($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "forms/default/fields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 13,  105 => 12,  102 => 11,  99 => 10,  94 => 9,  77 => 14,  74 => 13,  71 => 10,  68 => 9,  66 => 8,  63 => 7,  60 => 6,  57 => 5,  55 => 4,  53 => 3,  50 => 2,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% for field_name, field in fields %}
    {% if field.type and not field.validate.ignore %}
        {%- if field_name starts with '.' -%}
            {% set field_name = name ? name ~ field_name : field_name[1:] %}
            {% set field = field|merge({ name: field_name }) %}
        {% endif %}

        {% set value = form ? form.value(field_name) : data.value(field_name) %}
        {% block inner_markup_field_open %}{% endblock %}
        {% block field %}
            {% include [\"forms/fields/#{field.type}/#{field.type}.html.twig\", 'forms/fields/text/text.html.twig'] %}
        {% endblock %}
        {% block inner_markup_field_close %}{% endblock %}
    {% endif %}
{% endfor %}
", "forms/default/fields.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/form/templates/forms/default/fields.html.twig");
    }
}
