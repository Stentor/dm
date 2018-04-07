const path = require("path");
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

module.exports = (env, argv) => ({
  devtool: "source-map",
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        sourceMap: argv.mode === "development",
        uglifyOptions: {
          //compress: false,
          mangle: false,
          output: {
            beautify: true,
            wrap_iife: true
          }
        }
      }),
      new OptimizeCSSAssetsPlugin({})
    ]
  },
  entry: {
    'js/front': ["babel-polyfill", "./src/js/index.js"],
    'theme/css/deps': "./src/css/deps.scss"
  },
  output: {
    path: path.join(__dirname, "/web"),
    filename: "[name].js"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'theme/css/deps/[name].[ext]',
              //outputPath: path.join(__dirname, 'web/theme/css/deps'),
              publicPath: '/'
            }  
          }
        ]
      },
      {
        test: /\.scss$/,
        use: [
          {
            loader:
              argv.mode === "production"
                ? MiniCssExtractPlugin.loader
                : "style-loader"
          },
          {
            loader: "css-loader",
            options: {
              sourceMap: true
            }
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: true
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
      chunkFilename: "[id].css",
      path: path.join(__dirname, "/web/theme/css"),
    })
  ]
});
