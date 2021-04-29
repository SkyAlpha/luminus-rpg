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

/* flex-objects/types/default/titlebar/edit.html.twig */
class __TwigTemplate_2721b20626041dabd194bd58a3ed71a8661b8ad13b038c880cc766f92eeae562 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'titlebar' => [$this, 'block_titlebar'],
            'titlebar_button_bar' => [$this, 'block_titlebar_button_bar'],
            'back_button' => [$this, 'block_back_button'],
            'preview_button' => [$this, 'block_preview_button'],
            'delete_button' => [$this, 'block_delete_button'],
            'extra_buttons' => [$this, 'block_extra_buttons'],
            'save_button' => [$this, 'block_save_button'],
            'titlebar_title' => [$this, 'block_titlebar_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->displayBlock('titlebar', $context, $blocks);
    }

    public function block_titlebar($context, array $blocks = [])
    {
        // line 2
        echo "    ";
        $this->displayBlock('titlebar_button_bar', $context, $blocks);
        // line 33
        echo "
    ";
        // line 34
        $this->displayBlock('titlebar_title', $context, $blocks);
        // line 45
        echo "
";
    }

    // line 2
    public function block_titlebar_button_bar($context, array $blocks = [])
    {
        // line 3
        echo "    <div class=\"button-bar\">
        ";
        // line 5
        echo "        ";
        $this->displayBlock('back_button', $context, $blocks);
        // line 8
        echo "
        ";
        // line 10
        echo "        ";
        if (($context["can_preview"] ?? null)) {
            // line 11
            echo "        ";
            $this->displayBlock('preview_button', $context, $blocks);
            // line 14
            echo "        ";
        }
        // line 15
        echo "
        ";
        // line 17
        echo "        ";
        if (($context["can_delete"] ?? null)) {
            // line 18
            echo "          ";
            $this->displayBlock('delete_button', $context, $blocks);
            // line 21
            echo "        ";
        }
        // line 22
        echo "
        ";
        // line 23
        $this->displayBlock('extra_buttons', $context, $blocks);
        // line 24
        echo "
        ";
        // line 26
        echo "        ";
        if ((($context["allowed"] ?? null) && ($context["can_save"] ?? null))) {
            // line 27
            echo "        ";
            $this->displayBlock('save_button', $context, $blocks);
            // line 30
            echo "        ";
        }
        // line 31
        echo "    </div>
    ";
    }

    // line 5
    public function block_back_button($context, array $blocks = [])
    {
        // line 6
        echo "            ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/back.html.twig"), 1 => "flex-objects/types/default/buttons/back.html.twig"], "flex-objects/types/default/titlebar/edit.html.twig", 6)->display($context);
        // line 7
        echo "        ";
    }

    // line 11
    public function block_preview_button($context, array $blocks = [])
    {
        // line 12
        echo "            ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/preview.html.twig"), 1 => "flex-objects/types/default/buttons/preview.html.twig"], "flex-objects/types/default/titlebar/edit.html.twig", 12)->display($context);
        // line 13
        echo "        ";
    }

    // line 18
    public function block_delete_button($context, array $blocks = [])
    {
        // line 19
        echo "            ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/delete.html.twig"), 1 => "flex-objects/types/default/buttons/delete.html.twig"], "flex-objects/types/default/titlebar/edit.html.twig", 19)->display($context);
        // line 20
        echo "          ";
    }

    // line 23
    public function block_extra_buttons($context, array $blocks = [])
    {
    }

    // line 27
    public function block_save_button($context, array $blocks = [])
    {
        // line 28
        echo "            ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/save.html.twig"), 1 => "flex-objects/types/default/buttons/save.html.twig"], "flex-objects/types/default/titlebar/edit.html.twig", 28)->display(twig_array_merge($context, ["task" => "save"]));
        // line 29
        echo "        ";
    }

    // line 34
    public function block_titlebar_title($context, array $blocks = [])
    {
        // line 35
        echo "    <h1>
        ";
        // line 36
        if (($context["allowed"] ?? null)) {
            // line 37
            echo "            <i class=\"fa fa-fw ";
            echo twig_escape_filter($this->env, ($context["title_icon"] ?? null), "html", null, true);
            echo "\"></i>
            ";
            // line 38
            echo (( !$this->getAttribute(($context["object"] ?? null), "exists", [])) ? ("[NEW]") : (""));
            echo " ";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "
        ";
        } else {
            // line 40
            echo "            <i class=\"fa fa-fw fa-exclamation-triangle\"></i>
            Error
        ";
        }
        // line 43
        echo "    </h1>
    ";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/titlebar/edit.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  182 => 43,  177 => 40,  170 => 38,  165 => 37,  163 => 36,  160 => 35,  157 => 34,  153 => 29,  150 => 28,  147 => 27,  142 => 23,  138 => 20,  135 => 19,  132 => 18,  128 => 13,  125 => 12,  122 => 11,  118 => 7,  115 => 6,  112 => 5,  107 => 31,  104 => 30,  101 => 27,  98 => 26,  95 => 24,  93 => 23,  90 => 22,  87 => 21,  84 => 18,  81 => 17,  78 => 15,  75 => 14,  72 => 11,  69 => 10,  66 => 8,  63 => 5,  60 => 3,  57 => 2,  52 => 45,  50 => 34,  47 => 33,  44 => 2,  38 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% block titlebar %}
    {% block titlebar_button_bar %}
    <div class=\"button-bar\">
        {# BACK #}
        {% block back_button %}
            {% include ['flex-objects/types/' ~ target ~ '/buttons/back.html.twig', 'flex-objects/types/default/buttons/back.html.twig'] %}
        {% endblock back_button %}

        {# PREVIEW #}
        {% if can_preview %}
        {% block preview_button %}
            {% include ['flex-objects/types/' ~ target ~ '/buttons/preview.html.twig', 'flex-objects/types/default/buttons/preview.html.twig'] %}
        {% endblock preview_button %}
        {% endif %}

        {# DELETE #}
        {% if can_delete %}
          {% block delete_button %}
            {% include ['flex-objects/types/' ~ target ~ '/buttons/delete.html.twig', 'flex-objects/types/default/buttons/delete.html.twig'] %}
          {% endblock delete_button %}
        {% endif %}

        {% block extra_buttons %}{% endblock extra_buttons %}

        {# SAVE #}
        {% if allowed and can_save %}
        {% block save_button %}
            {% include ['flex-objects/types/' ~ target ~ '/buttons/save.html.twig', 'flex-objects/types/default/buttons/save.html.twig'] with {task: 'save'} %}
        {% endblock save_button %}
        {% endif %}
    </div>
    {% endblock titlebar_button_bar %}

    {% block titlebar_title %}
    <h1>
        {% if allowed %}
            <i class=\"fa fa-fw {{ title_icon }}\"></i>
            {{ not object.exists ? '[NEW]' }} {{ title }}
        {% else %}
            <i class=\"fa fa-fw fa-exclamation-triangle\"></i>
            Error
        {% endif %}
    </h1>
    {% endblock titlebar_title %}

{% endblock %}
", "flex-objects/types/default/titlebar/edit.html.twig", "/Users/jonatan/Downloads/grav-admin/user/plugins/flex-objects/admin/templates/flex-objects/types/default/titlebar/edit.html.twig");
    }
}
