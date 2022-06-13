# Cayden's Sass-y Starter Theme

I'll try to keep this as up-to-date as possible while things are updated and more functionality is implemented. The goal of this is to act as a future parent theme, while in the interim being maintained as a GeneratePress Child Theme. The dependencies for this project were set by [@marincarroll](https://github.com/marincarroll) for our ICS Base theme.

---

## Introductions

### [GeneratePress](https://generatepress.com/)

From their website: "GeneratePress is a lightweight WordPress theme that focuses on speed, stability, and accessibility."

I like it personally because it has very few invasive styles and almost every part of it can be disabled if needed. Additionally, GeneratePress has extensive hooks and filters that are super helpful to insert content in specific spots. Note that it is a plugin & a theme. The two work hand-in-hand, so consider GeneratePress a must-use plugin for everything to work properly.

#### Links

- [Documentation](https://docs.generatepress.com/)
- [Hooks](https://docs.generatepress.com/article/hooks-visual-guide/)
- [Filters](https://docs.generatepress.com/collection/filters/)
- [Remove Customizer Options](https://docs.generatepress.com/article/remove-all-gp-customizer-options/)

### [Advanced Custom Fields](https://www.advancedcustomfields.com/)

This theme is a hybrid theme of Gutenberg/ACF. Using ACF here is a means to an end in order to transition to proper React.js Gutenberg blocks. By at the minimum registering Fields Groups as blocks, we can ensure that future React blocks will integrate seamlessly.

#### Links

- [Documentation](https://www.advancedcustomfields.com/resources/)

---

## Theme Structure

```shell
sass-starter/               # → Root of the theme. You should change this to match the client name
├─ assets/                  # → Theme assets (scripts, styles, and images)
│  ├─ css/                  # → Standard CSS files if necessary.
│     └─ style.css         # → This is where "/scss/style.scss" compiles into
│  ├─ images/               # → Theme images (only used for icons, currently)
│  ├─ js/                   # → Theme scripts
│  ├─ scss/                 # → Sass files setup with @use and @forward isntead of @import
│     └─ blocks/            # → Block styling - name should match name in "../../../blocks"
│     └─ components/        # → Text, buttons, forms, etc..
│     └─ helpers/           # → Mixins, variables and functions
│     └─ layouts/           # → Header, Body, Footer, etc..
│     └─ pages/             # → Page, post, single, archive, etc..
│     └─ vendors/           # → Additional vendors, installed via npm (Bootstrap available already)
│     └─ utilities/         # → Utility classes to be used in PHP templates
│     └─ style.scss         # → This is what is ultimately compiled to "../css/style.css"
├─ blocks/                  # → All PHP Block files
│  ├─ register.php          # → Dedicated file where theme blocks should be registered
│  ├─ content/              # → PHP Classes used to standardize the format of content
│     └─ register.php       # → Where all the content Class files are included
├─ inc/                     # → Function Includes
│  ├─ acf-options-page.php  # → ACF Options Page
│  ├─ cpts.php              # → Custom Post Types
│  ├─ dashboard-widgets.php # → Dashboard Widgets, useful for documentation indexing
│  ├─ filters.php           # → WordPress & GeneratePress Filters
│  ├─ hooks.php             # → WordPress & GeneratePress Hooks
│  ├─ index.php             # → A standard index file to avoid weird stuff
│  ├─ internal.php          # → Internal error and debugging functions
│  ├─ menus.php             # → Menu Registration and Extension
│  ├─ optimizations.php     # → WordPress Optimizations (comments are being disabled here)
│  ├─ shortcodes.php        # → WordPress Shortcode creation/management
│  ├─ utilities.php         # → A couple helper functions I've found recently that come in handy
├─ node_modules/            # → Node packages (don't touch)
├─ vendor/                  # → Composer packages (don't touch)
├─ .eslintrc                # → WordPress linting
├─ composer.json            # → Composer dependencies and scripts (built by @marincarroll)
├─ package.json             # → Node dependencies and scripts (built by @marincarroll)
├─ style.css                # → Required by WordPress to establish it as a Child Theme (don't touch)
├─ webpack.config.js        # → This is what drives the compiling
```

## Theme Installation

This theme requires the following dependencies:

- [Node.js](https://nodejs.org/) `$ npm install`
- [Composer](https://getcomposer.org/) `$ composer install`

Dependencies were last updated 3/20/21.

### Available Commands

- `composer lint:wpcs`: checks all PHP files against the WordPress PHP Coding Standards (https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php`: checks all PHP files for syntax errors.
- `composer make-pot`: generates a .pot file in the theme's `languages/` directory.

This project uses @wordpress/scripts for npm commands. See https://www.npmjs.com/package/@wordpress/scripts for detailed information and additional commands.

- `npm run start`: Builds according to development mode set in the theme's `webpack.config.js`, then continuously watches for changes.
- `npm run build`: Builds according to production mode set in `webpack.config.js`.
- `npm run lint:style`: Checks all CSS and SCSS files using the `.stylelintrc.json` config against the WordPress CSS Coding Standards (https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js`: Lints all JS files using the `.eslintrc` config against the WordPress JavaScript Coding Standards (https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run rtl`: Generates a right-to-left version of the front-end stylesheet.
- `npm run bundle`: Generates a .zip file of the theme.

### Additional Installations

#### Plugins (mu-plugins)

- Advanced Custom Fields Pro
- Advanced Custom Fields: Extended
- GeneratePress Premium

#### Theme

- GeneratePress

---

## Theme Utilities

### Useful Functions

- `slug($str)` - Converts a string to a slug.
- `get_string_between($string, $start, $end)` - Gets a string between two strings.
