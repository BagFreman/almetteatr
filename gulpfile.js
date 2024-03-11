let preprocessor = 'scss',
	fileswatch = 'html,htm,txt,json,md,woff2,php',
	baseDir = 'wp-content/themes/almet-teatr',
	online = true;

let paths = {

	scripts: {
		src: [
			'node_modules/jquery/dist/jquery.js',
			'node_modules/swiper/swiper-bundle.js',
			'node_modules/imask/dist/imask.js',
			'node_modules/@fancyapps/ui/dist/fancybox/fancybox.umd.js',
			baseDir + '/js/app.js'
		],
		dest: baseDir + '/js',
	},

	styles: {
		src: baseDir + '/' + preprocessor + '/main.*',
		dest: baseDir + '/css',
	},

	cssOutputName: 'app.min.css',
	jsOutputName: 'app.min.js',

}

const { src, dest, parallel, series, watch } = require('gulp');
const scss = require('gulp-sass')(require('sass'));
const cleancss = require('gulp-clean-css');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const uglify = require('gulp-uglify-es').default;
const autoprefixer = require('gulp-autoprefixer');
const newer = require('gulp-newer');
const rsync = require('gulp-rsync');
const del = require('del');

function browsersync() {
	browserSync.init({
		// server: {
		// 	baseDir: 'app/'
		// },
		proxy: "almet-teatr",
		notify: false,
		online: online
	})
}

function scripts() {
	return src(paths.scripts.src)
		.pipe(concat(paths.jsOutputName))
		.pipe(uglify())
		.pipe(dest(paths.scripts.dest))
		.pipe(browserSync.stream())
}

function styles() {
	return src(paths.styles.src)
		.pipe(eval(preprocessor)())
		.pipe(concat(paths.cssOutputName))
		.pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true }))
		.pipe(cleancss({ level: { 1: { specialComments: 0 } },/* format: 'beautify' */ }))
		.pipe(dest(paths.styles.dest))
		.pipe(browserSync.stream())
}

function startwatch() {
	watch(baseDir + '/**/' + preprocessor + '/**/*', styles);
	watch(baseDir + '/**/*.{' + fileswatch + '}').on('change', browserSync.reload);
	watch([baseDir + '/**/*.js', '!' + paths.scripts.dest + '/*.min.js'], scripts);
}

exports.browsersync = browsersync;
exports.assets = series(styles, scripts);
exports.styles = styles;
exports.scripts = scripts;
exports.default = parallel(styles, scripts, browsersync, startwatch);
