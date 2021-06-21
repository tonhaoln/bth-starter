import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import rename from 'gulp-rename';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import VueLoaderPlugin from 'vue-loader/lib/plugin';
import replace from 'gulp-replace';

const PRODUCTION = yargs.argv.prod;

export const styles = () =>
  src('src/scss/bundle.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: 'ie11' })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'))
    .pipe(gulpif(PRODUCTION, cacheBust('./functions.php', '.')))
    .pipe(server.stream());

export const componentStyles = () =>
  src('components/**/*.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: 'ie11' })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css/components'))
    .pipe(server.stream());

export const images = () =>
  src('src/images/**/*.{jpg, jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));

export const copy = () =>
  src([
    'src/**/*',
    '!src/{images,js,scss,svgicons,vue}',
    '!src/{images,js,scss,svgicons,vue}/**/*',
  ]).pipe(dest('dist'));

export const inlineSVG = () =>
  src('src/svgicons/**/*.svg')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(
      rename({
        prefix: 'inline-',
        suffix: '.svg',
        extname: '.php',
      })
    )
    .pipe(dest('dist/svgicons'));

// bundle up our scripts
// You can pass in multiple scripts to the SRC and you will get multiple bundles

export const scripts = () =>
  src(['src/js/bundle.js'])
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: 'babel-loader',
                options: {
                  presets: [],
                },
              },
            },
          ],
        },
        mode: PRODUCTION ? 'production' : 'development',
        devtool: !PRODUCTION ? 'inline-source-map' : false,
        output: {
          filename: '[name].js',
        },
        externals: {
          jquery: 'jQuery',
        },
      })
    )
    .pipe(dest('dist/js'));

export const vuescripts = () =>
  src(['src/vue/vue-test.js'])
    .pipe(named())
    .pipe(
      webpack({
        plugins: [new VueLoaderPlugin()],
        module: {
          rules: [
            {
              test: /\.vue$/,
              loader: 'vue-loader',
              options: {
                loaders: {
                  js: 'babel-loader',
                },
              },
            },
            {
              test: /\.css$/,
              use: ['vue-style-loader', 'css-loader'],
            },
            {
              test: /\.js$/,
              use: 'babel-loader',
            },
          ],
        },
        resolve: {
          extensions: ['.js', '.vue', '.json'],
          alias: {
            vue$: 'vue/dist/vue.common.js',
          },
        },
        performance: {
          hints: false,
        },
        mode: PRODUCTION ? 'production' : 'development',
        devtool: !PRODUCTION ? 'inline-source-map' : false,
        output: {
          filename: '[name].js',
        },
      })
    )
    .pipe(dest('dist/vue'));

export const componentScripts = () =>
  src('components/**/*.js', '!components/**/*.min.js')
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: 'babel-loader',
                options: {
                  presets: [],
                },
              },
            },
          ],
        },
        mode: PRODUCTION ? 'production' : 'development',
        devtool: !PRODUCTION ? 'inline-source-map' : false,
        output: {
          filename: '[name].js',
        },
        externals: {
          jquery: 'jQuery',
        },
      })
    )
    .pipe(dest('dist/js/components/'));

export const clean = () => del(['dist']);

const server = browserSync.create();
export const serve = done => {
  server.init({
    proxy: '',
  });
  done();
};
export const reload = done => {
  server.reload();
  done();
};

export const watchForChanges = () => {
  watch('src/scss/**/*.scss', styles);
  watch('components/**/*.scss', componentStyles);
  watch('src/svgicons/**/*.svg', series(inlineSVG, reload));
  watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, reload));
  watch('src/js/**/*.js', series(scripts, reload));
  watch('**/*.php', reload);
  watch('src/vue/**/*.{js,vue}', series(vuescripts, reload));
  watch('components/**/*.js', series(componentScripts, reload));
};

export const dev = series(
  clean,
  parallel(styles, componentStyles, images, copy, inlineSVG, scripts),
  componentScripts,
  serve,
  watchForChanges
);

export const build = series(
  clean,
  parallel(styles, componentStyles, images, copy, inlineSVG, scripts),
  componentScripts
);

export default dev;

// generic stuff

function cacheBust(source, destination) {
  const cbString = new Date().getTime();
  return src(source)
    .pipe(
      replace(/cache_bust=\d+/g, function() {
        return `cache_bust=${cbString}`;
      })
    )
    .pipe(dest(destination));
}