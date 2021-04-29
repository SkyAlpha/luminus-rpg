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

/* forms/fields/permissions/permissions.html.twig */
class __TwigTemplate_135c22819b8c6814e2e476d7f1b9316eb2cddb1158c195261633a729572c7ce9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'global_attributes' => [$this, 'block_global_attributes'],
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
        // line 116
        $context["macro"] = $this;
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/permissions/permissions.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 118
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 119
        echo "    data-grav-disabled=\"";
        echo (((null === ($context["originalValue"] ?? null))) ? ("true") : ("false"));
        echo "\"
    data-grav-default=\"";
        // line 120
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["field"] ?? null), "default", [])), "html_attr");
        echo "\"
";
    }

    // line 123
    public function block_input($context, array $blocks = [])
    {
        // line 124
        echo "    ";
        $context["options"] = ["1" => "PLUGIN_ADMIN.ALLOWED", "0" => "PLUGIN_ADMIN.DENIED", "" => "PLUGIN_ADMIN.NOT_SET"];
        // line 125
        echo "    ";
        $context["maxLen"] = 0;
        // line 126
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["text"]) {
            // line 127
            echo "        ";
            $context["maxLen"] = max(twig_length_filter($this->env, twig_trim_filter(((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($context["text"])) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $context["text"]))))), ($context["maxLen"] ?? null));
            // line 128
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['text'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "
    ";
        // line 130
        $context["permissions"] = $this->getAttribute(($context["grav"] ?? null), "permissions", []);
        // line 131
        echo "    ";
        $context["access"] = $this->getAttribute(($context["permissions"] ?? null), "access", [0 => ($context["value"] ?? null)], "method");
        // line 132
        echo "    ";
        $context["tu"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", [], "any", false, true), "twig", [], "any", false, true), "filters", [], "any", false, true), "tu", [], "array", true, true);
        // line 133
        echo "    ";
        if ((($context["object"] ?? null) && $this->getAttribute(($context["field"] ?? null), "check_authorize", []))) {
            // line 134
            echo "        ";
            $context["auth_badges"] = true;
            // line 135
            echo "        ";
            $context["super"] = $this->getAttribute(($context["object"] ?? null), "authorize", [0 => "admin.super", 1 => "test"], "method");
            // line 136
            echo "    ";
        }
        // line 137
        echo "
    <div class=\"permissions-container\">
        ";
        // line 139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["permissions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 140
            echo "            ";
            if ($this->getAttribute($context["section"], "count", [])) {
                // line 141
                echo "            ";
                echo $context["macro"]->getsection($context["section"], $context, 0);
                echo "
            ";
            }
            // line 143
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "
        ";
        // line 146
        echo "        ";
        ob_start();
        // line 147
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["access"] ?? null), "getAllActions", [], "method"));
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 148
            echo "            ";
            if ( !$this->getAttribute(($context["permissions"] ?? null), "getAction", [0 => $context["key"]], "method")) {
                // line 149
                echo "            ";
                echo $context["macro"]->getaction(["name" => $context["key"]], $context);
                echo "
            ";
            }
            // line 151
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        echo "        ";
        $context["unknown"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 153
        echo "
        ";
        // line 154
        if (twig_trim_filter(($context["unknown"] ?? null))) {
            // line 155
            echo "            <fieldset>
                <legend>Unknown Permissions</legend>
                ";
            // line 157
            echo ($context["unknown"] ?? null);
            echo "
            </fieldset>
        ";
        }
        // line 160
        echo "    </div>
";
    }

    // line 3
    public function getspanToggle($__input__ = null, $__length__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "input" => $__input__,
            "length" => $__length__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 4
            echo "    ";
            $context["space"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->repeatFunc("&nbsp;&nbsp;", ((($context["length"] ?? null) - twig_length_filter($this->env, ($context["input"] ?? null))) / 2));
            // line 5
            echo "    ";
            echo ((($context["space"] ?? null) . ($context["input"] ?? null)) . ($context["space"] ?? null));
            echo "
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 8
    public function getsection($__section__ = null, $__context__ = null, $__depth__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "section" => $__section__,
            "context" => $__context__,
            "depth" => $__depth__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 9
            echo "    ";
            $context["macro"] = $this;
            // line 10
            echo "
    ";
            // line 11
            $context["section_label"] = (($this->getAttribute(($context["context"] ?? null), "tu", [])) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter(((($this->getAttribute(($context["section"] ?? null), "label", [], "any", true, true) &&  !(null === $this->getAttribute(($context["section"] ?? null), "label", [])))) ? ($this->getAttribute(($context["section"] ?? null), "label", [])) : ($this->getAttribute(($context["section"] ?? null), "name", []))))) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, ((($this->getAttribute(($context["section"] ?? null), "label", [], "any", true, true) &&  !(null === $this->getAttribute(($context["section"] ?? null), "label", [])))) ? ($this->getAttribute(($context["section"] ?? null), "label", [])) : ($this->getAttribute(($context["section"] ?? null), "name", []))))));
            // line 12
            echo "
    ";
            // line 14
            echo "    ";
            if ((($context["depth"] ?? null) > 0)) {
                // line 15
                echo "
        ";
                // line 16
                $context["section_value"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter($this->getAttribute($this->getAttribute(($context["context"] ?? null), "access", []), "get", [0 => $this->getAttribute(($context["section"] ?? null), "name", [])], "method"));
                // line 17
                echo "        ";
                $context["params"] = ["context" =>                 // line 18
($context["context"] ?? null), "action_label" =>                 // line 19
($context["section_label"] ?? null), "action_value" =>                 // line 20
($context["section_value"] ?? null), "action_name" => $this->getAttribute(                // line 21
($context["section"] ?? null), "name", []), "action_class" => "parent-section"];
                // line 25
                echo "
        ";
                // line 26
                echo $context["macro"]->getaction_row(($context["params"] ?? null));
                echo "
    ";
            }
            // line 28
            echo "
    <fieldset>
        ";
            // line 30
            if ((($context["depth"] ?? null) == 0)) {
                // line 31
                echo "        <legend>";
                echo twig_escape_filter($this->env, ($context["section_label"] ?? null), "html", null, true);
                echo "</legend>
        ";
            }
            // line 33
            echo "
        ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["section"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 35
                echo "            ";
                if ($this->getAttribute($context["action"], "visible", [])) {
                    // line 36
                    echo "            ";
                    if ($this->getAttribute($context["action"], "count", [])) {
                        // line 37
                        echo "                ";
                        echo $context["macro"]->getsection($context["action"], ($context["context"] ?? null), (($context["depth"] ?? null) + 1));
                        echo "
            ";
                    } else {
                        // line 39
                        echo "                ";
                        echo $context["macro"]->getaction($context["action"], ($context["context"] ?? null));
                        echo "
            ";
                    }
                    // line 41
                    echo "            ";
                }
                // line 42
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "
    </fieldset>

";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 48
    public function getaction($__action__ = null, $__context__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "action" => $__action__,
            "context" => $__context__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 49
            echo "    ";
            $context["macro"] = $this;
            // line 50
            echo "
    ";
            // line 51
            $context["action_label"] = ((($this->getAttribute(($context["action"] ?? null), "label", [], "any", true, true) &&  !(null === $this->getAttribute(($context["action"] ?? null), "label", [])))) ? ($this->getAttribute(($context["action"] ?? null), "label", [])) : ($this->getAttribute(($context["action"] ?? null), "name", [])));
            // line 52
            echo "    ";
            $context["action_value"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->stringFilter($this->getAttribute($this->getAttribute(($context["context"] ?? null), "access", []), "get", [0 => $this->getAttribute(($context["action"] ?? null), "name", [])], "method"));
            // line 53
            echo "
    ";
            // line 54
            $context["params"] = ["context" =>             // line 55
($context["context"] ?? null), "action_label" =>             // line 56
($context["action_label"] ?? null), "action_value" =>             // line 57
($context["action_value"] ?? null), "action_name" => $this->getAttribute(            // line 58
($context["action"] ?? null), "name", []), "action_parent" => $this->getAttribute($this->getAttribute(            // line 59
($context["action"] ?? null), "getParent", [], "method"), "name", [])];
            // line 62
            echo "
    ";
            // line 63
            echo $context["macro"]->getaction_row(($context["params"] ?? null));
            echo "
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 66
    public function getaction_row($__data__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "data" => $__data__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 67
            echo "    ";
            $context["macro"] = $this;
            // line 68
            echo "
    ";
            // line 69
            $context["context"] = $this->getAttribute(($context["data"] ?? null), "context", []);
            // line 70
            echo "    ";
            $context["tu"] = $this->getAttribute(($context["context"] ?? null), "tu", []);
            // line 71
            echo "    ";
            $context["field"] = $this->getAttribute(($context["context"] ?? null), "field", []);
            // line 72
            echo "
    <div class=\"permission-container ";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "action_class", []), "html", null, true);
            echo "\">
        <div class=\"permission-name\">
            <span>";
            // line 75
            echo twig_escape_filter($this->env, ((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute(($context["data"] ?? null), "action_label", []))) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $this->getAttribute(($context["data"] ?? null), "action_label", [])))), "html", null, true);
            echo "</span>
            ";
            // line 76
            if ($this->getAttribute(($context["context"] ?? null), "auth_badges", [])) {
                // line 77
                echo "                ";
                $context["auth"] = ((($this->getAttribute($this->getAttribute(($context["context"] ?? null), "object", [], "any", false, true), "authorize", [0 => $this->getAttribute(($context["data"] ?? null), "action_name", []), 1 => "test"], "method", true, true) &&  !(null === $this->getAttribute($this->getAttribute(($context["context"] ?? null), "object", [], "any", false, true), "authorize", [0 => $this->getAttribute(($context["data"] ?? null), "action_name", []), 1 => "test"], "method")))) ? ($this->getAttribute($this->getAttribute(($context["context"] ?? null), "object", [], "any", false, true), "authorize", [0 => $this->getAttribute(($context["data"] ?? null), "action_name", []), 1 => "test"], "method")) : ($this->getAttribute(($context["context"] ?? null), "super", [])));
                // line 78
                echo "                ";
                if (($this->getAttribute(($context["context"] ?? null), "super", []) && ($context["auth"] ?? null))) {
                    // line 79
                    echo "                    <span class=\"badge badge-super\"><i class=\"icon-super\"></i></span>
                ";
                } elseif (                // line 80
($context["auth"] ?? null)) {
                    // line 81
                    echo "                    <span class=\"badge badge-access\"><i class=\"fa fa-check\"></i></span>
                ";
                } else {
                    // line 83
                    echo "                    <span class=\"badge badge-denied\"><i class=\"fa fa-ban\"></i></span>
                ";
                }
                // line 85
                echo "            ";
            }
            // line 86
            echo "        </div>

        <div class=\"switch-toggle switch-grav medium switch-3\">
            ";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["context"] ?? null), "options", []));
            foreach ($context['_seq'] as $context["key"] => $context["text"]) {
                // line 90
                echo "                ";
                $context["parent_id"] = (($this->getAttribute(($context["data"] ?? null), "action_parent", [])) ? (((("toggle_" . $this->getAttribute(($context["field"] ?? null), "name", [])) . ".") . $this->getAttribute(($context["data"] ?? null), "action_parent", []))) : (""));
                // line 91
                echo "                ";
                $context["id"] = (((("toggle_" . $this->getAttribute(($context["field"] ?? null), "name", [])) . ".") . $this->getAttribute(($context["data"] ?? null), "action_name", [])) . $context["key"]);
                // line 92
                echo "                ";
                $context["translation"] = twig_trim_filter(((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($context["text"])) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, $context["text"]))));
                // line 93
                echo "
                <input type=\"radio\"
                       value=\"";
                // line 95
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\"
                       id=\"";
                // line 96
                echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                echo "\"
                       ";
                // line 97
                if (($context["parent_id"] ?? null)) {
                    // line 98
                    echo "                       data-parent-id=\"";
                    echo twig_escape_filter($this->env, ($context["parent_id"] ?? null), "html", null, true);
                    echo "\"
                       ";
                }
                // line 100
                echo "                       name=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter(($this->getAttribute(($context["context"] ?? null), "scope", []) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
                echo "[";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "action_name", []), "html", null, true);
                echo "]\"
                       class=\"label";
                // line 101
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\"
                    ";
                // line 102
                if (($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter($context["key"]) == ("" . $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter($this->getAttribute(($context["data"] ?? null), "action_value", []))))) {
                    // line 103
                    echo "                        checked=\"checked\"
                    ";
                }
                // line 105
                echo "                    ";
                if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "required", []), [0 => "yes", 1 => "on", 2 => "true", 3 => 1, 4 => true])) {
                    echo "required=\"required\"";
                }
                // line 106
                echo "                />

                <label for=\"";
                // line 108
                echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
                echo "\">";
                echo twig_trim_filter($context["macro"]->getspanToggle(($context["translation"] ?? null), $this->getAttribute(($context["context"] ?? null), "maxLen", [])));
                echo "</label>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            echo "            <a></a>
        </div>
    </div>

";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "forms/fields/permissions/permissions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  511 => 110,  501 => 108,  497 => 106,  492 => 105,  488 => 103,  486 => 102,  482 => 101,  475 => 100,  469 => 98,  467 => 97,  463 => 96,  459 => 95,  455 => 93,  452 => 92,  449 => 91,  446 => 90,  442 => 89,  437 => 86,  434 => 85,  430 => 83,  426 => 81,  424 => 80,  421 => 79,  418 => 78,  415 => 77,  413 => 76,  409 => 75,  404 => 73,  401 => 72,  398 => 71,  395 => 70,  393 => 69,  390 => 68,  387 => 67,  375 => 66,  358 => 63,  355 => 62,  353 => 59,  352 => 58,  351 => 57,  350 => 56,  349 => 55,  348 => 54,  345 => 53,  342 => 52,  340 => 51,  337 => 50,  334 => 49,  321 => 48,  303 => 43,  297 => 42,  294 => 41,  288 => 39,  282 => 37,  279 => 36,  276 => 35,  272 => 34,  269 => 33,  263 => 31,  261 => 30,  257 => 28,  252 => 26,  249 => 25,  247 => 21,  246 => 20,  245 => 19,  244 => 18,  242 => 17,  240 => 16,  237 => 15,  234 => 14,  231 => 12,  229 => 11,  226 => 10,  223 => 9,  209 => 8,  191 => 5,  188 => 4,  175 => 3,  170 => 160,  164 => 157,  160 => 155,  158 => 154,  155 => 153,  152 => 152,  146 => 151,  140 => 149,  137 => 148,  132 => 147,  129 => 146,  126 => 144,  120 => 143,  114 => 141,  111 => 140,  107 => 139,  103 => 137,  100 => 136,  97 => 135,  94 => 134,  91 => 133,  88 => 132,  85 => 131,  83 => 130,  80 => 129,  74 => 128,  71 => 127,  66 => 126,  63 => 125,  60 => 124,  57 => 123,  51 => 120,  46 => 119,  43 => 118,  38 => 1,  36 => 116,  30 => 1,);
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

{% macro spanToggle(input, length) %}
    {% set space = repeat('&nbsp;&nbsp;', (length - input|length) / 2) %}
    {{ (space ~ input ~ space)|raw }}
{% endmacro %}

{% macro section(section, context, depth) %}
    {% import _self as macro %}

    {% set section_label = context.tu ? (section.label ?? section.name)|tu : (section.label ?? section.name)|t %}

    {# Sub sections can have top-level toggle.. needs to #}
    {% if depth > 0 %}

        {% set section_value = context.access.get(section.name)|string %}
        {% set params = {
            context: context,
            action_label: section_label,
            action_value: section_value,
            action_name: section.name,
            action_class: 'parent-section'
        }
        %}

        {{ macro.action_row(params) }}
    {% endif %}

    <fieldset>
        {%  if depth == 0 %}
        <legend>{{ section_label }}</legend>
        {% endif %}

        {% for action in section %}
            {% if action.visible %}
            {% if action.count %}
                {{ macro.section(action, context, depth + 1) }}
            {% else %}
                {{ macro.action(action, context) }}
            {% endif %}
            {% endif %}
        {% endfor %}

    </fieldset>

{% endmacro %}

{% macro action(action, context) %}
    {% import _self as macro %}

    {% set action_label = action.label ?? action.name %}
    {% set action_value = context.access.get(action.name)|string %}

    {% set params = {
        context: context,
        action_label: action_label,
        action_value: action_value,
        action_name: action.name,
        action_parent: action.getParent().name
        }
    %}

    {{ macro.action_row(params) }}
{% endmacro %}

{% macro action_row(data) %}
    {% import _self as macro %}

    {% set context = data.context %}
    {% set tu = context.tu %}
    {% set field = context.field %}

    <div class=\"permission-container {{ data.action_class }}\">
        <div class=\"permission-name\">
            <span>{{ tu ? data.action_label|tu :data.action_label|t }}</span>
            {% if context.auth_badges %}
                {% set auth = context.object.authorize(data.action_name, 'test') ?? context.super %}
                {% if context.super and auth %}
                    <span class=\"badge badge-super\"><i class=\"icon-super\"></i></span>
                {% elseif auth %}
                    <span class=\"badge badge-access\"><i class=\"fa fa-check\"></i></span>
                {% else %}
                    <span class=\"badge badge-denied\"><i class=\"fa fa-ban\"></i></span>
                {% endif %}
            {% endif %}
        </div>

        <div class=\"switch-toggle switch-grav medium switch-3\">
            {% for key, text in context.options %}
                {% set parent_id = data.action_parent ? \"toggle_\" ~ field.name ~ \".\" ~ data.action_parent %}
                {% set id = \"toggle_\" ~ field.name ~ \".\" ~ data.action_name ~ key %}
                {% set translation = (tu ? text|tu : text|t)|trim %}

                <input type=\"radio\"
                       value=\"{{ key }}\"
                       id=\"{{ id }}\"
                       {% if parent_id %}
                       data-parent-id=\"{{ parent_id }}\"
                       {% endif %}
                       name=\"{{ (context.scope ~ field.name)|fieldName }}[{{ data.action_name }}]\"
                       class=\"label{{ key }}\"
                    {% if key|fieldName == '' ~ data.action_value|fieldName %}
                        checked=\"checked\"
                    {% endif %}
                    {% if field.validate.required in ['yes', 'on', 'true', 1, true] %}required=\"required\"{% endif %}
                />

                <label for=\"{{ id }}\">{{ macro.spanToggle(translation, context.maxLen)|trim|raw }}</label>
            {% endfor %}
            <a></a>
        </div>
    </div>

{% endmacro %}

{% import _self as macro %}

{% block global_attributes %}
    data-grav-disabled=\"{{ originalValue is null ? 'true' : 'false' }}\"
    data-grav-default=\"{{ field.default|json_encode()|e('html_attr') }}\"
{% endblock %}

{% block input %}
    {% set options = { '1': 'PLUGIN_ADMIN.ALLOWED', '0': 'PLUGIN_ADMIN.DENIED', '': 'PLUGIN_ADMIN.NOT_SET' } %}
    {% set maxLen = 0 %}
    {% for text in options %}
        {% set maxLen = max((tu ? text|tu : text|t)|trim|length, maxLen) %}
    {% endfor %}

    {% set permissions = grav.permissions %}
    {% set access = permissions.access(value) %}
    {% set tu = grav.twig.twig.filters['tu'] is defined %}
    {% if object and field.check_authorize %}
        {% set auth_badges = true %}
        {% set super = object.authorize('admin.super', 'test') %}
    {% endif %}

    <div class=\"permissions-container\">
        {% for section in permissions %}
            {% if section.count %}
            {{ macro.section(section, _context, 0) }}
            {% endif %}
        {% endfor %}

        {# Look for missing actions #}
        {% set unknown %}
        {% for key,val in access.getAllActions() %}
            {% if not permissions.getAction(key) %}
            {{ macro.action({name: key}, _context) }}
            {% endif %}
        {% endfor %}
        {% endset %}

        {% if unknown|trim %}
            <fieldset>
                <legend>Unknown Permissions</legend>
                {{ unknown|raw }}
            </fieldset>
        {% endif %}
    </div>
{% endblock %}


", "forms/fields/permissions/permissions.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/forms/fields/permissions/permissions.html.twig");
    }
}
