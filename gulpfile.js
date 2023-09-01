"use strict";

var gulp = require("gulp");
var sass = require("gulp-sass")(require("sass"));
var cleanCss = require("gulp-clean-css");
var rename = require("gulp-rename");
var concat = require("gulp-concat");

var paths = {
	sass: ["./assets/scss/*.scss"],
	libs: []
};

gulp.task("sass", function (done) {
	gulp
		.src(paths.sass)
		.pipe(sass())
		.on("error", sass.logError)
		.pipe(gulp.dest("./assets/css/"))
		.pipe(
			cleanCss({
				keepSpecialComments: 0,
			})
		)
		.pipe(rename({ extname: ".css" }))
		.pipe(gulp.dest("./assets/css/"))
		.on("end", done);
});

gulp.task("watch", function () {
	gulp.watch(paths.sass, gulp.series("sass"));
});
