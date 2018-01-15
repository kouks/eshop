
function basePath (dir) {
  return require('path').join(__dirname, dir)
}

module.exports = {
  entry: './resources/assets/js/main.js',
  output: {
    path: basePath('public/js'),
    publicPath: '/public/js/',
    filename: 'build.js'
  },
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      '@': basePath('resources/assets/js'),
      'config': basePath('config'),
      'vue$': 'vue/dist/vue.esm.js'
    }
  },
  module: {
    rules: [
      {
        test: /\.(js|vue)$/,
        loader: 'eslint-loader',
        enforce: 'pre',
        include: [basePath('resources/assets/js')],
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        include: [basePath('resources/assets/js')],
        options: {
          loaders: {
            scss: 'vue-style-loader!css-loader!sass-loader',
          }
        }
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        include: [basePath('resources/assets/js')]
      },
    ]
  }
}
