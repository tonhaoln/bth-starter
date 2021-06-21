# Installing Theme

* Download and clone the theme from github into the WordPress Theme Folder

This theme uses gulp to bundle the assets and also includes hot code reloading on a proxied localhost.

To take advantage of this, the local install should be set up at:

## Install the Theme
* cd in the theme folder
* run `npm install` to download the needed node modules
* to start development and run the watch step type `npm run start`
* you can run `npm run build` to run the build step with out the watch step


### SCSS
* SCSS files are located in `src/scss/`
* Any files added to `src/scss/bundle.scss` will be automatically included in the compilation and applied to the website.

### JS
* SCSS files are located in `src/js/`
* The theme has a webpack build step to allow us to use the `import` syntax to bundle files.
* Any files added to `src/js/bundle.js` will be automatically included in the compilation and applied to the website.
* Add a file to `bundle.js` using the following syntax `import './PATH OF FILE';`
* You can include jQuery in your file using the following `import $ from 'jquery';`
* I have included a previously existing file called `navToggle` to show how to use the file and how to import it into `bundle.js`

## Before sending live
 
Before we send the theme live we can run an optimisation process that minifies CSS and JS and removes any comments etc.

* Run `npm run build`

## Handy bits

## Things that need docs

### Component System

### Inline SVG System