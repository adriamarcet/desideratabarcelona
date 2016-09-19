module.exports = function(grunt) {

	grunt.config('svgstore', {
		
		options: {
			prefix : 'icn-', // This will prefix each <g> ID
		},
		default : {
			files: {
				'../svgs/svg-defs.svg': ['../svgs/*.svg'],
			}
		},
	});
	
	grunt.loadNpmTasks('grunt-svgstore');
};