var ExtractTextPlugin = require("extract-text-webpack-plugin"),
  webpack = require('webpack'),
  fs = require('fs'),
  path = require('path');


// Get all components path
var entryConfig = {};
entryConfig['base'] = './UI/base/index';
entryConfig['components'] = './UI/components/index';
fs.readdirSync(path.resolve(__dirname, 'UI/pages')).forEach(function(page) {
  entryConfig[page] = ['./UI/pages/', page, '/index'].join('');
});


module.exports = function(grunt) {
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    webpack: {
      all: {
        entry: entryConfig,
        output: {
          filename: '[name].bundle.js',
          path: './public/UI',
          publicPath: "/UI/",
          chunkFilename: "[id].chunk.js"
        },
        devtool: 'source-map',
        module: {
          loaders: [
            {
              test: /\.js$/,
              loader: 'jsx-loader'
            },
            {
              test: /\.less$/,
              loader: 'style-loader!css-loader!less-loader'
            }
          ]
        },
        plugins: [
          // new webpack.optimize.CommonsChunkPlugin("base", "base.bundle.js")
        ],
        resolve: {
          root: 'UI',
          modulesDirectories: [path.resolve(__dirname, 'node_modules')],
          extensions: ['', '.js']
        },
        resolveLoader: { 
          root: path.join(__dirname, "node_modules") 
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