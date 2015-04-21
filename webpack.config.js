var ExtractTextPlugin = require("extract-text-webpack-plugin"),
  webpack = require('webpack'),
  fs = require('fs'),
  path = require('path');

// Get all components path
var entryConfig = {};
fs.readdirSync(path.resolve(__dirname, 'UI/pages')).forEach(function(page) {
  entryConfig[page] = ['./UI/pages/', page, '/index'].join('');
});

module.exports = {
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
        loader: 'jsx-loader?harmony'
      },
      {
        test: /\.less$/,
        loader: 'style-loader!css-loader!less-loader'
      }
    ]
  },
  plugins: [
    new webpack.optimize.CommonsChunkPlugin("base", "base.bundle.js")
  ],
  resolve: {
    modulesDirectories: [
      path.resolve(__dirname, 'node_modules'),
      path.resolve(__dirname, 'UI')],
    extensions: ['', '.js']
  },
  resolveLoader: { 
    root: path.join(__dirname, "node_modules") 
  },
  watch: true,
  debug: true
} // base