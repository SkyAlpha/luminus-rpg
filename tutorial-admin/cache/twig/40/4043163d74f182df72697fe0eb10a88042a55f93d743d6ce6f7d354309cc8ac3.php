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

/* forms/fields/editor/editor.html.twig */
class __TwigTemplate_01f60e0cb28e6aaa4bfa83fe46cead6884f1767e480dc0ffb47834c1bd422424 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'field' => [$this, 'block_field'],
            'label' => [$this, 'block_label'],
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
        $context["whitelabel"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "whitelabel", []);
        // line 4
        $context["theme"] = ((($this->getAttribute(($context["whitelabel"] ?? null), "codemirror_theme", [], "any", true, true) &&  !(null === $this->getAttribute(($context["whitelabel"] ?? null), "codemirror_theme", [])))) ? ($this->getAttribute(($context["whitelabel"] ?? null), "codemirror_theme", [])) : ("paper.css"));
        // line 5
        $context["fontsize"] = ((($this->getAttribute(($context["whitelabel"] ?? null), "codemirror_fontsize", [], "any", true, true) &&  !(null === $this->getAttribute(($context["whitelabel"] ?? null), "codemirror_fontsize", [])))) ? ($this->getAttribute(($context["whitelabel"] ?? null), "codemirror_fontsize", [])) : ("lg"));
        // line 7
        $context["value"] = (($context["value"]) ?? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "default", []))));
        // line 8
        if ( !($context["codemirrorOptions"] ?? null)) {
            // line 9
            $context["codemirrorOptions"] = twig_array_merge(["mode" => "gfm", "theme" => ($context["theme"] ?? null), "ignore" => [0 => "code", 1 => "preview"], "font" => "mono"], (($this->getAttribute(($context["field"] ?? null), "codemirror", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "codemirror", []), [])) : ([])));
        }
        // line 12
        if ($this->getAttribute(($context["codemirrorOptions"] ?? null), "theme", [])) {
            // line 13
            $this->getAttribute(($context["assets"] ?? null), "addCss", [0 => (((($context["theme_url"] ?? null) . "/css/codemirror/themes/") . $this->getAttribute(($context["codemirrorOptions"] ?? null), "theme", [])) . ".css")], "method");
        }
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/editor/editor.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_field($context, array $blocks = [])
    {
        // line 17
        echo "    ";
        $this->displayBlock('label', $context, $blocks);
        // line 28
        echo "    <div class=\"form-field ";
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "classes", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["field"] ?? null), "classes", []), "")) : ("")), "html", null, true);
        echo "\">
        <div class=\"form-data grav-editor\">
            <div class=\"grav-editor-content is-active fontsize-";
        // line 30
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["codemirrorOptions"] ?? null), "font_size", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["codemirrorOptions"] ?? null), "font_size", []), ($context["fontsize"] ?? null))) : (($context["fontsize"] ?? null))), "html", null, true);
        echo " fontfamily-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["codemirrorOptions"] ?? null), "font", []), "html", null, true);
        echo "\">
                ";
        // line 31
        $context["input_value"] = ((twig_test_iterable(($context["value"] ?? null))) ? (twig_join_filter(($context["value"] ?? null), "
")) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter(($context["value"] ?? null))));
        // line 32
        echo "                <textarea
                    data-grav-editor=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_jsonencode_filter(["codemirror" => ($context["codemirrorOptions"] ?? null)]), "html_attr");
        echo "\"
                    data-grav-editor-mode=\"editor\"
                    name=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
                    ";
        // line 36
        if ($this->getAttribute(($context["field"] ?? null), "classes", [], "any", true, true)) {
            echo "class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo "\" ";
        }
        // line 37
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", []));
            echo "\" ";
        }
        // line 38
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "style", [], "any", true, true)) {
            echo "style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "style", []));
            echo "\" ";
        }
        // line 39
        echo "                    ";
        if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        // line 40
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "placeholder", [])) {
            echo "placeholder=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "placeholder", [])), "html", null, true);
            echo "\"";
        }
        // line 41
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autofocus", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "autofocus=\"autofocus\"";
        }
        // line 42
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "novalidate", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "novalidate=\"novalidate\"";
        }
        // line 43
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "readonly", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "readonly=\"readonly\"";
        }
        // line 44
        echo "                    ";
        if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "required", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "required=\"required\"";
        }
        // line 45
        echo "                    ";
        if (!twig_in_filter("preview", $this->getAttribute(($context["codemirrorOptions"] ?? null), "ignore", []))) {
            echo "data-grav-urlpreview=\"";
            echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
            echo "/media/";
            echo twig_escape_filter($this->env, twig_trim_filter($this->getAttribute(($context["admin"] ?? null), "route", []), "/"), "html", null, true);
            echo ".json\"";
        }
        // line 46
        echo "                >";
        echo twig_escape_filter($this->env, ($context["input_value"] ?? null), "html");
        echo "</textarea>
            </div>
            ";
        // line 48
        if (( !$this->getAttribute(($context["field"] ?? null), "resizer", [], "any", true, true) || !twig_in_filter($this->getAttribute(($context["field"] ?? null), "resizer", []), [0 => "off", 1 => "false", 2 => 0]))) {
            echo "<div class=\"grav-editor-resizer\"></div>";
        }
        // line 49
        echo "            ";
        if ($this->getAttribute(($context["field"] ?? null), "description", [])) {
            // line 50
            echo "                <div class=\"form-extra-wrapper ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "wrapper_classes", []), "html", null, true);
            echo "\">
                    <span class=\"form-description\">
                        ";
            // line 52
            if ($this->getAttribute(($context["field"] ?? null), "markdown", [])) {
                // line 53
                echo "                            ";
                echo $this->env->getExtension('Grav\Common\Twig\TwigExtension')->markdownFunction($context, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "description", [])), false);
                echo "
                        ";
            } else {
                // line 55
                echo "                            ";
                echo $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "description", []));
                echo "
                        ";
            }
            // line 57
            echo "                    </span>
                </div>
            ";
        }
        // line 60
        echo "        </div>
    </div>
";
    }

    // line 17
    public function block_label($context, array $blocks = [])
    {
        // line 18
        echo "        ";
        if ($this->getAttribute(($context["field"] ?? null), "label", [])) {
            // line 19
            echo "            ";
            if ($this->getAttribute(($context["field"] ?? null), "help", [])) {
                // line 20
                echo "                ";
                $context["hint"] = (("data-hint=\"" . $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "help", []))) . "\"");
                // line 21
                echo "            ";
            }
            // line 22
            echo "            <div class=\"form-label form-field hint--bottom\" ";
            echo ($context["hint"] ?? null);
            echo ">
                ";
            // line 23
            echo $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["field"] ?? null), "label", []));
            echo "
                ";
            // line 24
            echo ((twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "required", []), [0 => "on", 1 => "true", 2 => 1])) ? ("<span class=\"required\">*</span>") : (""));
            echo "
            </div>
        ";
        }
        // line 27
        echo "    ";
    }

    public function getTemplateName()
    {
        return "forms/fields/editor/editor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 27,  223 => 24,  219 => 23,  214 => 22,  211 => 21,  208 => 20,  205 => 19,  202 => 18,  199 => 17,  193 => 60,  188 => 57,  182 => 55,  176 => 53,  174 => 52,  166 => 50,  163 => 49,  159 => 48,  153 => 46,  144 => 45,  139 => 44,  134 => 43,  129 => 42,  124 => 41,  117 => 40,  112 => 39,  105 => 38,  98 => 37,  92 => 36,  88 => 35,  83 => 33,  80 => 32,  77 => 31,  71 => 30,  65 => 28,  62 => 17,  59 => 16,  54 => 1,  51 => 13,  49 => 12,  46 => 9,  44 => 8,  42 => 7,  40 => 5,  38 => 4,  36 => 3,  30 => 1,);
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

{% set whitelabel = config.plugins.admin.whitelabel %}
{% set theme = whitelabel.codemirror_theme ?? 'paper.css' %}
{% set fontsize = whitelabel.codemirror_fontsize ?? 'lg' %}

{% set value = value ?? field.default|tu %}
{% if not codemirrorOptions %}
    {% set codemirrorOptions = {'mode': 'gfm', 'theme': theme, 'ignore': ['code', 'preview'], 'font': 'mono'}|merge(field.codemirror|default({})) %}
{% endif %}

{% if codemirrorOptions.theme %}
    {% do assets.addCss(theme_url ~ '/css/codemirror/themes/' ~ codemirrorOptions.theme ~ '.css') %}
{% endif %}

{% block field %}
    {% block label %}
        {% if field.label %}
            {% if field.help %}
                {% set hint = 'data-hint=\"' ~ field.help|tu|raw ~ '\"' %}
            {% endif %}
            <div class=\"form-label form-field hint--bottom\" {{ hint|raw }}>
                {{ field.label|tu|raw }}
                {{ field.validate.required in ['on', 'true', 1] ? '<span class=\"required\">*</span>' }}
            </div>
        {% endif %}
    {% endblock %}
    <div class=\"form-field {{ field.classes|default('') }}\">
        <div class=\"form-data grav-editor\">
            <div class=\"grav-editor-content is-active fontsize-{{ codemirrorOptions.font_size|default(fontsize) }} fontfamily-{{ codemirrorOptions.font }}\">
                {% set input_value = value is iterable ? value|join(\"\\n\") : value|string %}
                <textarea
                    data-grav-editor=\"{{ {'codemirror': codemirrorOptions} | json_encode|e('html_attr') }}\"
                    data-grav-editor-mode=\"editor\"
                    name=\"{{ (scope ~ field.name)|fieldName }}\"
                    {% if field.classes is defined %}class=\"{{ field.classes }}\" {% endif %}
                    {% if field.id is defined %}id=\"{{ field.id|e }}\" {% endif %}
                    {% if field.style is defined %}style=\"{{ field.style|e }}\" {% endif %}
                    {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                    {% if field.placeholder %}placeholder=\"{{ field.placeholder|tu }}\"{% endif %}
                    {% if field.autofocus in ['on', 'true', 1] %}autofocus=\"autofocus\"{% endif %}
                    {% if field.novalidate in ['on', 'true', 1] %}novalidate=\"novalidate\"{% endif %}
                    {% if field.readonly in ['on', 'true', 1] %}readonly=\"readonly\"{% endif %}
                    {% if field.validate.required in ['on', 'true', 1] %}required=\"required\"{% endif %}
                    {% if 'preview' not in codemirrorOptions.ignore %}data-grav-urlpreview=\"{{ base_url }}/media/{{ admin.route|trim('/') }}.json\"{% endif %}
                >{{ input_value|e('html') }}</textarea>
            </div>
            {% if field.resizer is not defined or field.resizer not in ['off', 'false', 0] %}<div class=\"grav-editor-resizer\"></div>{% endif %}
            {% if field.description %}
                <div class=\"form-extra-wrapper {{ field.size }} {{ field.wrapper_classes }}\">
                    <span class=\"form-description\">
                        {% if field.markdown %}
                            {{ field.description|tu|markdown(false)|raw }}
                        {% else %}
                            {{ field.description|tu|raw }}
                        {% endif %}
                    </span>
                </div>
            {% endif %}
        </div>
    </div>
{% endblock %}
", "forms/fields/editor/editor.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/forms/fields/editor/editor.html.twig");
    }
}
