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

/* forms/fields/file/file.html.twig */
class __TwigTemplate_c615c1827976999d9f5960576ff8069803ac573290552def380cc6d7bc1e9988 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'input' => [$this, 'block_input'],
            'prepend' => [$this, 'block_prepend'],
            'file_extras' => [$this, 'block_file_extras'],
            'input_attributes' => [$this, 'block_input_attributes'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 58
        $context["macro"] = $this;
        // line 60
        $context["defaults"] = $this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "form", []);
        // line 61
        $context["files"] = twig_array_merge($this->getAttribute(($context["defaults"] ?? null), "files", []), ((array_key_exists("field", $context)) ? (_twig_default_filter(($context["field"] ?? null), [])) : ([])));
        // line 62
        $context["limit"] = (( !$this->getAttribute(($context["field"] ?? null), "multiple", [])) ? (1) : ($this->getAttribute(($context["files"] ?? null), "limit", [])));
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/file/file.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 64
    public function block_input($context, array $blocks = [])
    {
        // line 65
        echo "    ";
        $context["page_can_upload"] = (($context["exists"] ?? null) || (((($context["type"] ?? null) == "page") &&  !($context["exists"] ?? null)) &&  !((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $this->getAttribute(($context["field"] ?? null), "destination", [])) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "@self") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144))) || (is_string($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $this->getAttribute(($context["field"] ?? null), "destination", [])) && is_string($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = "self@") && ('' === $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 || 0 === strpos($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b, $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002))))));
        // line 66
        echo "    ";
        if ((($context["form"] ?? null) || ( !array_key_exists("type", $context) || ($context["page_can_upload"] ?? null)))) {
            // line 67
            echo "
    ";
            // line 68
            $this->displayBlock('prepend', $context, $blocks);
            // line 69
            echo "    ";
            $context["settings"] = ["name" => $this->getAttribute(($context["field"] ?? null), "name", []), "paramName" => ($this->env->getExtension('Grav\Common\Twig\TwigExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))) . (($this->getAttribute(($context["files"] ?? null), "multiple", [])) ? ("[]") : (""))), "limit" => ($context["limit"] ?? null), "filesize" => ($context["form_max_filesize"] ?? null), "accept" => $this->getAttribute(($context["files"] ?? null), "accept", []), "resolution" => $this->getAttribute(($context["files"] ?? null), "resolution", []), "resizeWidth" => $this->getAttribute(($context["files"] ?? null), "resizeWidth", []), "resizeHeight" => $this->getAttribute(($context["files"] ?? null), "resizeHeight", []), "resizeQuality" => $this->getAttribute(($context["files"] ?? null), "resizeQuality", [])];
            // line 70
            echo "    ";
            $context["dropzoneSettings"] = $this->getAttribute(($context["field"] ?? null), "dropzone", []);
            // line 71
            echo "    ";
            if ($this->getAttribute(($context["form"] ?? null), "getMediaTaskRoute", [], "method")) {
                // line 72
                echo "        ";
                $context["file_url_add"] = (($context["base_url_relative"] ?? null) . $this->getAttribute(($context["form"] ?? null), "getMediaTaskRoute", [0 => [], 1 => "json"], "method"));
                // line 73
                echo "        ";
                $context["file_task_add"] = ["task" => "media.upload", "name" => $this->getAttribute(($context["field"] ?? null), "name", []), "__form-name__" => $this->getAttribute(($context["form"] ?? null), "name", []), "__unique_form_id__" => $this->getAttribute(($context["form"] ?? null), "uniqueid", [])];
                // line 74
                echo "
        ";
                // line 75
                $context["file_url_remove"] = (($context["base_url_relative"] ?? null) . $this->getAttribute(($context["form"] ?? null), "getMediaTaskRoute", [0 => [], 1 => "json"], "method"));
                // line 76
                echo "        ";
                $context["file_task_remove"] = ["task" => "media.delete", "name" => $this->getAttribute(($context["field"] ?? null), "name", []), "__form-name__" => $this->getAttribute(($context["form"] ?? null), "name", []), "__unique_form_id__" => $this->getAttribute(($context["form"] ?? null), "uniqueid", [])];
                // line 77
                echo "    ";
            } else {
                // line 78
                echo "        ";
                $context["file_url_remove"] = ((($context["file_url_remove"] ?? null)) ? (($context["file_url_remove"] ?? null)) : (($context["base_url_relative"] ?? null)));
                // line 79
                echo "    ";
            }
            // line 80
            echo "
    <div class=\"";
            // line 81
            ((($context["form_field_wrapper_classes"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["form_field_wrapper_classes"] ?? null), "html", null, true))) : (print ("form-input-wrapper")));
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo " dropzone files-upload ";
            if ( !($this->getAttribute(($context["field"] ?? null), "fancy", []) === false)) {
                echo "form-input-file";
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
            echo "\"
         data-grav-file-settings=\"";
            // line 82
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["settings"] ?? null)), "html_attr");
            echo "\"
         data-dropzone-options=\"";
            // line 83
            echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["dropzoneSettings"] ?? null)), "html_attr");
            echo "\"
         ";
            // line 84
            if ((($context["file_task_add"] ?? null) && ($context["file_task_remove"] ?? null))) {
                // line 85
                echo "             data-file-post-add=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["file_task_add"] ?? null)), "html_attr");
                echo "\"
             data-file-post-remove=\"";
                // line 86
                echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["file_task_remove"] ?? null)), "html_attr");
                echo "\"
             data-file-url-add=\"";
                // line 87
                echo twig_escape_filter($this->env, ($context["file_url_add"] ?? null), "html", null, true);
                echo "\"
             data-file-url-remove=\"";
                // line 88
                echo twig_escape_filter($this->env, ($context["file_url_remove"] ?? null), "html", null, true);
                echo "\"
         ";
            } else {
                // line 90
                echo "             ";
                if (($context["file_url_add"] ?? null)) {
                    echo "data-file-url-add=\"";
                    echo twig_escape_filter($this->env, ($context["file_url_add"] ?? null), "html", null, true);
                    echo "\"";
                }
                // line 91
                echo "             ";
                if (($context["file_url_remove"] ?? null)) {
                    echo "data-file-url-remove=\"";
                    echo twig_escape_filter($this->env, ($context["file_url_remove"] ?? null), "html", null, true);
                    echo "\"";
                }
                // line 92
                echo "         ";
            }
            // line 93
            echo "    >

    ";
            // line 95
            $this->displayBlock('file_extras', $context, $blocks);
            // line 96
            echo "    <input
            ";
            // line 98
            echo "            ";
            $this->displayBlock('input_attributes', $context, $blocks);
            // line 107
            echo "    />

    ";
            // line 109
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["value"] ?? null));
            foreach ($context['_seq'] as $context["path"] => $context["file"]) {
                // line 110
                echo "        ";
                echo $context["macro"]->getpreview($context["path"], $context["file"], $context);
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['path'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "    ";
            $this->loadTemplate("forms/fields/hidden/hidden.html.twig", "forms/fields/file/file.html.twig", 112)->display(twig_array_merge($context, ["field" => ["name" => ("_json." . $this->getAttribute(($context["field"] ?? null), "name", []))], "value" => twig_jsonencode_filter((($context["value"]) ?? ([])))]));
            // line 113
            echo "    </div>

    ";
        } else {
            // line 116
            echo "        <span class=\"note\">";
            echo $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CANNOT_ADD_FILES_PAGE_NOT_SAVED");
            echo "</span>
    ";
        }
    }

    // line 68
    public function block_prepend($context, array $blocks = [])
    {
    }

    // line 95
    public function block_file_extras($context, array $blocks = [])
    {
    }

    // line 98
    public function block_input_attributes($context, array $blocks = [])
    {
        // line 99
        echo "                type=\"file\"
                ";
        // line 100
        if ($this->getAttribute(($context["files"] ?? null), "multiple", [])) {
            echo "multiple=\"multiple\"";
        }
        // line 101
        echo "                ";
        if ($this->getAttribute(($context["files"] ?? null), "accept", [])) {
            echo "accept=\"";
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute(($context["files"] ?? null), "accept", []), ","), "html", null, true);
            echo "\"";
        }
        // line 102
        echo "                ";
        if (($this->getAttribute(($context["field"] ?? null), "disabled", []) || ($context["isDisabledToggleable"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        // line 103
        echo "                ";
        if ($this->getAttribute(($context["field"] ?? null), "random_name", [])) {
            echo "random=\"true\"";
        }
        // line 104
        echo "                ";
        if (($context["required"] ?? null)) {
            echo "required=\"required\"";
        }
        // line 105
        echo "                ";
        $this->displayParentBlock("input_attributes", $context, $blocks);
        echo "
            ";
    }

    // line 3
    public function getbytesToSize($__bytes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "bytes" => $__bytes__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 4
            ob_start();
            // line 5
            echo "        ";
            $context["kilobyte"] = 1024;
            // line 6
            echo "        ";
            $context["megabyte"] = (($context["kilobyte"] ?? null) * 1024);
            // line 7
            echo "        ";
            $context["gigabyte"] = (($context["megabyte"] ?? null) * 1024);
            // line 8
            echo "        ";
            $context["terabyte"] = (($context["gigabyte"] ?? null) * 1024);
            // line 9
            echo "
        ";
            // line 10
            if ((($context["bytes"] ?? null) < ($context["kilobyte"] ?? null))) {
                // line 11
                echo "            ";
                echo twig_escape_filter($this->env, (($context["bytes"] ?? null) . " B"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 12
($context["bytes"] ?? null) < ($context["megabyte"] ?? null))) {
                // line 13
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["kilobyte"] ?? null)), 2, ".") . " KB"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 14
($context["bytes"] ?? null) < ($context["gigabyte"] ?? null))) {
                // line 15
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["megabyte"] ?? null)), 2, ".") . " MB"), "html", null, true);
                echo "
        ";
            } elseif ((            // line 16
($context["bytes"] ?? null) < ($context["terabyte"] ?? null))) {
                // line 17
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["gigabyte"] ?? null)), 2, ".") . " GB"), "html", null, true);
                echo "
        ";
            } else {
                // line 19
                echo "            ";
                echo twig_escape_filter($this->env, (twig_number_format_filter($this->env, (($context["bytes"] ?? null) / ($context["terabyte"] ?? null)), 2, ".") . " TB"), "html", null, true);
                echo "
        ";
            }
            // line 21
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 24
    public function getpreview($__path__ = null, $__value__ = null, $__global__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "path" => $__path__,
            "value" => $__value__,
            "global" => $__global__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 25
            echo "    ";
            if (($context["value"] ?? null)) {
                // line 26
                echo "        ";
                $context["uri"] = $this->getAttribute($this->getAttribute(($context["global"] ?? null), "grav", []), "uri", []);
                // line 27
                echo "        ";
                $context["files"] = $this->getAttribute(($context["global"] ?? null), "files", []);
                // line 28
                echo "        ";
                $context["config"] = $this->getAttribute($this->getAttribute(($context["global"] ?? null), "grav", []), "config", []);
                // line 29
                echo "        ";
                $context["route"] = $this->getAttribute($this->getAttribute(($context["global"] ?? null), "context", []), "route", [], "method");
                // line 30
                echo "
        ";
                // line 31
                $context["type"] = (($this->getAttribute(($context["global"] ?? null), "blueprint_type", [])) ? ($this->getAttribute(($context["global"] ?? null), "blueprint_type", [])) : ((($this->getAttribute($this->getAttribute(($context["global"] ?? null), "admin", []), "location", [])) ? ($this->getAttribute($this->getAttribute(($context["global"] ?? null), "admin", []), "location", [])) : ("config"))));
                // line 32
                echo "
        ";
                // line 33
                $context["blueprint_name"] = $this->getAttribute($this->getAttribute(($context["global"] ?? null), "blueprints", []), "getFilename", []);
                // line 34
                echo "        ";
                $context["real_path"] = ($context["path"] ?? null);
                // line 35
                echo "
        ";
                // line 36
                if ((($context["type"] ?? null) == "pages")) {
                    // line 37
                    echo "            ";
                    $context["blueprint_name"] = ((($context["type"] ?? null) . "/") . ($context["blueprint_name"] ?? null));
                    // line 38
                    echo "            ";
                    $context["real_path"] = $this->env->getExtension('Grav\Common\Twig\TwigExtension')->ltrimFilter(((($this->getAttribute(($context["value"] ?? null), "thumb", [], "any", true, true) &&  !(null === $this->getAttribute(($context["value"] ?? null), "thumb", [])))) ? ($this->getAttribute(($context["value"] ?? null), "thumb", [])) : (((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["global"] ?? null), "context", [], "any", false, true), "media", [], "any", false, true), ($context["path"] ?? null), [], "array", false, true), "relativePath", [], "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["global"] ?? null), "context", [], "any", false, true), "media", [], "any", false, true), ($context["path"] ?? null), [], "array", false, true), "relativePath", [])))) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["global"] ?? null), "context", [], "any", false, true), "media", [], "any", false, true), ($context["path"] ?? null), [], "array", false, true), "relativePath", [])) : (((($this->getAttribute($this->getAttribute(($context["global"] ?? null), "form", [], "any", false, true), "getPagePathFromToken", [0 => ($context["path"] ?? null)], "method", true, true) &&  !(null === $this->getAttribute($this->getAttribute(($context["global"] ?? null), "form", [], "any", false, true), "getPagePathFromToken", [0 => ($context["path"] ?? null)], "method")))) ? ($this->getAttribute($this->getAttribute(($context["global"] ?? null), "form", [], "any", false, true), "getPagePathFromToken", [0 => ($context["path"] ?? null)], "method")) : ($this->getAttribute($this->getAttribute(($context["global"] ?? null), "admin", []), "getPagePathFromToken", [0 => ($context["path"] ?? null)], "method"))))))), "/");
                    // line 39
                    echo "        ";
                }
                // line 40
                echo "        ";
                $context["blueprint"] = base64_encode(($context["blueprint_name"] ?? null));
                // line 41
                echo "

        ";
                // line 43
                $context["remove"] = (($this->getAttribute(($context["global"] ?? null), "file_task_remove", [])) ? ($this->getAttribute(($context["global"] ?? null), "file_url_remove", [])) : ($this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => ((((((((((((((((((($this->getAttribute(                // line 44
($context["global"] ?? null), "file_url_remove", []) . "/media.json") . "/task") . $this->getAttribute($this->getAttribute(                // line 46
($context["config"] ?? null), "system", []), "param_sep", [])) . "removeFileFromBlueprint") . "/proute") . $this->getAttribute($this->getAttribute(                // line 47
($context["config"] ?? null), "system", []), "param_sep", [])) . base64_encode(($context["route"] ?? null))) . "/blueprint") . $this->getAttribute($this->getAttribute(                // line 48
($context["config"] ?? null), "system", []), "param_sep", [])) . ($context["blueprint"] ?? null)) . "/type") . $this->getAttribute($this->getAttribute(                // line 49
($context["config"] ?? null), "system", []), "param_sep", [])) . ($context["type"] ?? null)) . "/field") . $this->getAttribute($this->getAttribute(                // line 50
($context["config"] ?? null), "system", []), "param_sep", [])) . $this->getAttribute(($context["files"] ?? null), "name", [])) . "/path") . $this->getAttribute($this->getAttribute(                // line 51
($context["config"] ?? null), "system", []), "param_sep", [])) . base64_encode($this->getAttribute(($context["value"] ?? null), "path", []))), 1 => "admin-form", 2 => "admin-nonce"], "method")));
                // line 52
                echo "
        ";
                // line 53
                $context["file"] = twig_array_merge(($context["value"] ?? null), ["remove" => ($context["remove"] ?? null), "path" => ((($this->getAttribute(($context["value"] ?? null), "thumb_url", [], "any", true, true) &&  !(null === $this->getAttribute(($context["value"] ?? null), "thumb_url", [])))) ? ($this->getAttribute(($context["value"] ?? null), "thumb_url", [])) : (((($this->getAttribute(($context["uri"] ?? null), "rootUrl", []) == "/")) ? ("/") : ((($this->getAttribute(($context["uri"] ?? null), "rootUrl", []) . "/") . ($context["real_path"] ?? null))))))]);
                // line 54
                echo "        <div class=\"hidden\" data-file=\"";
                echo twig_escape_filter($this->env, twig_jsonencode_filter(($context["file"] ?? null)), "html_attr");
                echo "\"></div>
    ";
            }
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
        return "forms/fields/file/file.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  408 => 54,  406 => 53,  403 => 52,  401 => 51,  400 => 50,  399 => 49,  398 => 48,  397 => 47,  396 => 46,  395 => 44,  394 => 43,  390 => 41,  387 => 40,  384 => 39,  381 => 38,  378 => 37,  376 => 36,  373 => 35,  370 => 34,  368 => 33,  365 => 32,  363 => 31,  360 => 30,  357 => 29,  354 => 28,  351 => 27,  348 => 26,  345 => 25,  331 => 24,  315 => 21,  309 => 19,  303 => 17,  301 => 16,  296 => 15,  294 => 14,  289 => 13,  287 => 12,  282 => 11,  280 => 10,  277 => 9,  274 => 8,  271 => 7,  268 => 6,  265 => 5,  263 => 4,  251 => 3,  244 => 105,  239 => 104,  234 => 103,  229 => 102,  222 => 101,  218 => 100,  215 => 99,  212 => 98,  207 => 95,  202 => 68,  194 => 116,  189 => 113,  186 => 112,  177 => 110,  173 => 109,  169 => 107,  166 => 98,  163 => 96,  161 => 95,  157 => 93,  154 => 92,  147 => 91,  140 => 90,  135 => 88,  131 => 87,  127 => 86,  122 => 85,  120 => 84,  116 => 83,  112 => 82,  100 => 81,  97 => 80,  94 => 79,  91 => 78,  88 => 77,  85 => 76,  83 => 75,  80 => 74,  77 => 73,  74 => 72,  71 => 71,  68 => 70,  65 => 69,  63 => 68,  60 => 67,  57 => 66,  54 => 65,  51 => 64,  46 => 1,  44 => 62,  42 => 61,  40 => 60,  38 => 58,  32 => 1,);
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

{% macro bytesToSize(bytes) -%}
    {% spaceless %}
        {% set kilobyte = 1024 %}
        {% set megabyte = kilobyte * 1024 %}
        {% set gigabyte = megabyte * 1024 %}
        {% set terabyte = gigabyte * 1024 %}

        {% if bytes < kilobyte %}
            {{ bytes ~ ' B' }}
        {% elseif bytes < megabyte %}
            {{ (bytes / kilobyte)|number_format(2, '.') ~ ' KB' }}
        {% elseif bytes < gigabyte %}
            {{ (bytes / megabyte)|number_format(2, '.') ~ ' MB' }}
        {% elseif bytes < terabyte %}
            {{ (bytes / gigabyte)|number_format(2, '.') ~ ' GB' }}
        {% else %}
            {{ (bytes / terabyte)|number_format(2, '.') ~ ' TB' }}
        {% endif %}
    {% endspaceless %}
{%- endmacro %}

{% macro preview(path, value, global) %}
    {% if value %}
        {% set uri = global.grav.uri %}
        {% set files = global.files %}
        {% set config = global.grav.config %}
        {% set route = global.context.route() %}

        {% set type = global.blueprint_type ? global.blueprint_type : global.admin.location ? global.admin.location : 'config' %}

        {% set blueprint_name = global.blueprints.getFilename %}
        {% set real_path = path %}

        {% if type == 'pages' %}
            {% set blueprint_name = type ~ '/' ~ blueprint_name %}
            {% set real_path = (value.thumb ?? global.context.media[path].relativePath ?? global.form.getPagePathFromToken(path) ?? global.admin.getPagePathFromToken(path))|ltrim('/') %}
        {% endif %}
        {% set blueprint = base64_encode(blueprint_name) %}


        {% set remove = global.file_task_remove ? global.file_url_remove : uri.addNonce(
            global.file_url_remove ~
            '/media.json' ~
            '/task' ~ config.system.param_sep ~ 'removeFileFromBlueprint' ~
            '/proute' ~ config.system.param_sep ~ base64_encode(route) ~
            '/blueprint' ~ config.system.param_sep ~ blueprint ~
            '/type' ~ config.system.param_sep ~ type ~
            '/field' ~ config.system.param_sep ~ files.name ~
            '/path' ~ config.system.param_sep ~ base64_encode(value.path), 'admin-form', 'admin-nonce') %}

        {% set file = value|merge({remove: remove, path: value.thumb_url ?? (uri.rootUrl == '/' ? '/' : uri.rootUrl ~ '/' ~ real_path) }) %}
        <div class=\"hidden\" data-file=\"{{ file|json_encode|e('html_attr') }}\"></div>
    {% endif %}
{% endmacro %}

{% import _self as macro %}

{% set defaults = config.plugins.form %}
{% set files = defaults.files|merge(field|default([])) %}
{% set limit = not field.multiple ? 1 : files.limit %}

{% block input %}
    {% set page_can_upload = exists or (type == 'page' and not exists and not (field.destination starts with '@self' or field.destination starts with 'self@')) %}
    {% if form or (type is not defined or page_can_upload) %}

    {% block prepend %}{% endblock %}
    {% set settings = {name: field.name, paramName: (scope ~ field.name)|fieldName ~ (files.multiple ? '[]' : ''), limit: limit, filesize: form_max_filesize, accept: files.accept, resolution: files.resolution, resizeWidth: files.resizeWidth, resizeHeight: files.resizeHeight, resizeQuality: files.resizeQuality } %}
    {% set dropzoneSettings = field.dropzone %}
    {% if form.getMediaTaskRoute() %}
        {% set file_url_add = base_url_relative ~ form.getMediaTaskRoute({}, 'json') %}
        {% set file_task_add = {task: 'media.upload', name: field.name, '__form-name__': form.name, '__unique_form_id__': form.uniqueid} %}

        {% set file_url_remove = base_url_relative ~ form.getMediaTaskRoute({}, 'json') %}
        {% set file_task_remove = {task: 'media.delete', name: field.name, '__form-name__': form.name, '__unique_form_id__': form.uniqueid} %}
    {% else %}
        {% set file_url_remove = file_url_remove ?: base_url_relative %}
    {% endif %}

    <div class=\"{{ form_field_wrapper_classes ?: 'form-input-wrapper' }} {{ field.classes }} dropzone files-upload {% if field.fancy is not same as(false) %}form-input-file{% endif %} {{ field.size }}\"
         data-grav-file-settings=\"{{ settings|json_encode|e('html_attr') }}\"
         data-dropzone-options=\"{{ dropzoneSettings|json_encode|e('html_attr') }}\"
         {% if file_task_add and file_task_remove %}
             data-file-post-add=\"{{ file_task_add|json_encode|e('html_attr') }}\"
             data-file-post-remove=\"{{ file_task_remove|json_encode|e('html_attr') }}\"
             data-file-url-add=\"{{ file_url_add }}\"
             data-file-url-remove=\"{{ file_url_remove }}\"
         {% else %}
             {% if file_url_add %}data-file-url-add=\"{{ file_url_add }}\"{% endif %}
             {% if file_url_remove %}data-file-url-remove=\"{{ file_url_remove }}\"{% endif %}
         {% endif %}
    >

    {% block file_extras %}{% endblock %}
    <input
            {# required attribute structures #}
            {% block input_attributes %}
                type=\"file\"
                {% if files.multiple %}multiple=\"multiple\"{% endif %}
                {% if files.accept %}accept=\"{{ files.accept|join(',') }}\"{% endif %}
                {% if field.disabled or isDisabledToggleable %}disabled=\"disabled\"{% endif %}
                {% if field.random_name %}random=\"true\"{% endif %}
                {% if required %}required=\"required\"{% endif %}
                {{ parent() }}
            {% endblock %}
    />

    {% for path, file in value %}
        {{ macro.preview(path, file, _context) }}
    {% endfor %}
    {% include 'forms/fields/hidden/hidden.html.twig' with {field: {name: '_json.' ~ field.name}, value: (value ?? [])|json_encode} %}
    </div>

    {% else %}
        <span class=\"note\">{{ \"PLUGIN_ADMIN.CANNOT_ADD_FILES_PAGE_NOT_SAVED\"|tu|raw }}</span>
    {% endif %}
{% endblock %}
", "forms/fields/file/file.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/forms/fields/file/file.html.twig");
    }
}
