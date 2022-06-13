const path = require("path"),
  MiniCssExtractPlugin = require("mini-css-extract-plugin"),
  NoEmitPlugin = require("no-emit-webpack-plugin"),
  production = process.env.NODE_ENV === "production";

// Configure (S)CSS compilation
const extractConfig = [
  MiniCssExtractPlugin.loader,
  {
    loader: "css-loader",
    options: {
      url: false,
    },
  },
  {
    loader: "postcss-loader",
    options: {
      postcssOptions: {
        plugins: [require("autoprefixer")],
      },
    },
  },
  {
    loader: "sass-loader",
    options: {
      implementation: require("sass"), //Dart Sass
      sassOptions: {
        outputStyle: production ? "compressed" : "expanded",
      },
    },
  },
];

module.exports = {
  mode: production ? "production" : "development",
  stats: "errors-warnings",
  entry: {
    "assets/css/style": ["/assets/scss/style.scss", "/blocks/scss/blocks.scss"],
    "assets/css/editor": "/blocks/scss/blocks-editor.scss",
  },
  devtool: "eval-cheap-source-map",
  output: {
    path: path.resolve(__dirname),
    filename: "[name].js",
  },
  externals: {
    lodash: {
      commonjs: "lodash",
      amd: "lodash",
      root: "lodash", // indicates global variable
    },
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
        },
      },
      {
        test: /\.s?css$/,
        use: extractConfig,
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
    new NoEmitPlugin([
      //Do not emit JS assets from (S)CSS files
      "assets/css/style.js",
      "assets/css/editor.js",
    ]),
  ],
};
