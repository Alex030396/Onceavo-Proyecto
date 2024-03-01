import pkg from 'gulp';
const {dest, src, watch, parallel} = pkg;
import * as sass from 'sass';
import gulpSass from 'gulp-sass';
const sasss = gulpSass(sass);
import autoprefixer from 'autoprefixer';
import postcss    from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import cssnano from 'cssnano';
import concat from 'gulp-concat';
import terser from 'gulp-terser-js';
import rename from 'gulp-rename';
import imagemin from 'gulp-imagemin';
import notify from 'gulp-notify';
import cache from 'gulp-cache';
import webp from 'gulp-webp';
import plumber from 'gulp-plumber';

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
}
function css(done) {
    src('src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sasss())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('build/css'));
    done();
}
function javascript(done) {
    src('src/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('build/js'));
    done();
}
function imagenes(done) {
    src('src/img/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 3})))
        .pipe(dest('build/img'))
        .pipe(notify({ message: 'Imagen Completada'}));
    done();
}
function versionWebp(done) {
    src('src/img/**/*')
        .pipe( webp() )
        .pipe(dest('build/img'))
        .pipe(notify({ message: 'Imagen Completada'}));
    done();
}

function dev(done) {
    watch('src/scss/**/*.scss', css);
    watch('src/js/**/*.js', javascript);
    watch( 'src/img/**/*', imagenes );
    watch( 'src/img/**/*', versionWebp );
    done();
}
export {css, javascript, imagenes, versionWebp, dev};
export default parallel (imagenes, versionWebp, javascript, dev);