/*!
 * Grunt file
 *
 * @package TemplateData
 */

/*jshint node:true */
module.exports = function ( grunt ) {
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-jscs' );
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-contrib-csslint' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );

	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' ),
		jshint: {
			options: {
				jshintrc: true
			},
			files: {
				src: [
					'assets/src/js/*.js'
				]
			}
		},
		jscs: {
			src: '<%= jshint.files.src %>'
		},
		less: {
			site: {
				files: {
					'assets/neutrality.wtf.build.css': 'assets/src/less/neutrality.wtf.less'
				}
			}
		},
		csslint: {
			options: {
				csslintrc: '.csslintrc'
			},
			site: [
				'assets/css/neutrality.build.css'
			]
		},
		concat: {
			files: {
				src: [
					'assets/src/js/pre.js',
					'assets/src/js/neutralitywtf.const.js',
					'assets/src/js/neutralitywtf.ui.js',
					'assets/src/js/neutralitywtf.process.js',
					'assets/src/js/neutralitywtf.ui.Loader.js',
					'assets/src/js/neutralitywtf.ui.SearchWidget.js',
					'assets/src/js/neutralitywtf.load.js',
					'assets/src/js/post.js'
				],
				dest: 'assets/neutrality.wtf.build.js'
			}
		}
	} );

	grunt.registerTask( 'default', [ 'lint', 'build' ] );
	grunt.registerTask( 'lint', [ 'csslint', 'jshint', 'jscs' ] );
	grunt.registerTask( 'build', [ 'less', 'concat' ] );
};
