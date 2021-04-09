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

/* partials/themes-list.html.twig */
class __TwigTemplate_39466ee1e93d58e115b51f7cbcafb8ed0c20e414b7d0d9e5313a5fd2f84e190d extends \Twig\Template
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
        echo "<div class=\"grav-update themes\"></div>
";
        // line 3
        if (($context["installing"] ?? null)) {
            // line 4
            echo "    ";
            $this->loadTemplate("partials/release-toggle.html.twig", "partials/themes-list.html.twig", 4)->display($context);
        }
        // line 6
        $this->loadTemplate("partials/list-sort.html.twig", "partials/themes-list.html.twig", 6)->display(twig_array_merge($context, ["list_view" => "themes"]));
        // line 7
        echo "<h1>
    ";
        // line 8
        echo twig_escape_filter($this->env, ((($context["installing"] ?? null)) ? ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.AVAILABLE_THEMES")) : ($this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.INSTALLED_THEMES"))), "html", null, true);
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

<div class=\"themes card-row grid fixed-blocks pure-g\">
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('Grav\Common\Twig\TwigExtension')->ksortFilter($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "themes", [0 =>  !($context["installing"] ?? null)], "method"), "toArray", [])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["slug"] => $context["theme"]) {
            // line 18
            echo "        ";
            $context["state"] = "inactive";
            // line 19
            echo "        ";
            if (($context["installing"] ?? null)) {
                $context["state"] = "installing";
            }
            // line 20
            echo "        ";
            if (($this->getAttribute(($context["config"] ?? null), "get", [0 => "system.pages.theme"], "method") == $context["slug"])) {
                $context["state"] = "active";
            }
            // line 21
            echo "        ";
            $context["isTestingRelease"] = $this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "isTestingRelease", [0 => $context["slug"]], "method");
            // line 22
            echo "        ";
            $context["releaseDate"] = (($this->getAttribute($context["theme"], "date", [])) ? ($this->getAttribute($context["theme"], "date", [])) : ($this->getAttribute($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "findPackage", [0 => $context["slug"], 1 => true], "method"), "date", [])));
            // line 23
            echo "
        <div class=\"theme card-item pure-u-1-3 ";
            // line 24
            echo twig_escape_filter($this->env, ($context["state"] ?? null), "html", null, true);
            echo "-theme\" data-gpm-theme=\"";
            echo twig_escape_filter($this->env, twig_urlencode_filter($context["slug"]), "html", null, true);
            echo "\" data-gpm-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", []), "html", null, true);
            echo "\" data-gpm-release-date=\"";
            echo twig_escape_filter($this->env, ($context["releaseDate"] ?? null), "html", null, true);
            echo "\" data-gpm-author=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "author", []), "name", []), "html", null, true);
            echo "\" data-gpm-official=\"";
            echo (($this->getAttribute(($context["admin"] ?? null), "isTeamGrav", [0 => $context["theme"]], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-updatable=\"";
            echo (($this->getAttribute($this->getAttribute(($context["admin"] ?? null), "gpm", []), "isUpdatable", [0 => $context["slug"]], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-enabled=\"";
            echo (($this->getAttribute(($context["data"] ?? null), "get", [0 => "enabled"], "method")) ? ("1") : ("2"));
            echo "\" data-gpm-testing=\"";
            echo ((($context["isTestingRelease"] ?? null)) ? ("1") : ("2"));
            echo "\">
            <div class=\"gpm-name\">
                <i class=\"fa fa-fw fa-";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "icon", []), "html", null, true);
            echo "\"></i>
                <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/themes/" . twig_urlencode_filter($context["slug"]))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "name", []), "html", null, true);
            echo "</a>
                ";
            // line 28
            if ($this->getAttribute(($context["admin"] ?? null), "isTeamGrav", [0 => $context["theme"]], "method")) {
                // line 29
                echo "                    <small><span class=\"info-reverse\"><i class=\"fa fa-check-circle\" title=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.GRAV_OFFICIAL_THEME"), "html", null, true);
                echo "\"></i></span></small>
                ";
            }
            // line 31
            echo "                ";
            if ($this->getAttribute(($context["admin"] ?? null), "isPremiumProduct", [0 => $context["theme"]], "method")) {
                // line 32
                echo "                    ";
                if ( !($context["gumroad_loaded"] ?? null)) {
                    // line 33
                    echo "                        ";
                    $context["gumroad_loaded"] = true;
                    // line 34
                    echo "                        <script src=\"//gumroad.com/js/gumroad.js\"></script>
                    ";
                }
                // line 36
                echo "                    <small><span class=\"badge warning premium\"><i class=\"fa fa-star-o\"></i> ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.PREMIUM_PRODUCT"), "html", null, true);
                echo "</span></small>
                ";
            }
            // line 38
            echo "                ";
            if ($this->getAttribute($context["theme"], "symlink", [])) {
                // line 39
                echo "                    <span class=\"hint--bottom\"  data-hint=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.THEME_SYMBOLICALLY_LINKED"), "html", null, true);
                echo "\">
                    <i class=\"fa fa-fw fa-link\"></i>
                </span>
                ";
            }
            // line 43
            echo "                <span class=\"gpm-version\">v";
            echo twig_escape_filter($this->env, $this->getAttribute($context["theme"], "version", []), "html", null, true);
            echo "</span>
                ";
            // line 44
            if (($context["isTestingRelease"] ?? null)) {
                echo "<span class=\"gpm-testing\">test release</span>";
            }
            // line 45
            echo "            </div>
            <div class=\"gpm-screenshot\">
                ";
            // line 47
            $context["thumb"] = ((($context["installing"] ?? null)) ? (("//getgrav.org/images/" . $this->getAttribute($context["theme"], "screenshot", []))) : ($this->getAttribute($context["theme"], "thumbnail", [])));
            // line 48
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(("/themes/" . twig_urlencode_filter($context["slug"]))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, ($context["thumb"] ?? null), "html", null, true);
            echo "\" /></a>
            </div>
            ";
            // line 50
            if ((($context["state"] ?? null) == "installing")) {
                // line 51
                echo "                <div class=\"gpm-actions\">
                    ";
                // line 52
                if (($this->getAttribute($context["theme"], "premium", []) &&  !$this->getAttribute(($context["admin"] ?? null), "license", [0 => $this->getAttribute($context["theme"], "slug", [])], "method"))) {
                    // line 53
                    echo "                        ";
                    if ( !($context["gumroad_loaded"] ?? null)) {
                        // line 54
                        echo "                            ";
                        $context["gumroad_loaded"] = true;
                        // line 55
                        echo "                            <script src=\"//gumroad.com/js/gumroad.js\"></script>
                        ";
                    }
                    // line 57
                    echo "                        <a class=\"gumroad-button button\" href=\"https://gum.co/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["theme"], "premium", []), "permalink", []), "html", null, true);
                    echo "\" target=\"_blank\" data-gumroad-single-product=\"true\"><i class=\"fa fa-shopping-cart\"></i> ";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["theme"], "premium", [], "any", false, true), "button", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["theme"], "premium", [], "any", false, true), "button", []), "Purchase")) : ("Purchase")), "html", null, true);
                    echo "</a>
                    ";
                } else {
                    // line 59
                    echo "                        <a class=\"button\" href=\"#\" data-remodal-target=\"add-package\" data-packages-slugs=\"";
                    echo twig_escape_filter($this->env, $context["slug"], "html", null, true);
                    echo "\" data-theme-action=\"start-package-installation\"><i class=\"fa fa-plus\"></i> ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.INSTALL"), "html", null, true);
                    echo "</a>
                    ";
                }
                // line 61
                echo "
                </div>
            ";
            } elseif ((            // line 63
($context["state"] ?? null) == "active")) {
                // line 64
                echo "                <div class=\"gpm-actions\">
                    <i class=\"fa fa-star\"></i> ";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ACTIVE_THEME"), "html", null, true);
                echo "
                </div>
            ";
            } else {
                // line 68
                echo "                <a data-remodal-target=\"theme-switch-warn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["uri"] ?? null), "addNonce", [0 => (((((($context["base_url_relative"] ?? null) . "/themes/") . $context["slug"]) . "/task") . $this->getAttribute($this->getAttribute(($context["config"] ?? null), "system", []), "param_sep", [])) . "activate"), 1 => "admin-form", 2 => "admin-nonce"], "method"), "html", null, true);
                echo "\" class=\"gpm-actions\">
                    ";
                // line 69
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ACTIVATE"), "html", null, true);
                echo "
                </a>
            ";
            }
            // line 72
            echo "        </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 74
            echo "        <tr><td>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.OFFLINE_WARNING"), "html", null, true);
            echo "</td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['slug'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "</div>

<div class=\"remodal theme-switcher\" data-remodal-id=\"theme-switch-warn\" data-remodal-options=\"hashTracking: false\">
    <form>
        <h1>";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SWITCHING_TO"), "html", null, true);
        echo " <strong>{theme_name}</strong></h1>
        <p class=\"bigger\">
            ";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SWITCHING_TO_DESCRIPTION"), "html", null, true);
        echo "
        </p>
        <p class=\"bigger\">
            ";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.SWITCHING_TO_CONFIRMATION"), "html", null, true);
        echo " <strong>{theme_name}</strong>?
        </p>
        <br>
        <div class=\"button-bar\">
            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CANCEL"), "html", null, true);
        echo "</button>
            <a class=\"button continue\" href=\"#\"><i class=\"fa fa-fw fa-check\"></i>";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.CONTINUE"), "html", null, true);
        echo "</a>
        </div>
    </form>
</div>

";
        // line 95
        $this->loadTemplate("partials/modal-add-package.html.twig", "partials/themes-list.html.twig", 95)->display(twig_array_merge($context, ["type" => "theme"]));
        // line 96
        $this->loadTemplate("partials/modal-update-packages.html.twig", "partials/themes-list.html.twig", 96)->display(twig_array_merge($context, ["type" => "theme"]));
    }

    public function getTemplateName()
    {
        return "partials/themes-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 96,  290 => 95,  282 => 90,  278 => 89,  271 => 85,  265 => 82,  260 => 80,  254 => 76,  245 => 74,  239 => 72,  233 => 69,  228 => 68,  222 => 65,  219 => 64,  217 => 63,  213 => 61,  205 => 59,  197 => 57,  193 => 55,  190 => 54,  187 => 53,  185 => 52,  182 => 51,  180 => 50,  172 => 48,  170 => 47,  166 => 45,  162 => 44,  157 => 43,  149 => 39,  146 => 38,  140 => 36,  136 => 34,  133 => 33,  130 => 32,  127 => 31,  121 => 29,  119 => 28,  113 => 27,  109 => 26,  88 => 24,  85 => 23,  82 => 22,  79 => 21,  74 => 20,  69 => 19,  66 => 18,  61 => 17,  53 => 12,  46 => 8,  43 => 7,  41 => 6,  37 => 4,  35 => 3,  32 => 2,  30 => 1,);
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
<div class=\"grav-update themes\"></div>
{% if installing %}
    {% include 'partials/release-toggle.html.twig' %}
{% endif %}
{% include 'partials/list-sort.html.twig' with { list_view: 'themes' } %}
<h1>
    {{ installing ? \"PLUGIN_ADMIN.AVAILABLE_THEMES\"|tu : \"PLUGIN_ADMIN.INSTALLED_THEMES\"|tu }}
</h1>
<form>
    <div class=\"gpm-search\">
        <input type=\"text\" placeholder=\"{{ \"PLUGIN_ADMIN.RESOURCE_FILTER\"|tu }}\" data-gpm-filter>
    </div>
</form>

<div class=\"themes card-row grid fixed-blocks pure-g\">
    {% for slug, theme in admin.themes(not installing).toArray|ksort %}
        {% set state = 'inactive' %}
        {% if (installing) %}{% set state = 'installing' %}{% endif %}
        {% if (config.get('system.pages.theme') == slug) %}{% set state = 'active' %}{% endif %}
        {% set isTestingRelease = admin.gpm.isTestingRelease(slug) %}
        {% set releaseDate = theme.date ?: admin.gpm.findPackage(slug, true).date %}

        <div class=\"theme card-item pure-u-1-3 {{ state }}-theme\" data-gpm-theme=\"{{ slug|url_encode }}\" data-gpm-name=\"{{ theme.name }}\" data-gpm-release-date=\"{{ releaseDate }}\" data-gpm-author=\"{{ theme.author.name }}\" data-gpm-official=\"{{ admin.isTeamGrav(theme) ? '1' : '2' }}\" data-gpm-updatable=\"{{ admin.gpm.isUpdatable(slug) ? '1' : '2' }}\" data-gpm-enabled=\"{{ data.get('enabled') ? '1' : '2' }}\" data-gpm-testing=\"{{ isTestingRelease ? '1' : '2' }}\">
            <div class=\"gpm-name\">
                <i class=\"fa fa-fw fa-{{ theme.icon }}\"></i>
                <a href=\"{{ admin_route('/themes/' ~ slug|url_encode) }}\">{{ theme.name }}</a>
                {% if admin.isTeamGrav(theme) %}
                    <small><span class=\"info-reverse\"><i class=\"fa fa-check-circle\" title=\"{{ \"PLUGIN_ADMIN.GRAV_OFFICIAL_THEME\"|tu }}\"></i></span></small>
                {% endif %}
                {% if admin.isPremiumProduct(theme) %}
                    {% if not gumroad_loaded %}
                        {% set gumroad_loaded = true %}
                        <script src=\"//gumroad.com/js/gumroad.js\"></script>
                    {% endif %}
                    <small><span class=\"badge warning premium\"><i class=\"fa fa-star-o\"></i> {{ \"PLUGIN_ADMIN.PREMIUM_PRODUCT\"|tu }}</span></small>
                {% endif %}
                {% if theme.symlink %}
                    <span class=\"hint--bottom\"  data-hint=\"{{ \"PLUGIN_ADMIN.THEME_SYMBOLICALLY_LINKED\"|tu }}\">
                    <i class=\"fa fa-fw fa-link\"></i>
                </span>
                {% endif %}
                <span class=\"gpm-version\">v{{ theme.version }}</span>
                {% if isTestingRelease %}<span class=\"gpm-testing\">test release</span>{% endif %}
            </div>
            <div class=\"gpm-screenshot\">
                {% set thumb = installing ? '//getgrav.org/images/' ~ theme.screenshot : theme.thumbnail %}
                <a href=\"{{ admin_route('/themes/' ~ slug|url_encode) }}\"><img src=\"{{ thumb }}\" /></a>
            </div>
            {% if (state == 'installing') %}
                <div class=\"gpm-actions\">
                    {% if (theme.premium and not admin.license(theme.slug)) %}
                        {% if not gumroad_loaded %}
                            {% set gumroad_loaded = true %}
                            <script src=\"//gumroad.com/js/gumroad.js\"></script>
                        {% endif %}
                        <a class=\"gumroad-button button\" href=\"https://gum.co/{{ theme.premium.permalink }}\" target=\"_blank\" data-gumroad-single-product=\"true\"><i class=\"fa fa-shopping-cart\"></i> {{ theme.premium.button|default('Purchase') }}</a>
                    {% else %}
                        <a class=\"button\" href=\"#\" data-remodal-target=\"add-package\" data-packages-slugs=\"{{ slug }}\" data-theme-action=\"start-package-installation\"><i class=\"fa fa-plus\"></i> {{ \"PLUGIN_ADMIN.INSTALL\"|tu }}</a>
                    {% endif %}

                </div>
            {% elseif state == 'active' %}
                <div class=\"gpm-actions\">
                    <i class=\"fa fa-star\"></i> {{ \"PLUGIN_ADMIN.ACTIVE_THEME\"|tu }}
                </div>
            {% else %}
                <a data-remodal-target=\"theme-switch-warn\" href=\"{{ uri.addNonce(base_url_relative ~ '/themes/' ~ slug ~ '/task' ~ config.system.param_sep ~ 'activate', 'admin-form', 'admin-nonce') }}\" class=\"gpm-actions\">
                    {{ \"PLUGIN_ADMIN.ACTIVATE\"|tu }}
                </a>
            {% endif %}
        </div>
    {% else %}
        <tr><td>{{ \"PLUGIN_ADMIN.OFFLINE_WARNING\"|tu }}</td></tr>
    {% endfor %}
</div>

<div class=\"remodal theme-switcher\" data-remodal-id=\"theme-switch-warn\" data-remodal-options=\"hashTracking: false\">
    <form>
        <h1>{{ \"PLUGIN_ADMIN.SWITCHING_TO\"|tu }} <strong>{theme_name}</strong></h1>
        <p class=\"bigger\">
            {{ \"PLUGIN_ADMIN.SWITCHING_TO_DESCRIPTION\"|tu }}
        </p>
        <p class=\"bigger\">
            {{ \"PLUGIN_ADMIN.SWITCHING_TO_CONFIRMATION\"|tu }} <strong>{theme_name}</strong>?
        </p>
        <br>
        <div class=\"button-bar\">
            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|tu }}</button>
            <a class=\"button continue\" href=\"#\"><i class=\"fa fa-fw fa-check\"></i>{{ \"PLUGIN_ADMIN.CONTINUE\"|tu }}</a>
        </div>
    </form>
</div>

{% include 'partials/modal-add-package.html.twig' with { type: 'theme' } %}
{% include 'partials/modal-update-packages.html.twig' with { type: 'theme' } %}
", "partials/themes-list.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/admin/themes/grav/templates/partials/themes-list.html.twig");
    }
}
