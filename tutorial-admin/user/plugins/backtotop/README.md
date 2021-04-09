# Back to Top Plugin

![GPM Installation](assets/readme_1.png)

`backtotop` is a [Grav](http://github.com/getgrav/grav) Plugin and allows to display a "Back to Top" link at the end of every section, so the reader can jump back up to the table of contents. The plugin integrates the js lib "Return to Top Arrow" by [rdallaire](https://codepen.io/rdallaire/pen/apoyx).

# Installation

Installing the Back to Top plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

## GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's Terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install backtotop

This will install the Back to Top plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/backtotop`.

## Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `backtotop`. You can find these files either on [GitHub](https://github.com/marcosegato/grav-plugin-backtotop) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/backtotop

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Problems](https://github.com/getgrav/grav-plugin-problems) plugin, and a theme to be installed in order to operate.

# Config Defaults

| Variable | Default | Options | Note |
|----------|---------|-------------------------------------------------|------------------------------------------------------------------------------|
| enabled | true | `true` or `false` | Enables or disables the plugin. |
| fontawesome_icons | true | `true` or `false` | Switch between FontAwesome icons or SVG images |
| fontawesome_css | true | `true` or `false` | Disable if your theme already has FontAwesome support, probably you don't want to duplicate CSS files. |

If you need to change any value, then the best process is to copy the [backtotop.yaml](backtotop.yaml) file into your `users/config/plugins/` folder (create it if it doesn't exist), and then modify there. This will override the default settings.

# Usage for theme developers

### Including the default backtotop template

If you are developing your own theme or customizing an existant one and want to enable this plugin, you need to include the backtotop template in an always displayed page. For instance in `footer.html.twig`:

```twig
{# /your/site/grav/user/themes/custom-theme/templates/modular/footer.html.twig #}

{# Render the backtotop link #}
{% if config.plugins.backtotop.enabled %}
    {% include 'partials/backtotop.html.twig' %}
{% endif %}
```

# Updating

As development for the Back to Top plugin continues, new versions may become available that add additional features and functionality, improve compatibility with newer Grav releases, and generally provide a better user experience. Updating Back to Top is easy, and can be done through Grav's GPM system, as well as manually.

## GPM Update (Preferred)

The simplest way to update this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm). You can do this with this by navigating to the root directory of your Grav install using your system's Terminal (also called command line) and typing the following:

    bin/gpm update backtotop

This command will check your Grav install to see if your Back to Top plugin is due for an update. If a newer release is found, you will be asked whether or not you wish to update. To continue, type `y` and hit enter. The plugin will automatically update and clear Grav's cache.

## Manual Update

Manually updating Back to Top is pretty simple. Here is what you will need to do to get this done:

* Delete the `your/site/user/plugins/backtotop` directory.
* Download the new version of the Back to Top plugin from either [GitHub](https://github.com/marcosegato/grav-plugin-backtotop) or [GetGrav.org](http://getgrav.org/downloads/plugins#extras).
* Unzip the zip file in `your/site/user/plugins` and rename the resulting folder to `backtotop`.
* Clear the Grav cache. The simplest way to do this is by going to the root Grav directory in terminal and typing `bin/grav clear-cache`.

> Note: Any changes you have made to any of the files listed under this directory will also be removed and replaced by the new set. Any files located elsewhere (for example a YAML settings file placed in `user/config/plugins`) will remain intact.
