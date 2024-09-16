const webpack = require('webpack');
const path = require('path');

module.exports = {
  entry: './public/assets/js/index.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'public/assets/js'),
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader'],
      },
    ],
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      Toastify: 'toastify-js',
    }),
  ],
  mode: 'development',
  watch: true,
};