[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


<p align="center">

  <h3 align="center">WP Fizz Builder</h3>

  <p align="center">
    A Page Builder for WordPress Developers, based on Timber & ACF PRO
    <br />
    <a href="https://github.com/jeremy6680/wp-fizz-builder"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/jeremy6680/wp-fizz-builder">View Demo</a>
    ·
    <a href="https://github.com/jeremy6680/wp-fizz-builder/issues">Report Bug</a>
    ·
    <a href="https://github.com/jeremy6680/wp-fizz-builder/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

**WP Fizz Builder** is a simple **components-based Page Builder for WordPress**. Although it comprises some pre-made components thant can be used on any project, this plugin is mostly aimed at theme/frontend developers, to help us build custom WordPress pages more rapidly and more efficiently.


### Built With

* [Timber](https://github.com/timber/timber): a magnificient plugin that notably allows us to write our HTML using the Twig Template engine, separate from your PHP files.
* [ACF PRO](https://www.advancedcustomfields.com/pro/): in this plugin we make use of the great Flexible Content feature from ACF PRO.
* [Extended ACF](https://github.com/wordplate/extended-acf): a beautiful library that allows us to register ACF groups and fields with object oriented PHP.
* [Bulma](https://bulma.io/): a modern CSS framework that provides ready-to-use frontend components

### What Does This Plugin Do?

This plugin creates a **"Page Builder Template"** (cf [Page Templates in WordPress' Theme Handbook](https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use)). Choosing this template from [Page Attributes](https://make.wordpress.org/support/user-manual/content/pages/page-attributes/) has two effects:

1. it **removes the default editor** (whether it's Gutenberg or the Classic editor);
2. instead, it brings a **Page Builder**, whose different components can be created using a combination of **ACF** (for the logic) and **Timber** (for the templating part). For more information about this, please refer to the documentation below.

I said this Page Builder is aimed at developers: this is due to the fact this plugin requires custom fields to be declared using oriented object PHP. Among other advantages, using this method avoids useless calls to the database, and prevents errors when maintaining the website. 


<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

You need to have **ACP PRO** *(premium plugin — the license is not included)* and **Timber** *(free plugin)* installed on your website.<br>
If the two plugins are not installed on your site, no worries, you will be prompted from your back office to install and activate them.<br>
**NB.** You're not obliged to use Timber on your whole website. You can just use the templating part for the Page Builder. 

### Installation

1. **Clone the repo**<br>
When using the command line: first, go to your plugins folder:<br>
   ```$
   cd <myproject>/wp-content/plugins
   ```<br>
Then, run:<br>
   ```$
   git clone https://github.com/jeremy6680/wp-fizz-builder.git
   ```
   
   Alternatively, you can [download the zip](https://github.com/jeremy6680/wp-fizz-builder/archive/refs/heads/main.zip) and upload it to your WordPress website like any other plugin.
   
2. **Install backend dependencies**<br>
When using the command line: first, go to the WP Fizz Builder folder:<br>
   ```$
   cd wp-fizz-builder
   ```<br>
Then, run:<br>
   ```$
   composer install
   ```<br>
This will install the **Extended ACF library**.<br>
If you haven't installed and activated **ACF PRO** and **Timber**, you can do that now, from your WordPress dashboard.<br> 
NB. I didn't include Timber in the composer.json file, but if you prefer, you can install it from the command line:<br>
   ```$
   composer require timber/timber
   ```
   
3. **Install frontend dependencies**<br>
Okay, now let's install the frontend tools we need:

   ```$
   npm install
   ```
   This will notably allow you to use Sass, jQuery, Bulma & BrowserSync when building components for the Page Builder.<br>
If you look at the `/assets` folder, you'll notice a `/src` folder in which you can write your sass and javascript. <br>
The `/dist` folder is missing. Let's create it now:<br>
   ```$
   npm run dev
   ``` <br>
In order to use BrowserSync, you'll need to run the following command:<br>
   ```$
   npm run watch
   ``` <br>
Finally, to compile your files for production, you'll need to run this:<br>
  ```$
   npm run prod
   ``` <br>
In the docs I'll go into more details about how to create/customize components. 

<!-- USAGE EXAMPLES -->
## Usage

The plugin comes pre-packaged with a handful of components ('Hero', '
Title', 'How it works', 'Features', 'Cards').<br>
You're welcome to use them as they are, and you're more than welcome to customize them and create new ones! (that's actually the goal of this plugin: simplify the creation of a component and make it fun, like building a Lego!). 

You'll find the components in a `/components` folder, at the root of the plugin. <br>
Each component includes four files:<br>

* `fields.php`   
* `index.twig`  
* `script.js` 
* `style.scss`

As you can see, each component is an entity in itself; it has its own styles, scripts, logic and layout. <br>

The ACF fields can be written in PHP following Extended ACF's guidelines.<br>
Here's an example of the code I needed to create the fields for the 'Hero' component:<br>


```php
    <?php

  use WordPlate\Acf\Fields\Group;
  use WordPlate\Acf\Fields\Text;
  use WordPlate\Acf\Fields\Link;
  use WordPlate\Acf\Fields\Textarea;
  use WordPlate\Acf\Fields\Image;
  
  return Group::make('Hero')
          ->instructions('Add a hero block with title, content and image to the page.')
          ->fields([
              Text::make('Title'),
              Textarea::make('Outline')
              ->rows(3),
              Image::make('Background Image', 'background_image')
              ->returnFormat('object'),
              Group::make('Buttons')
              ->instructions('Add a hero block with title, content and image to the page.')
              ->fields([
                  Text::make('CTA name', 'cta_name'),
                  Link::make('CTA URL', 'cta_url'),
                  Text::make('Other link name', 'other_link_name'),
                  Link::make('Other link URL', 'other_link_URL'),
              ])
              ->layout('table')
          ])
          ->layout('row');
```

Now, here's the **Twig** template (no PHP code!):

```twig
{% if component %}
<section class="hero" is="wpf-component-hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-6">
                    {% set hero = component.hero %}
                    <h1 class="title is-spaced">{{hero.title}}</h1>
                    <p class="subtitle">{{hero.outline}}</p>
                    <div class="buttons">
                        {% set button = hero.buttons %}
                        <a class="button is-primary" href="{{button.cta_url}}">{{button.cta_name}}</a>
                        <a class="button is-text" href="{{button.other_link_url}}">{{button.other_link_name}}</a>
                    </div>
                </div>
                <div class="column is-6">
                    <img src="{{hero.background_image.url}}" alt="">
                </div>            
            </div>
        </div>
    </div>
</section>
{% endif %}
```
If you're not familiar with **Twig** in general and **Timber** in particular, I would recommend you to have a look at these two documentations:

* [Twig's documenation](https://twig.symfony.com/)
* [Timber's ACF Cookbook](https://timber.github.io/docs/guides/acf-cookbook/).

Please note that, in order to use this plugin, you don't need to know everything about Timber. You'll mostly need to know how to use **Timber/Twig** with **ACF** (and once you get used to it, there's no going back — it's so fun and addictive!).<br>

Classes you see in the html tags are classes that make **Bulma** display properly. Bulma is a rather light framework, so it doesn't require as many classes as other frontend frameworks such as Bootstrap or Foundation. You can easily add/remove classes and html tags to suit your current project and usual workflow.<br> 

The sass file looks like this:

```sass
// Import variables
//@import '../../../assets/src/scss/custom-variables';

[is="wpf-component-hero"] {

}
```       

Two important things to notice:

* in every sass file, we need to import our custom variables (more on this later)
* make sure you namespace every component, so that the code you add in the `.scss` file only concerns the component you're working on.

I haven't added any sass or javascript in these `style.scss` and `script.js` files for this component, but that's where you'll need to add your styles and scripts.

By the way, the javascript and sass will be compiled when you run one of the `npm run`'s commands I mentioned earlier.<br>

Last but not the least: you may not like Bulma's styles. You may just need to use Bulma's grid system. and that's totally fine! in the `/assets/src/scss/_bulma-styles.scss` file, you can choose which Bulma elements you need to important. By default, I included most of them, but if you just want to keep the grid, you can get rid of all of them except for `@import "bulma/sass/grid/columns.sass";` (line #45).

***Note:*** You can actually install the components inside your starter theme or child theme. In order to do so, just copy the `/components` folder and paste it at the root of your starter or child theme. The WP Fizz Builder should work the same. Files in your theme's `/components` folder will be taken into account while the ones in your plugin's `/components` folder will be ignored.

_For more examples, please refer to the upcoming [Documentation](#)_



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/jeremy6680/wp-fizz-builder/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Jeremy Marchandeau - [@tweetbyjey](https://twitter.com/tweetbyjey) - 

Project Link: [https://github.com/jeremy6680/wp-fizz-builder](https://github.com/jeremy6680/wp-fizz-builder)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

* [Timber](https://upstatement.com/timber/), the plugin that made me love WordPress development
* [ACF PRO](https://www.advancedcustomfields.com/pro/), the *other* plugin that made me love WordPress development!
* [Extended ACF](https://github.com/wordplate/extended-acf)
* [Bulma](https://bulma.io/)


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/jeremy6680/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/jeremy6680/repo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/jeremy6680/repo.svg?style=for-the-badge
[forks-url]: https://github.com/jeremy6680/repo/network/members
[stars-shield]: https://img.shields.io/github/stars/jeremy6680/repo.svg?style=for-the-badge
[stars-url]: https://github.com/jeremy6680/repo/stargazers
[issues-shield]: https://img.shields.io/github/issues/jeremy6680/repo.svg?style=for-the-badge
[issues-url]: https://github.com/jeremy6680/repo/issues
[license-shield]: https://img.shields.io/github/license/jeremy6680/repo.svg?style=for-the-badge
[license-url]: https://github.com/jeremy6680/repo/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/jeremy6680