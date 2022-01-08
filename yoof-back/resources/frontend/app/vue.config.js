module.exports = {
    runtimeCompiler: true,

    chainWebpack: config => {
        config
            .plugin('html')
            .tap(args => {
                args[0].title = 'Muse Vue Ant Design - by Creative Tim'
                return args
            })
    },

    devServer: {
        proxy: 'https://yoof.online/',
    },

    // output built static files to Laravel's public dir.
    // note the "build" script in package.json needs to be modified as well.
    outputDir: '../../../public/assets/app',

    publicPath: process.env.NODE_ENV === 'production'
        ? '/assets/app/'
        : '/',

    // modify the location of the generated HTML file.
    indexPath: process.env.NODE_ENV === 'production'
        ? '../../../resources/views/app.blade.php'
        : 'index.html'
}
