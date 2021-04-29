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

/* partials/plugins-list.html.twig */
class __TwigTemplate_2ef9d4925b3f0051d7740055c24b16246b6b3a5556207cd2ce749354db754f57 extends \Twig\Template
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
        $context["gumroad_loaded"] = false;
        // line 2
        echo "<div class=\"grav-update plugins\"></div>
";
        // line 3
        if (($context["installing"] ?? null)) {
            // line 4
            echo "    ";
            $this->loadTemplate("partials/release-toggle.html.twig", "partials/plugins-list.html.twig", 4)->display($context);
        }
        // line 6
        $this->loadTemplate("partials/list-sort.html.twig", "partials/plugins-list.html.twig", 6)->display(twig_array_merge($context, ["list_view" => "plugins"]));
        // line 7
        echo "<h1>
    ";
        // line 8
        echo twig_escape_filter($this->env, ((($context["installing"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.AVAILABLE_PLUGINS")) : ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.INSTALLED_PLUGINS"))), "html", null, true);
        echo "
</h1>
<form>
    <div class=\"gpm-search\">
        <input type=\"text\" placeholder=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.RESOURCE_FILTER"), "html", null, true);
        echo "\" data-gpm-filter>
    </div>
</form>

<table>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('Grav\Common\Twig\TwigExtension')->ksortFilter($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "plugins", [0 =>  !($context["installing"] ?? null)], "method"), "toArray", [])));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["slug"] => $context["plugin"]) {
            // line 18
            echo "        ";
            $context["data"] = $this->getAttribute(($context["admin"] ?? null), "data", [0 => ("plugins/" . $context["slug"])], "method");
            // line 19
            echo "        ";
            $context["isTestingRelease"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "isTestingRelease", [0 => $context["slug"]], "method");
            // line 20
            echo "        ";
            $context["releaseDate"] = (($this->getAttribute($context["plugin"], "date", [])) ? ($this->getAttribute($context["plugin"], "date", [])) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "findPackage", [0 => $context["slug"], 1 => true], "method"), "date", [])));
            // line 21
            echo "
        <tr data-gpm-plugin=\"";
            // line 22
            echo twig_escape_filter($this->env, twig_urlencode_filter($context["slug"]), "html", null, true);
            echo "\" data-gpm-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "name", []), "html", null, true);
            echo "\" data-gpm-release-date=\"";
            echo twig_escape_filter($this->env, ($context["releaseDate"] ?? null), "html", null, true);
            echo "\" data-gpm-author=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["plugin"], "author", []), "name", []), "html", null, true);
            echo "\" data-gpm-official=\"";
            echo (($this->getAttribute(($context["admin"] ?? null), "isTeamGrav", [0 => $context["plugin"]], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-updatable=\"";
            echo (($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "isUpdatable", [0 => $context["slug"]], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-enabled=\"";
            echo (($this->getAttribute(($context["data"] ?? null), "get", [0 => "enabled"], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-testing=\"";
            echo ((($context["isTestingRelease"] ?? null)) ? ("1") : ("2"));
            echo "\">
            <td class=\"gpm-name quadruple\">
                <i class=\"fa fa-fw fa-";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "icon", []), "html", null, true);
            echo "\"></i>
                <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/plugins/" . twig_urlencode_filter($context["slug"]))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "name", []), "html", null, true);
            echo "</a>
                ";
            // line 26
            if ($this->getAttribute(($context["admin"] ?? null), "isTeamGrav", [0 => $context["plugin"]], "method")) {
                // line 27
                echo "                    <small><span class=\"info-reverse\"><i class=\"fa fa-check-circle\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.GRAV_OFFICIAL_PLUGIN"), "html", null, true);
                echo "\"></i></span></small>
                ";
            }
            // line 29
            echo "                ";
            if ($this->getAttribute(($context["admin"] ?? null), "isPremiumProduct", [0 => $context["plugin"]], "method")) {
                // line 30
                echo "                    ";
                if ( !($context["gumroad_loaded"] ?? null)) {
                    // line 31
                    echo "                        ";
                    $context["gumroad_loaded"] = true;
                    // line 32
                    echo "                        <script src=\"//gumroad.com/js/gumroad.js\"></script>
                    ";
                }
                // line 34
                echo "                    <small><span class=\"badge warning premium\"><i class=\"fa fa-star-o\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PREMIUM_PRODUCT"), "html", null, true);
                echo "</span></small>
                ";
            }
            // line 36
            echo "                ";
            if ($this->getAttribute($context["plugin"], "symlink", [])) {
                // line 37
                echo "                <span class=\"hint--bottom\"  data-hint=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PLUGIN_SYMBOLICALLY_LINKED"), "html", null, true);
                echo "\">
                    <i class=\"fa fa-fw fa-link\"></i>
                </span>
                ";
            }
            // line 41
            echo "                <span class=\"gpm-version\">v";
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "version", []), "html", null, true);
            echo "</span>
                ";
            // line 42
            if (($context["isTestingRelease"] ?? null)) {
                echo "<span class=\"gpm-testing\">test release</span>";
            }
            // line 43
            echo "            </td>
            <td class=\"gpm-actions\">
                ";
            // line 45
            if (( !($context["installing"] ?? null) && (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["plugin"], "form", []), "fields", []), "enabled", []), "type", []) != "hidden") && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["plugin"], "form", []), "fields", []), "tabs", []), "fields", []), "options", []), "fields", []), "enabled", []), "type", []) != "hidden")))) {
                // line 46
                echo "                    <a class=\"";
                echo (($this->getAttribute(($context["data"] ?? null), "get", [0 => "enabled"], "method")) ? ("enabled") : ("disabled"));
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((((($context["base_url_relative"] ?? null) . "/plugins/") . $context["slug"]) . "/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . (($this->getAttribute(($context["data"] ?? null), "get", [0 => "enabled"], "method")) ? ("disable") : ("enable"))), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
                echo "\">
                        <i class=\"fa fa-fw fa-toggle-";
                // line 47
                echo (($this->getAttribute(($context["data"] ?? null), "get", [0 => "enabled"], "method")) ? ("on") : ("off"));
                echo "\"></i>
                    </a>
                ";
            } elseif (            // line 49
($context["installing"] ?? null)) {
                // line 50
                echo "                    ";
                if (($this->getAttribute($context["plugin"], "premium", []) &&  !$this->getAttribute(($context["admin"] ?? null), "license", [0 => $this->getAttribute($context["plugin"], "slug", [])], "method"))) {
                    // line 51
                    echo "                        ";
                    if ( !($context["gumroad_loaded"] ?? null)) {
                        // line 52
                        echo "                            ";
                        $context["gumroad_loaded"] = true;
                        // line 53
                        echo "                            <script src=\"//gumroad.com/js/gumroad.js\"></script>
                        ";
                    }
                    // line 55
                    echo "                        <a class=\"gumroad-button button\" href=\"https://gum.co/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["plugin"], "premium", []), "permalink", []), "html", null, true);
                    echo "\" target=\"_blank\" data-gumroad-single-product=\"true\"><i class=\"fa fa-shopping-cart\"></i> ";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["plugin"], "premium", [], "any", false, true), "button", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["plugin"], "premium", [], "any", false, true), "button", []), "Purchase")) : ("Purchase")), "html", null, true);
                    echo "</a>
                    ";
                } else {
                    // line 57
                    echo "                <a class=\"button\" href=\"#\" data-remodal-target=\"add-package\" data-packages-slugs=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "slug", []), "html", null, true);
                    echo "\" data-plugin-action=\"start-package-installation\"><i class=\"fa fa-plus\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.INSTALL"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 59
                echo "                ";
            }
            // line 60
            echo "                <span class=\"gpm-details-expand\"><i class=\"fa fa-chevron-down\"></i></span>
            </td>
            <td class=\"gpm-details\">
                <div class=\"table-wrapper\">
                    ";
            // line 64
            $this->loadTemplate("partials/plugin-data.html.twig", "partials/plugins-list.html.twig", 64)->display(twig_array_merge($context, ["plugin" => $context["plugin"]]));
            // line 65
            echo "                </div>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 69
            echo "        <tr><td>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.OFFLINE_WARNING"), "html", null, true);
            echo "</td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['slug'], $context['plugin'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "</table>

";
        // line 73
        $this->loadTemplate("partials/modal-add-package.html.twig", "partials/plugins-list.html.twig", 73)->display(twig_array_merge($context, ["type" => "plugin"]));
        // line 74
        $this->loadTemplate("partials/modal-update-packages.html.twig", "partials/plugins-list.html.twig", 74)->display(twig_array_merge($context, ["type" => "plugin"]));
        // line 75
        $this->loadTemplate("partials/modal-changelog.html.twig", "partials/plugins-list.html.twig", 75)->display(twig_array_merge($context, ["package" => ($context["plugin"] ?? null)]));
    }

    public function getTemplateName()
    {
        return "partials/plugins-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 75,  258 => 74,  256 => 73,  252 => 71,  243 => 69,  227 => 65,  225 => 64,  219 => 60,  216 => 59,  208 => 57,  200 => 55,  196 => 53,  193 => 52,  190 => 51,  187 => 50,  185 => 49,  180 => 47,  173 => 46,  171 => 45,  167 => 43,  163 => 42,  158 => 41,  150 => 37,  147 => 36,  141 => 34,  137 => 32,  134 => 31,  131 => 30,  128 => 29,  122 => 27,  120 => 26,  114 => 25,  110 => 24,  91 => 22,  88 => 21,  85 => 20,  82 => 19,  79 => 18,  61 => 17,  53 => 12,  46 => 8,  43 => 7,  41 => 6,  37 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set gumroad_loaded = false %}
<div class=\"grav-update plugins\"></div>
{% if installing %}
    {% include 'partials/release-toggle.html.twig' %}
{% endif %}
{% include 'partials/list-sort.html.twig' with { list_view: 'plugins' } %}
<h1>
    {{ installing ? \"PLUGIN_ADMIN.AVAILABLE_PLUGINS\"|tu : \"PLUGIN_ADMIN.INSTALLED_PLUGINS\"|tu }}
</h1>
<form>
    <div class=\"gpm-search\">
        <input type=\"text\" placeholder=\"{{ \"PLUGIN_ADMIN.RESOURCE_FILTER\"|tu }}\" data-gpm-filter>
    </div>
</form>

<table>
    {% for slug, plugin in admin.plugins(not installing).toArray|ksort %}
        {% set data = admin.data('plugins/' ~ slug) %}
        {% set isTestingRelease = admin.gpm.isTestingRelease(slug) %}
        {% set releaseDate = plugin.date ?: admin.gpm.findPackage(slug, true).date %}

        <tr data-gpm-plugin=\"{{ slug|url_encode }}\" data-gpm-name=\"{{ plugin.name }}\" data-gpm-release-date=\"{{ releaseDate }}\" data-gpm-author=\"{{ plugin.author.name }}\" data-gpm-official=\"{{ admin.isTeamGrav(plugin) ? '1' : '2' }}\" data-gpm-updatable=\"{{ admin.gpm.isUpdatable(slug) ? '1' : '2' }}\" data-gpm-enabled=\"{{ data.get('enabled') ? '1' : '2' }}\" data-gpm-testing=\"{{ isTestingRelease ? '1' : '2' }}\">
            <td class=\"gpm-name quadruple\">
                <i class=\"fa fa-fw fa-{{ plugin.icon }}\"></i>
                <a href=\"{{ admin_route('/plugins/' ~ slug|url_encode) }}\">{{ plugin.name }}</a>
                {% if admin.isTeamGrav(plugin) %}
                    <small><span class=\"info-reverse\"><i class=\"fa fa-check-circle\" title=\"{{ \"PLUGIN_ADMIN.GRAV_OFFICIAL_PLUGIN\"|tu }}\"></i></span></small>
                {% endif %}
                {% if admin.isPremiumProduct(plugin) %}
                    {% if not gumroad_loaded %}
                        {% set gumroad_loaded = true %}
                        <script src=\"//gumroad.com/js/gumroad.js\"></script>
                    {% endif %}
                    <small><span class=\"badge warning premium\"><i class=\"fa fa-star-o\"></i> {{ \"PLUGIN_ADMIN.PREMIUM_PRODUCT\"|tu }}</span></small>
                {% endif %}
                {% if plugin.symlink %}
                <span class=\"hint--bottom\"  data-hint=\"{{ \"PLUGIN_ADMIN.PLUGIN_SYMBOLICALLY_LINKED\"|tu }}\">
                    <i class=\"fa fa-fw fa-link\"></i>
                </span>
                {% endif %}
                <span class=\"gpm-version\">v{{ plugin.version }}</span>
                {% if isTestingRelease %}<span class=\"gpm-testing\">test release</span>{% endif %}
            </td>
            <td class=\"gpm-actions\">
                {% if (not installing and (plugin.form.fields.enabled.type != 'hidden' and plugin.form.fields.tabs.fields.options.fields.enabled.type != 'hidden')) %}
                    <a class=\"{{ data.get('enabled') ? 'enabled' : 'disabled' }}\" href=\"{{ uri.addNonce(base_url_relative ~ '/plugins/' ~ slug ~ '/task' ~ config.system.param_sep ~ (data.get('enabled') ? 'disable' : 'enable'), 'admin-form', 'admin-nonce') }}\">
                        <i class=\"fa fa-fw fa-toggle-{{ data.get('enabled') ? 'on' : 'off' }}\"></i>
                    </a>
                {% elseif (installing) %}
                    {% if (plugin.premium and not admin.license(plugin.slug)) %}
                        {% if not gumroad_loaded %}
                            {% set gumroad_loaded = true %}
                            <script src=\"//gumroad.com/js/gumroad.js\"></script>
                        {% endif %}
                        <a class=\"gumroad-button button\" href=\"https://gum.co/{{ plugin.premium.permalink }}\" target=\"_blank\" data-gumroad-single-product=\"true\"><i class=\"fa fa-shopping-cart\"></i> {{ plugin.premium.button|default('Purchase') }}</a>
                    {% else %}
                <a class=\"button\" href=\"#\" data-remodal-target=\"add-package\" data-packages-slugs=\"{{ plugin.slug }}\" data-plugin-action=\"start-package-installation\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.INSTALL\"|tu }}</a>
                    {% endif %}
                {% endif %}
                <span class=\"gpm-details-expand\"><i class=\"fa fa-chevron-down\"></i></span>
            </td>
            <td class=\"gpm-details\">
                <div class=\"table-wrapper\">
                    {% include 'partials/plugin-data.html.twig' with { plugin: plugin } %}
                </div>
            </td>
        </tr>
    {% else %}
        <tr><td>{{ \"PLUGIN_ADMIN.OFFLINE_WARNING\"|tu }}</td></tr>
    {% endfor %}
</table>

{% include 'partials/modal-add-package.html.twig' with { type: 'plugin' } %}
{% include 'partials/modal-update-packages.html.twig' with { type: 'plugin' } %}
{% include 'partials/modal-changelog.html.twig' with { package: plugin} %}
", "partials/plugins-list.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/plugins-list.html.twig");
    }
}
