var ExtractTextPlugin = require("extract-text-webpack-plugin");



module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    webpack: {
      all: {
        entry: {
          'base': './UI/base/index'
        },
        output: {
          filename: '[name].bundle.js',
          path: './public/UI',
        },
        devtool: 'source-map',
        module: {
          loaders: [
            {
              test: /\.less$/,
              loader: 'style-loader!css-loader!less-loader'
            }
          ]
        }
      } // base
    },
    watch: {
      assets: {
        files: ['UI/**/*.*'],
        tasks: ['webpack']
      },
      options: {
        livereload: true
      }
    }
  });

  grunt.registerTask('default', ['watch']);
};