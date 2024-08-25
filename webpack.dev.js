const { merge } = require('webpack-merge');
const common = require('./webpack.common');

module.exports = merge(common, {
    mode: 'development',
    devtool: 'inline-source-map',
    devServer: {
        static: './dist',
        hot: true,
    },

    module: {
        rules: [

            {
                test: /\.css$/i,
                use: [
                    'style-loader',
                    'css-loader',
                ],
            },
            

            {
                test: /\.s[ac]ss$/i,
                use: [
                    'style-loader',   // Creates `style` nodes from JS strings
                    'css-loader',     // Translates CSS into CommonJS
                    'postcss-loader', // Processes CSS with PostCSS
                    'sass-loader',    // Compiles Sass to CSS
                ],
            },
        ],
    },
});
