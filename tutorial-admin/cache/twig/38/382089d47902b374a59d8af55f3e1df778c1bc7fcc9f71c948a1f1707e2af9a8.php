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

/* forms/fields/acl_picker/acl_picker.html.twig */
class __TwigTemplate_398eb8e676c755aa6a5e8f0e4846203ff6866a2edb2542ebcab2dcdccd783c13 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/acl_picker/acl_picker.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_input($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        $context["permissions"] = $this->getAttribute(($context["grav"] ?? null), "permissions", []);
        // line 5
        echo "    ";
        $context["tu"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "twig", [], "any", false, true), "twig", [], "any", false, true), "filters", [], "any", false, true), "tu", [], "array", true, true);
        // line 6
        echo "    ";
        $context["classes"] = ["" => "status-unchecked", 1 => "status-checked", 0 => "status-indeterminate"];
        // line 7
        echo "    ";
        $context["states"] = ["" => 0, 1 => 1, 0 => 2];
        // line 8
        echo "
    ";
        // line 9
        if (($this->getAttribute(($context["field"] ?? null), "data_type", []) == "access")) {
            // line 10
            echo "        ";
            $context["groupsList"] = [];
            // line 11
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["permissions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 12
                echo "            ";
                if (((($this->getAttribute($context["action"], "visible", [], "any", true, true) &&  !(null === $this->getAttribute($context["action"], "visible", [])))) ? ($this->getAttribute($context["action"], "visible", [])) : (true))) {
                    // line 13
                    echo "            ";
                    $context["groupsList"] = twig_array_merge(($context["groupsList"] ?? null), [0 => ["label" => $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute($context["action"], "label", [])), "value" => $this->getAttribute($context["action"], "name", [])]]);
                    // line 14
                    echo "            ";
                }
                // line 15
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "
        ";
            // line 17
            $context["optionsList"] = [];
            // line 18
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["permissions"] ?? null), "instances", []));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 19
                echo "            ";
                if (((($this->getAttribute($context["action"], "visible", [], "any", true, true) &&  !(null === $this->getAttribute($context["action"], "visible", [])))) ? ($this->getAttribute($context["action"], "visible", [])) : (true))) {
                    // line 20
                    echo "            ";
                    $context["label"] = ((($this->getAttribute($this->getAttribute($context["action"], "params", []), "letter", [])) ? (($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute($this->getAttribute($context["action"], "parent", []), "label", [])) . " > ")) : ("")) . $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter($this->getAttribute($context["action"], "label", [])));
                    // line 21
                    echo "            ";
                    $context["optionsList"] = twig_array_merge(($context["optionsList"] ?? null), [0 => ["text" => (((($context["label"] ?? null) . " (") . $this->getAttribute($context["action"], "name", [])) . ")"), "value" => $this->getAttribute($context["action"], "name", []), "optgroup" => $this->getAttribute($context["action"], "scope", [])]]);
                    // line 22
                    echo "            ";
                }
                // line 23
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "    ";
        } elseif (($this->getAttribute(($context["field"] ?? null), "data_type", []) == "permissions")) {
            // line 25
            echo "        ";
            $context["groups"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "flex", []), "directory", [0 => "user-groups"], "method");
            // line 26
            echo "        ";
            $context["groupsList"] = [];
            // line 27
            echo "        ";
            $context["crudp"] = ["create" => ["letter" => "C", "title" => "Create", "value" => ""], "read" => ["letter" => "R", "title" => "Read", "value" => ""], "update" => ["letter" => "U", "title" => "Update", "value" => ""], "delete" => ["letter" => "D", "title" => "Delete", "value" => ""]];
            // line 33
            echo "
        ";
            // line 34
            if ($this->getAttribute(($context["object"] ?? null), "hasFlexFeature", [0 => "page"], "method")) {
                // line 35
                echo "            ";
                $context["optionsList"] = [0 => ["text" => "Page Authors (Special)", "value" => "authors"], 1 => ["text" => "Default ACL (Special)", "value" => "defaults"]];
                // line 36
                echo "        ";
            } else {
                // line 37
                echo "            ";
                $context["optionsList"] = [];
                // line 38
                echo "        ";
            }
            // line 39
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["groups"] ?? null), "index", []));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 40
                echo "        ";
                $context["optionsList"] = twig_array_merge(($context["optionsList"] ?? null), [0 => ["text" => ((($this->getAttribute($context["group"], "readableName", [], "any", true, true) &&  !(null === $this->getAttribute($context["group"], "readableName", [])))) ? ($this->getAttribute($context["group"], "readableName", [])) : ($this->getAttribute($context["group"], "groupname", []))), "value" => $this->getAttribute($context["group"], "groupname", [])]]);
                // line 41
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "    ";
        }
        // line 43
        echo "
    <template data-id=\"acl_picker-";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "name", []), "html", null, true);
        echo "\">
        <div class=\"permissions-item\" data-field-type=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "data_type", []), "html", null, true);
        echo "\">
            <a href=\"#\" class=\"remove-item\"><i class=\"fa fa-trash\"></i></a>
            <select data-grav-selectize=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_jsonencode_filter(["options" => ($context["optionsList"] ?? null), "optgroups" => ($context["groupsList"] ?? null)]), "html", null, true);
        echo "\"></select>

            ";
        // line 49
        if (($this->getAttribute(($context["field"] ?? null), "data_type", []) == "access")) {
            // line 50
            echo "            <div class=\"switch-toggle switch-grav medium switch-3\">
                <input type=\"radio\" value=\"1\" id=\"";
            // line 51
            echo twig_escape_filter($this->env, ($this->getAttribute(($context["field"] ?? null), "name", []) . "_"), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[]"), "html", null, true);
            echo "\" class=\"label1\" checked>

                <label for=\"";
            // line 53
            echo twig_escape_filter($this->env, ($this->getAttribute(($context["field"] ?? null), "name", []) . "_"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ALLOWED")) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_ADMIN.ALLOWED"))), "html", null, true);
            echo "</label>

                <input type=\"radio\" value=\"0\" id=\"";
            // line 55
            echo twig_escape_filter($this->env, ($this->getAttribute(($context["field"] ?? null), "name", []) . "_"), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[]"), "html", null, true);
            echo "\" class=\"label0\">

                <label for=\"";
            // line 57
            echo twig_escape_filter($this->env, ($this->getAttribute(($context["field"] ?? null), "name", []) . "_"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DENIED")) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_ADMIN.DENIED"))), "html", null, true);
            echo "</label>

            </div>
            ";
        } elseif (($this->getAttribute(        // line 60
($context["field"] ?? null), "data_type", []) == "permissions")) {
            // line 61
            echo "                ";
            $context["data_field_name"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter(((($context["scope"] ?? null) . "_json.") . $this->getAttribute(($context["field"] ?? null), "name", [])));
            // line 62
            echo "                <div class=\"crudp-container\" data-field-name=\"";
            echo twig_escape_filter($this->env, (($context["data_field_name"] ?? null) . "[]"), "html", null, true);
            echo "\">
                    ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["crudp"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["button"]) {
                // line 64
                echo "                        <div>
                            <span class=\"checkboxes indeterminate toggleable status-unchecked hint--top\"
                                  data-_check-status=\"0\"
                                  data-hint=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["button"], "title", []), "html", null, true);
                echo "\">
                                <input type=\"checkbox\"
                                       id=\"";
                // line 69
                echo twig_escape_filter($this->env, ((($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . $context["key"]) . "_"), "html", null, true);
                echo "\"
                                       data-crudp-key=\"";
                // line 70
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\"
                                      ";
                // line 72
                echo "                                       indeterminte=\"false\" value=\"\">
                                <label for=\"";
                // line 73
                echo twig_escape_filter($this->env, ((($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . $context["key"]) . "_"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["button"], "letter", []), "html", null, true);
                echo "</label>
                            </span>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['button'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "
                    <input type=\"hidden\" name=\"";
            // line 78
            echo twig_escape_filter($this->env, (((($context["data_field_name"] ?? null) . "[][") . ($context["key"] ?? null)) . "]"), "html", null, true);
            echo "\">
                </div>
            ";
        }
        // line 81
        echo "            <button class=\"button add-item\"><i class=\"fa fa-plus\"></i></button>
        </div>
    </template>


    <div class=\"permissions-container\" data-acl_picker_id=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "name", []), "html", null, true);
        echo "\" data-acl_picker=\"";
        echo twig_escape_filter($this->env, twig_jsonencode_filter(["options" => ($context["optionsList"] ?? null), "optgroups" => ($context["groupsList"] ?? null)]), "html", null, true);
        echo "\">
        <div class=\"permissions-item empty-list ";
        // line 87
        echo ((twig_length_filter($this->env, ($context["value"] ?? null))) ? ("hidden") : (""));
        echo "\">
            <a href=\"#\" class=\"button add-item\"><i class=\"fa fa-plus\"></i></a>
        </div>

        ";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["access"]) {
            // line 92
            echo "            <div class=\"permissions-item\" data-field-type=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "data_type", []), "html", null, true);
            echo "\">
                <a href=\"#\" class=\"remove-item\"><i class=\"fa fa-trash\"></i></a>
                <select data-grav-selectize=\"";
            // line 94
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["options" => ($context["optionsList"] ?? null), "optgroups" => ($context["groupsList"] ?? null)]), "html", null, true);
            echo "\">
                    <option value=\"";
            // line 95
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" selected>";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</option>
                </select>
                ";
            // line 97
            if (($this->getAttribute(($context["field"] ?? null), "data_type", []) == "access")) {
                // line 98
                echo "                <div class=\"switch-toggle switch-grav medium switch-3\">
                    ";
                // line 99
                $context["rnd"] = twig_random($this->env, 100);
                // line 100
                echo "                    <input type=\"radio\" value=\"1\" id=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . ($context["rnd"] ?? null)), "html", null, true);
                echo "\" name=\"";
                echo twig_escape_filter($this->env, ((($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[") . $context["key"]) . "]"), "html", null, true);
                echo "\" class=\"label1\" ";
                echo (($context["access"]) ? ("checked") : (""));
                echo ">

                    <label for=\"";
                // line 102
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . ($context["rnd"] ?? null)), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ALLOWED")) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_ADMIN.ALLOWED"))), "html", null, true);
                echo "</label>

                    ";
                // line 104
                $context["rnd"] = twig_random($this->env, 100);
                // line 105
                echo "                    <input type=\"radio\" value=\"0\" id=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . ($context["rnd"] ?? null)), "html", null, true);
                echo "\" name=\"";
                echo twig_escape_filter($this->env, ((($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . "[") . $context["key"]) . "]"), "html", null, true);
                echo "\" class=\"label0\" ";
                echo (( !$context["access"]) ? ("checked") : (""));
                echo ">

                    <label for=\"";
                // line 107
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . ($context["rnd"] ?? null)), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ((($context["tu"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.DENIED")) : ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->translate($this->env, "PLUGIN_ADMIN.DENIED"))), "html", null, true);
                echo "</label>

                </div>
                ";
            } elseif (($this->getAttribute(            // line 110
($context["field"] ?? null), "data_type", []) == "permissions")) {
                // line 111
                echo "                    ";
                $context["data_field_name"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter(((($context["scope"] ?? null) . "_json.") . $this->getAttribute(($context["field"] ?? null), "name", [])));
                // line 112
                echo "                    <div class=\"crudp-container\" data-field-name=\"";
                echo twig_escape_filter($this->env, (($context["data_field_name"] ?? null) . "[]"), "html", null, true);
                echo "\">
                        ";
                // line 113
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["crudp"] ?? null));
                foreach ($context['_seq'] as $context["crudp_key"] => $context["button"]) {
                    // line 114
                    echo "                            <div>
                                ";
                    // line 115
                    $context["crudp_value"] = $this->getAttribute($this->getAttribute(($context["value"] ?? null), $context["key"], [], "array"), $context["crudp_key"], [], "array");
                    // line 116
                    echo "                                <span class=\"checkboxes indeterminate toggleable ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["classes"] ?? null), ($context["crudp_value"] ?? null), [], "array"), "html", null, true);
                    echo " hint--top\"
                                      data-_check-status=\"";
                    // line 117
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["states"] ?? null), ($context["crudp_value"] ?? null), [], "array"), "html", null, true);
                    echo "\"
                                      data-hint=\"";
                    // line 118
                    echo twig_escape_filter($this->env, $this->getAttribute($context["button"], "title", []), "html", null, true);
                    echo "\">
                                    <input type=\"checkbox\"
                                           id=\"";
                    // line 120
                    echo twig_escape_filter($this->env, ((($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . $context["crudp_key"]) . "_"), "html", null, true);
                    echo "\"
                                           data-crudp-key=\"";
                    // line 121
                    echo twig_escape_filter($this->env, $context["crudp_key"], "html", null, true);
                    echo "\"
                                           ";
                    // line 123
                    echo "                                           indeterminate=\"false\" value=\"";
                    echo twig_escape_filter($this->env, ($context["crudp_value"] ?? null), "html", null, true);
                    echo "\">
                                    <label for=\"";
                    // line 124
                    echo twig_escape_filter($this->env, ((($this->getAttribute(($context["field"] ?? null), "name", []) . "_") . $context["crudp_key"]) . "_"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["button"], "letter", []), "html", null, true);
                    echo "</label>
                                </span>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['crudp_key'], $context['button'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                echo "                        <input type=\"hidden\" name=\"";
                echo twig_escape_filter($this->env, (((($context["data_field_name"] ?? null) . "[") . $context["key"]) . "]"), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter((($this->getAttribute(($context["value"] ?? null), $context["key"], [], "array", true, true)) ? (_twig_default_filter($this->getAttribute(($context["value"] ?? null), $context["key"], [], "array"), [])) : ([]))), "html", null, true);
                echo "\">
                    </div>
                ";
            }
            // line 131
            echo "                <button class=\"button add-item\"><i class=\"fa fa-plus\"></i></button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['access'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 134
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/acl_picker/acl_picker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  423 => 134,  415 => 131,  406 => 128,  394 => 124,  389 => 123,  385 => 121,  381 => 120,  376 => 118,  372 => 117,  367 => 116,  365 => 115,  362 => 114,  358 => 113,  353 => 112,  350 => 111,  348 => 110,  340 => 107,  330 => 105,  328 => 104,  321 => 102,  311 => 100,  309 => 99,  306 => 98,  304 => 97,  297 => 95,  293 => 94,  287 => 92,  283 => 91,  276 => 87,  270 => 86,  263 => 81,  257 => 78,  254 => 77,  242 => 73,  239 => 72,  235 => 70,  231 => 69,  226 => 67,  221 => 64,  217 => 63,  212 => 62,  209 => 61,  207 => 60,  199 => 57,  192 => 55,  185 => 53,  178 => 51,  175 => 50,  173 => 49,  168 => 47,  163 => 45,  159 => 44,  156 => 43,  153 => 42,  147 => 41,  144 => 40,  139 => 39,  136 => 38,  133 => 37,  130 => 36,  127 => 35,  125 => 34,  122 => 33,  119 => 27,  116 => 26,  113 => 25,  110 => 24,  104 => 23,  101 => 22,  98 => 21,  95 => 20,  92 => 19,  87 => 18,  85 => 17,  82 => 16,  76 => 15,  73 => 14,  70 => 13,  67 => 12,  62 => 11,  59 => 10,  57 => 9,  54 => 8,  51 => 7,  48 => 6,  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
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
    {% set permissions = grav.permissions %}
    {% set tu = grav.twig.twig.filters['tu'] is defined %}
    {% set classes = { '': 'status-unchecked', 1: 'status-checked', 0: 'status-indeterminate' } %}
    {% set states = { '': 0, 1: 1, 0: 2 } %}

    {% if field.data_type == 'access' %}
        {% set groupsList = [] %}
        {% for action in permissions %}
            {% if (action.visible ?? true) %}
            {% set groupsList = groupsList|merge([{ label: action.label|tu, value: action.name }]) %}
            {% endif %}
        {% endfor %}

        {% set optionsList = [] %}
        {% for action in permissions.instances %}
            {% if (action.visible ?? true) %}
            {% set label  = (action.params.letter ? action.parent.label|tu ~ ' > ') ~ action.label|tu %}
            {% set optionsList = optionsList|merge([{ text: label ~ ' (' ~ action.name ~ ')', value: action.name, optgroup: action.scope }]) %}
            {% endif %}
        {% endfor %}
    {% elseif field.data_type == 'permissions' %}
        {% set groups = grav.flex.directory('user-groups') %}
        {% set groupsList = [] %}
        {% set crudp = {
            create: { letter: 'C', title: 'Create', value: '' },
            read: { letter: 'R', title: 'Read', value: '' },
            update: { letter: 'U', title: 'Update', value: '' },
            delete: { letter: 'D', title: 'Delete', value: '' }
        } %}

        {% if object.hasFlexFeature('page') %}
            {% set optionsList = [{text: 'Page Authors (Special)', value: 'authors'}, {text: 'Default ACL (Special)', value: 'defaults'}] %}
        {% else %}
            {% set optionsList = [] %}
        {% endif %}
        {% for group in groups.index %}
        {% set optionsList = optionsList|merge([{ text: group.readableName ?? group.groupname, value: group.groupname }]) %}
        {% endfor %}
    {% endif %}

    <template data-id=\"acl_picker-{{ field.name }}\">
        <div class=\"permissions-item\" data-field-type=\"{{ field.data_type }}\">
            <a href=\"#\" class=\"remove-item\"><i class=\"fa fa-trash\"></i></a>
            <select data-grav-selectize=\"{{ { options: optionsList, optgroups: groupsList }|json_encode }}\"></select>

            {% if field.data_type == 'access' %}
            <div class=\"switch-toggle switch-grav medium switch-3\">
                <input type=\"radio\" value=\"1\" id=\"{{ field.name ~ '_' }}\" name=\"{{ (scope ~ field.name)|fieldName ~ '[]' }}\" class=\"label1\" checked>

                <label for=\"{{ field.name ~ '_' }}\">{{ tu ? 'PLUGIN_ADMIN.ALLOWED'|tu : 'PLUGIN_ADMIN.ALLOWED'|t }}</label>

                <input type=\"radio\" value=\"0\" id=\"{{ field.name ~ '_' }}\" name=\"{{ (scope ~ field.name)|fieldName ~ '[]' }}\" class=\"label0\">

                <label for=\"{{ field.name ~ '_' }}\">{{ tu ? 'PLUGIN_ADMIN.DENIED'|tu : 'PLUGIN_ADMIN.DENIED'|t }}</label>

            </div>
            {% elseif field.data_type == 'permissions' %}
                {% set data_field_name = (scope ~ '_json.' ~ field.name)|fieldName %}
                <div class=\"crudp-container\" data-field-name=\"{{ data_field_name ~ '[]' }}\">
                    {% for key, button in crudp %}
                        <div>
                            <span class=\"checkboxes indeterminate toggleable status-unchecked hint--top\"
                                  data-_check-status=\"0\"
                                  data-hint=\"{{ button.title }}\">
                                <input type=\"checkbox\"
                                       id=\"{{ field.name ~ '_' ~ key ~ '_' }}\"
                                       data-crudp-key=\"{{ key }}\"
                                      {# name=\"{{ (scope ~ field.name)|fieldName ~ '[][' ~ key ~ ']' }}\"#}
                                       indeterminte=\"false\" value=\"\">
                                <label for=\"{{ field.name ~ '_' ~ key ~ '_' }}\">{{ button.letter }}</label>
                            </span>
                        </div>
                    {% endfor %}

                    <input type=\"hidden\" name=\"{{ data_field_name ~ '[][' ~ key ~ ']' }}\">
                </div>
            {% endif %}
            <button class=\"button add-item\"><i class=\"fa fa-plus\"></i></button>
        </div>
    </template>


    <div class=\"permissions-container\" data-acl_picker_id=\"{{ field.name }}\" data-acl_picker=\"{{ { options: optionsList, optgroups: groupsList }|json_encode }}\">
        <div class=\"permissions-item empty-list {{ value|length ? 'hidden' }}\">
            <a href=\"#\" class=\"button add-item\"><i class=\"fa fa-plus\"></i></a>
        </div>

        {% for key, access in value %}
            <div class=\"permissions-item\" data-field-type=\"{{ field.data_type }}\">
                <a href=\"#\" class=\"remove-item\"><i class=\"fa fa-trash\"></i></a>
                <select data-grav-selectize=\"{{ { options: optionsList, optgroups: groupsList }|json_encode }}\">
                    <option value=\"{{ key }}\" selected>{{ key }}</option>
                </select>
                {% if field.data_type == 'access' %}
                <div class=\"switch-toggle switch-grav medium switch-3\">
                    {% set rnd = random(100) %}
                    <input type=\"radio\" value=\"1\" id=\"{{ field.name ~ '_' ~ rnd }}\" name=\"{{ (scope ~ field.name)|fieldName ~ '[' ~ key ~ ']' }}\" class=\"label1\" {{ access ? 'checked' }}>

                    <label for=\"{{ field.name ~ '_' ~ rnd }}\">{{ tu ? 'PLUGIN_ADMIN.ALLOWED'|tu : 'PLUGIN_ADMIN.ALLOWED'|t }}</label>

                    {% set rnd = random(100) %}
                    <input type=\"radio\" value=\"0\" id=\"{{ field.name ~ '_' ~ rnd }}\" name=\"{{ (scope ~ field.name)|fieldName ~ '[' ~ key ~ ']' }}\" class=\"label0\" {{ not access ? 'checked' }}>

                    <label for=\"{{ field.name ~ '_' ~ rnd }}\">{{ tu ? 'PLUGIN_ADMIN.DENIED'|tu : 'PLUGIN_ADMIN.DENIED'|t }}</label>

                </div>
                {% elseif field.data_type == 'permissions' %}
                    {% set data_field_name = (scope ~ '_json.' ~ field.name)|fieldName %}
                    <div class=\"crudp-container\" data-field-name=\"{{ data_field_name ~ '[]' }}\">
                        {% for crudp_key, button in crudp %}
                            <div>
                                {% set crudp_value = value[key][crudp_key] %}
                                <span class=\"checkboxes indeterminate toggleable {{ classes[crudp_value] }} hint--top\"
                                      data-_check-status=\"{{ states[crudp_value] }}\"
                                      data-hint=\"{{ button.title }}\">
                                    <input type=\"checkbox\"
                                           id=\"{{ field.name ~ '_' ~ crudp_key ~ '_' }}\"
                                           data-crudp-key=\"{{ crudp_key }}\"
                                           {#name=\"{{ (scope ~ field.name)|fieldName ~ '[' ~ key ~ '][' ~ crudp_key ~ ']' }}\"#}
                                           indeterminate=\"false\" value=\"{{ crudp_value }}\">
                                    <label for=\"{{ field.name ~ '_' ~ crudp_key ~ '_' }}\">{{ button.letter }}</label>
                                </span>
                            </div>
                        {% endfor %}
                        <input type=\"hidden\" name=\"{{ data_field_name ~ '[' ~ key ~ ']' }}\" value=\"{{ value[key]|default([])|json_encode }}\">
                    </div>
                {% endif %}
                <button class=\"button add-item\"><i class=\"fa fa-plus\"></i></button>
            </div>
        {% endfor %}
    </div>
{% endblock %}
", "forms/fields/acl_picker/acl_picker.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/forms/fields/acl_picker/acl_picker.html.twig");
    }
}
