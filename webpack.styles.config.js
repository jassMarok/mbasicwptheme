const path = require('path');

const styleConfig = (mode)=>{
    const loaders = [
        {
            loader: 'file-loader',
            options: {
                name: '[name].css',
            }
        },
        {
            loader : 'extract-loader'
        },
        {
            loader: 'css-loader', // translates CSS into CommonJS modules
        },
        {
            loader: 'postcss-loader', // Run post css actions
            options: {
                plugins: function () { // post css plugins, can be exported to postcss.config.js
                    return [
                        require('precss'),
                        require('autoprefixer')
                    ];
                }
            }
        },
        {
            loader: 'sass-loader' // compiles Sass to CSS
        }
    ]

    return {
        test: /\.(scss)$/,
        exclude: /(node_modules|bower_components)/,
        use: loaders
    };
}
module.exports = styleConfig;