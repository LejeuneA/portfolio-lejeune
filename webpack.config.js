const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

var ressources = './src/';
var theme = './public/';

var config = {
	entry: {
		index: { import: './src/js/index.js', dependOn: 'shared' },
        nav: { import: './src/js/nav.js', dependOn: 'shared' },
        swiper: { import: './src/js/swiper.js', dependOn: 'shared' },
        shared: 'lodash',
	},
	output: {
		path: path.resolve(__dirname, `${theme}assets`),
		filename: '[name].js', // .[chunkhash:8]
		chunkFilename: '[id].js', // .[chunkhash:8]
		publicPath: `${theme}assets/`,
		assetModuleFilename: 'images/[hash][ext][query]',
		clean: false,
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'css/[name].css', //.[contenthash:8]
		}),
	],
	module: {
		rules: [{
				test: /\.m?js$/,
				exclude: /(node_modules|bower_components)/,
				use: ['babel-loader']
			},
			{
				test: /\.css$/i,
				use: [
					MiniCssExtractPlugin.loader, // 'style-loader'
					{
						loader: "css-loader",
						options: {
							importLoaders: 1
						},
					},
					{
						loader: "postcss-loader",
						options: {
							postcssOptions: {
								plugins: [
									[
										"autoprefixer",
										{
											// Options
										},
									],
								],
							},
						},
					}
				],
			},
			{
				test: /\.s[ac]ss$/i,
				use: [
					{
						loader: MiniCssExtractPlugin.loader, // 'style-loader'
					},
					{
						loader: "css-loader",
						options: {
							importLoaders: 2
						},
					},
					{
						loader: "postcss-loader",
						options: {
							postcssOptions: {
								plugins: [
									[
										"autoprefixer",
										{
											// cascade: false,
											// grid: 'autoplace',
										},
									],
								],
							},
						},
					},
					{
						loader: 'sass-loader',
					}
				],
			},
			{
				test: /\.(ttf|eot|woff|woff2|svg)$/,
				type: 'asset/resource',
				include: path.resolve(__dirname, `${ressources}fonts`),
				generator: {
					filename: 'fonts/[hash][ext][query]',
					publicPath: "../",
				}
			},
			{
				test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
				type: 'asset/resource',
				include: path.resolve(__dirname, `${ressources}images`),
				generator: {
					filename: "images/[name][ext]",
					publicPath: "../",
				},
			},
			{
				test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
				type: 'asset/resource',
				include: path.resolve(__dirname, `${ressources}icons`),
				generator: {
					filename: 'icons/[hash][ext][query]',
					publicPath: "../",
				}
			},
		]
	},
};

module.exports = (env, argv) => {
	if (argv.mode === 'development') {
		config.watch = true;
		// config.optimization.minimize = true;
		config.devtool = 'eval-cheap-module-source-map';
		config.output.clean.dry = true;
	}

	if (argv.mode === 'production') {
		config.devtool = 'nosources-source-map'; // false
		config.output.clean.dry = true;
	}

	return config;
};
