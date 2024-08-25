const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');


module.exports = {
    entry: {
        index: { import: './src/js/index.js', dependOn: 'shared' },
        nav: { import: './src/js/nav.js', dependOn: 'shared' },
        swiper: { import: './src/js/swiper.js', dependOn: 'shared' },
        shared: 'lodash',
    },

    module: {
        rules: [
            {
                test: /\.m?js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
        ]
    },

    resolve: {
        extensions: ['.js', '.jsx'],
    },


    plugins: [
        new HtmlWebpackPlugin({
        }),
    ],

    output: {
        filename: '[name].bundle.js',
        path: path.resolve(__dirname, 'dist'),
        clean: true,
    },


    optimization: {
        splitChunks: {
            chunks: 'all',
        },
        runtimeChunk: 'single',
    },

};
