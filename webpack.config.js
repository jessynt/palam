let webpack = require('webpack');
let path = require('path');
let AssetsPlugin = require('assets-webpack-plugin');
let CleanPlugin = require('clean-webpack-plugin');

let Production = process.env.NODE_ENV === 'production';

let SOURCE_CODE_PATH = path.join(__dirname, './resources/assets/js');
let DIST_PATH = path.join(__dirname, 'public/build');

let Config = ({
    context: path.resolve('resources/assets'),
    entry: {
        app: ['whatwg-fetch', SOURCE_CODE_PATH + '/home.js'],
        admin: SOURCE_CODE_PATH + '/dashboard.js',
    },
    output: {
        filename: 'js/[name]-[hash:8].js',
        path: DIST_PATH,
        publicPath: '/build/'
    },
    babel: {
        presets: ['es2015', "stage-3"],
        plugins: ['transform-object-rest-spread']
    },
    resolve: {
        extensions: ['', '.js'],
        alias: {
            'vue$': 'vue/dist/vue',
            'common': SOURCE_CODE_PATH + '/common',
            'components': SOURCE_CODE_PATH + '/components',
            'containers': SOURCE_CODE_PATH + '/containers',
        },
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel',
                exclude: /node_modules/,
                include: SOURCE_CODE_PATH
            },
            {
                test: /\.vue$/,
                loader: 'vue'
            },
            {
                test: /\.s[a|c]ss$/,
                loader: 'style!css!sass'
            },
            {
                test: /\.html$/,
                loader: 'html',
                query: {interpolate: true},
                exclude: /node_modules/,
                include: SOURCE_CODE_PATH
            },
        ]
    },
    vue: {
        loaders: {
            scss: 'style!css!sass'
        }
    },
    plugins: [
        new AssetsPlugin({
            path: path.resolve(DIST_PATH),
            filename: 'manifest.json'
        }),
        new webpack.NoErrorsPlugin(),

        new webpack.DefinePlugin({
            __DEBUG__: !Production,
            'process.env': {
                BABEL_ENV: JSON.stringify(Production ? 'production' : 'local'),
                NODE_ENV: JSON.stringify(Production ? 'production' : 'local')
            }
        })
    ],
    debug: !Production,
    devtool: Production ? false : 'eval',
    devServer: {
        proxy: {
            '**': {
                target: 'http://blog.dev',
                changeOrigin: true,
            }
        },
    }
});
if (Production) {
    Config.plugins.unshift(new CleanPlugin([DIST_PATH]));
    Config.plugins = Config.plugins.concat([
        new webpack.optimize.UglifyJsPlugin({
            mangle: true,
            compress: {
                warnings: false
            }
        }),

        new webpack.optimize.DedupePlugin(),
        new webpack.optimize.OccurenceOrderPlugin(),
        new webpack.optimize.MinChunkSizePlugin({
            minChunkSize: 51200
        }),

        // Add banner
        new webpack.BannerPlugin([
            'Author: Jessynt <xr5299@gmail.com>',
            'Date: ' + new Date().toLocaleDateString('zh-CN')
        ].join("\n"), {raw: false, entryOnly: true})
    ]);
}
module.exports = Config;