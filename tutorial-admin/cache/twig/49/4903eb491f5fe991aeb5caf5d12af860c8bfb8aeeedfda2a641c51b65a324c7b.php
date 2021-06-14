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

/* partials/blueprints.html.twig */
class __TwigTemplate_16718328c2f23c4ae6d9520b291136ce5b423f6728d9b657c1dcc61819a4a6eb extends \Twig\Template
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
        $context["blueprints"] = (($context["blueprints"]) ?? ($this->getAttribute(($context["form"] ?? null), "blueprint", [])));
        // line 2
        $context["data"] = (($context["data"]) ?? ($this->getAttribute(($context["form"] ?? null), "data", [])));
        // line 3
        $context["form_id"] = (($context["form_id"]) ?? ("blueprints"));
        // line 4
        $context["scope"] = ((($context["scope"] ?? null)) ? (($context["scope"] ?? null)) : ("data."));
        // line 5
        echo "
";
        // line 6
        if ($this->getAttribute(($context["admin"] ?? null), "findFormFields", [0 => "file", 1 => $this->getAttribute(($context["blueprints"] ?? null), "fields", [])], "method")) {
            // line 7
            echo "    ";
            $context["multipart"] = " enctype=\"multipart/form-data\"";
        }
        // line 9
        echo "
<form ";
        // line 10
        if (($context["form_action"] ?? null)) {
            echo "action=\"";
            echo twig_escape_filter($this->env, ($context["form_action"] ?? null), "html", null, true);
            echo "\"";
        }
        echo " id=\"";
        echo twig_escape_filter($this->env, ($context["form_id"] ?? null), "html", null, true);
        echo "\" method=\"post\" data-grav-form=\"";
        echo twig_escape_filter($this->env, ($context["form_id"] ?? null), "html", null, true);
        echo "\" ";
        if ($this->getAttribute(($context["form"] ?? null), "novalidate", [])) {
            echo "novalidate";
        }
        echo " data-grav-keepalive=\"true\"";
        echo ($context["multipart"] ?? null);
        echo ">
    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["blueprints"] ?? null), "fields", []));
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
            // line 12
            echo "        ";
            if ($this->getAttribute($context["field"], "type", [])) {
                // line 13
                echo "            ";
                $context["value"] = (($this->getAttribute($context["field"], "name", [])) ? (((($this->getAttribute(($context["form"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method", true, true) &&  !(null === $this->getAttribute(($context["form"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")))) ? ($this->getAttribute(($context["form"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")) : ($this->getAttribute(($context["data"] ?? null), "value", [0 => $this->getAttribute($context["field"], "name", [])], "method")))) : ($this->getAttribute(($context["data"] ?? null), "toArray", [])));
                // line 14
                echo "            <div class=\"block block-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["field"], "type", []), "html", null, true);
                echo "\">
                ";
                // line 15
                $this->loadTemplate([0 => (((("forms/fields/" . $this->getAttribute($context["field"], "type", [])) . "/") . $this->getAttribute($context["field"], "type", [])) . ".html.twig"), 1 => "forms/fields/text/text.html.twig"], "partials/blueprints.html.twig", 15)->display($context);
                // line 16
                echo "            </div>
        ";
            }
            // line 18
            echo "    ";
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
        // line 19
        echo "
    ";
        // line 20
        if ($this->getAttribute(($context["data"] ?? null), "extra", [])) {
            // line 21
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "extra", []));
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
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                // line 22
                echo "        ";
                if (!twig_in_filter($context["name"], [0 => "_json", 1 => "task", 2 => "admin-nonce"])) {
                    // line 23
                    echo "            ";
                    $context["field"] = ["name" => ("_json." . $context["name"])];
                    // line 24
                    echo "            ";
                    $context["value"] = twig_jsonencode_filter($context["value"]);
                    // line 25
                    echo "            ";
                    $this->loadTemplate("forms/fields/hidden/hidden.html.twig", "partials/blueprints.html.twig", 25)->display($context);
                    // line 26
                    echo "        ";
                }
                // line 27
                echo "    ";
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
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "    ";
        }
        // line 29
        echo "
    ";
        // line 30
        if (($context["form"] ?? null)) {
            // line 31
            echo "        ";
            $this->loadTemplate("forms/fields/formname/formname.html.twig", "partials/blueprints.html.twig", 31)->display($context);
            // line 32
            echo "        ";
            $this->loadTemplate("forms/fields/uniqueid/uniqueid.html.twig", "partials/blueprints.html.twig", 32)->display($context);
            // line 33
            echo "        ";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->nonceFieldFunc($this->getAttribute(($context["form"] ?? null), "getNonceAction", [], "method"), $this->getAttribute(($context["form"] ?? null), "getNonceName", [], "method"));
            echo "
    ";
        } else {
            // line 35
            echo "        ";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->nonceFieldFunc("admin-form", "admin-nonce");
            echo "
    ";
        }
        // line 37
        echo "</form>
";
    }

    public function getTemplateName()
    {
        return "partials/blueprints.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 37,  188 => 35,  182 => 33,  179 => 32,  176 => 31,  174 => 30,  171 => 29,  168 => 28,  154 => 27,  151 => 26,  148 => 25,  145 => 24,  142 => 23,  139 => 22,  121 => 21,  119 => 20,  116 => 19,  102 => 18,  98 => 16,  96 => 15,  91 => 14,  88 => 13,  85 => 12,  68 => 11,  50 => 10,  47 => 9,  43 => 7,  41 => 6,  38 => 5,  36 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set blueprints = blueprints ?? form.blueprint %}
{% set data = data ?? form.data %}
{% set form_id = form_id ?? 'blueprints' %}
{% set scope = scope ?: 'data.' %}

{% if admin.findFormFields('file', blueprints.fields) %}
    {% set multipart = ' enctype=\"multipart/form-data\"' %}
{% endif %}

<form {% if form_action %}action=\"{{ form_action }}\"{% endif %} id=\"{{ form_id }}\" method=\"post\" data-grav-form=\"{{ form_id }}\" {% if form.novalidate %}novalidate{% endif %} data-grav-keepalive=\"true\"{{ multipart|raw }}>
    {% for field in blueprints.fields %}
        {% if field.type %}
            {% set value = field.name ? (form.value(field.name) ?? data.value(field.name)) : data.toArray %}
            <div class=\"block block-{{ field.type }}\">
                {% include [\"forms/fields/#{field.type}/#{field.type}.html.twig\", 'forms/fields/text/text.html.twig'] %}
            </div>
        {% endif %}
    {% endfor %}

    {% if data.extra %}
    {% for name, value in data.extra %}
        {% if name not in ['_json','task','admin-nonce'] %}
            {% set field = {name: '_json.' ~ name} %}
            {% set value = value|json_encode %}
            {% include 'forms/fields/hidden/hidden.html.twig' %}
        {% endif %}
    {% endfor %}
    {% endif %}

    {% if form %}
        {% include \"forms/fields/formname/formname.html.twig\" %}
        {% include 'forms/fields/uniqueid/uniqueid.html.twig' %}
        {{ nonce_field(form.getNonceAction(), form.getNonceName())|raw }}
    {% else %}
        {{ nonce_field('admin-form', 'admin-nonce')|raw }}
    {% endif %}
</form>
", "partials/blueprints.html.twig", "/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/admin/themes/grav/templates/partials/blueprints.html.twig");
    }
}
