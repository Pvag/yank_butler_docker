'use strict';

const GulpClient = require('gulp');
const { src, dest } = require('gulp');
const sass = require('gulp-sass');

function compileSass(done) {
    src('scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('assets/css/'));
    done();
}

// function watchSass() {
//     watch('app/scss/app.scss', compileSass);
// }
// exports.watchSass = watchSass;

exports.compileSass = compileSass; // this or watchSass
