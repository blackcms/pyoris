let mix = require("laravel-mix");
const purgeCss = require("@fullhuman/postcss-purgecss");

const path = require("path");
let directory = path.basename(path.resolve(__dirname));

const source = "themes/" + directory;
const dist = "public/themes/" + directory;

mix
    // purgeCSS is used to remove unused CSS, if you are not sure about it, you can change it to
    .sass(source + "/assets/sass/style.scss", dist + "/css", {}, [
        purgeCss({
            content: [
                source + "/layouts/*.blade.php",
                source + "/partials/*.blade.php",
                source + "/partials/**/*.blade.php",
                source + "/views/*.blade.php",
                source + "/views/**/*.blade.php",
                source + "/widgets/**/templates/frontend.blade.php",
                "platform/addons/contact/resources/views/forms/contact.blade.php",
            ],
            defaultExtractor: (content) =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            safelist: [
                /^navigation-/,
                /^language-/,
                /language_bar_list/,
                /show-admin-bar/,
                /^fa-/,
                /breadcrumb/,
                /active/,
                /show/,
            ],
        }),
    ])
    .js(source + "/assets/js/pyoris.js", dist + "/js")
    .js(source + "/assets/js/icons-field.js", dist + "/js")

    .copy(source + "/assets/js/custom.min.js", dist + "/js")
    .copy(source + "/assets/js/icon-fields.js", dist + "/js")

    .copy(dist + "/css/style.css", source + "/public/css")
    .copy(dist + "/js/pyoris.js", source + "/public/js")
    .copy(dist + "/js/icons-field.js", source + "/public/js");