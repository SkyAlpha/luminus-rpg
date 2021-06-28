# Luminus RPG PhaserJS Project Template

[DEMO](https://skyalpha.github.io/luminus-rpg.github.io/)

This is a Work in progress project, meant to be a code base for your 2D Action RPG game. It's based on the world class [Phaser Framework](https://phaser.io/), you should be able to use anything that the Phaser Framework provides in this project. Though it's not mandatory, it would be nice of you if you credit me for supplying this code base (I have put a lot of work on it).

## Tutorials
There are a couple of tutorials on how to use features of this template, they are not all covered yet, but you can already do all the basics. Just run 
`npm run tutorial`.

## Requirements

[Node.js](https://nodejs.org) is required to install dependencies and run scripts via `npm`.

## Available Commands

| Command | Description |
|---------|-------------|
| `npm install` | Install project dependencies |
| `npm start` | Build project and open web server running project |
| `npm run build` | Builds code bundle with production settings (minification, uglification, etc..) |
| `npm run jsdoc` | Generates the JSDoc for the Project. After generating the JSDoc, it will open up the JSDoc in your web browser. |
| `npm run tutorial` | Opens the Tutorial Page, teaching all the basics of the Template.|
| `npm run publish-git --message="my awesome message"` | IF you have the access rights, Publishes the game to the official git-pages repository.|

## Using specific Plugins

The Luminus RPG template has a lot of plugins that are the core of it's mechanics. You might just want one of the plugins to use in your game. Just try to copy and paste a plugin and it's dependencies in your already created game. I haven't tested it yet, I will try it ASAP.

## Writing Code

After cloning the repo, run `npm install` from your project directory. Then, you can start the local development
server by running `npm start`.


After starting the development server with `npm start`, you can edit any files in the `src` folder
and webpack will automatically recompile and reload your server (available at `http://localhost:8080`
by default).

## How to Contribute to this project.
Just get a new [Issue](https://github.com/SkyAlpha/luminus-rpg/issues) and follow the coding steps.

### Coding Step 1 - Coding issues
The template is based (Kind of) of the [ECS System](https://pt.wikipedia.org/wiki/Entity-component-system), the whole idea behind it, is that you can add or remove Components and the game should still be working without errors. They are under the `src/plugins` folder. If you are going to code something from an open issue, make sure to follow this system.

### Coding Step 2 - Code Review / Pull Requests

For now, I'm the only contributor to this project, so add me as the reviewer of your code. I hope more people will be helping with this in no time.

### Coding Step 3 - Git flow
This project uses the [Git-Flow](https://danielkummer.github.io/git-flow-cheatsheet/) branching management pattern. Make sure to follow it as you start to get new issues to resolve.

| Type of Issue | Branch Name | Origin Branch | Pull Request Target Branch | Commit Message|
|---------|---------|-------------|-------------|-------------|
| Feature | `feature-{issue-number}` | develop | `release-{number}`| feature-{issue-number} - My cool message |
| Bugfix | `bugfix-{issue-number}` | `release-{issue-number}` | `release-{number}` and develop | bugfix-{issue-number} - My cool message |
| Hotfix | `hotfix-{issue-number}` | master | master, `release-{number}` and develop | hotfix-{issue-number} - My cool message |

### Based on Phaser 3 Template
Luminus RPG Template uses the [Phaser 3 Template](https://github.com/photonstorm/phaser3-project-template) and has ES6 support via [Babel 7](https://babeljs.io/) and [Webpack 4](https://webpack.js.org/) that includes hot-reloading for development and production-ready builds.

You can load images via JavaScript module `import`.

### Babel
You can write modern ES6+ JavaScript and Babel will transpile it to a version of JavaScript that you
want your project to support. The targeted browsers are set in the `.babelrc` file and the default currently
targets all browsers with total usage over "0.25%" but excludes IE11 and Opera Mini.

  ```
  "browsers": [
    ">0.25%",
    "not ie 11",
    "not op_mini all"
  ]
  ```

### Webpack
If you want to customize your build, such as adding a new webpack loader or plugin (i.e. for loading CSS or fonts), you can
modify the `webpack/base.js` file for cross-project changes, or you can modify and/or create
new configuration files and target them in specific npm tasks inside of `package.json'.

## Deploying Code
After you run the `npm run build` command, your code will be built into a single bundle located at 
`dist/bundle.min.js` along with any other assets you project depended. 

If you put the contents of the `dist` folder in a publicly-accessible location (say something like `http://mycoolserver.com`), 
you should be able to open `http://mycoolserver.com/index.html` and play your game.

# MIT License

Copyright 2021 ® Luminus Game Studio

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


## CREDITS for Assets

 ### Visuals
 - [Portraits and Some Weird Stuff - ME \o/](https://www.instagram.com/javascriptgames/)
 - [Zelda Like Tiles.](https://opengameart.org/content/zelda-like-tilesets-and-sprites)
 - [Monsters - Browser Quest](https://github.com/mozilla/BrowserQuest)
 ### Music
 - Colossal Boss Fight.
 - Tropic Strike.
 - Wasteland Show down .
  Credits to https://matthewpablo.com/services/

- [Forest](https://opengameart.org/content/forest) Music by syncopika
