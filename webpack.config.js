const path = require('path');
const styleConfig = require("./webpack.styles.config");
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyPlugin = require('copy-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = (env, argv) => {
    const { mode } = argv;
    const proxyUrl = "http://ymcavirtual.local/";

    const styleRule = styleConfig(mode);
    return {
        entry: ['./src/scripts/index.js', './src/styles/main.scss'],
        output: {
            path: path.resolve(__dirname, 'dist'),
            filename: 'main.js'
        },
        module: {
            rules: [
                {
                    test: /\.m?js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env']
                        }
                    }
                },
                styleRule,
            ]
        },
        plugins: [
            new CopyPlugin([
                {
                    from: './src/images/',
                    to : 'images'
                },
                {
                    from: './src/fonts/',
                    to: 'fonts'
                }
            ]),
            new ImageminPlugin({
                test: /\.(jpe?g|png|gif|svg)$/i
            }),
            new BrowserSyncPlugin({
                proxy: proxyUrl,
                injectChanges: true,
                open: true,
                watchEvents: ['change', 'add', 'unlink', 'addDir', 'unlinkDir']
            })
        ]
    }
}