const gulp = require('gulp');


const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const uglify = require('gulp-uglify-es').default;

const isChanged = require('gulp-changed');


const fileinclude = require('gulp-file-include');
const server = require('browser-sync').create();

const {
  watch,
  series
} = require('gulp');


const paths = {
  scripts: {
    src: './',
    dest: './build/'
  }
};

// Copy needed files
async function CopyFiles() {
  gulp.src([
      'src/**/*.*',
      '!src/js/index.js',
    ])
		.pipe(isChanged('build/assets/'))
    .pipe(gulp.dest('build/assets/'));
}

async function scripts(){
  gulp.src('src/js/index.js')
  .pipe(uglify())
  .pipe(rename('main.min.js'))
  .pipe(gulp.dest('build/assets/js'))
  .pipe(server.stream());
}

// Reload Server
async function reload() {
  server.reload();
}

// Build files html and reload server
async function buildAndReload() {
  await includeHTML();
  CopyFiles();
  scripts();
  reload();
}

async function includeHTML() {
  return gulp.src([
        './*.html',
        './pages/**/*.html',
        '!./pages/includes/**/*.*', // ignore
    ])
    .pipe(fileinclude({
        prefix: '@@',
        basepath: '@file',
        context: {
          arr: ['test1', 'test2']
        }
    }))
    .pipe(gulp.dest(paths.scripts.dest));
}

exports.includeHTML = includeHTML;

exports.default = async function () {
  // Init serve files from the build folder
  server.init({
    server: {
      baseDir: paths.scripts.dest
    }
  });
  // Build and reload at the first time
  buildAndReload();
  // Watch task
  watch(["./*.html", "./pages/**/*.html", "src/**/*.*"], series(buildAndReload));
};