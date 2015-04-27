module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    webpack: {
      all: require('./webpack.config')
    },
    watch: {
      assets: {
        files: ['public/UI/**/*.*']
      },
      options: {
        livereload: true
      }
    },
    uglify: {
      js: {
        files: [{
          expand: true,     // Enable dynamic expansion.
          cwd: 'public/',      // Src matches are relative to this path.
          src: ['UI/**/*.js'], // Actual pattern(s) to match.
          dest: 'public/',   // Destination path prefix.
        }]
      }
    }
  });

  grunt.registerTask('default', ['webpack', 'watch']);
  grunt.registerTask('build', ['webpack', 'uglify']);
};