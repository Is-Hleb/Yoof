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
    // proxy API requests to Valet during development
    devServer: {
        proxy: 'http://yoof/#/',
        open: process.platform === 'darwin',
        hotOnly: false,

    },

    // output built static files to Laravel's public dir.
    // note the "build" script in package.json needs to be modified as well.
    outputDir: '../../../public/assets/admin',

    publicPath: process.env.NODE_ENV === 'production'
        ? '/assets/admin/'
        : '/admin',

    // modify the location of the generated HTML file.
    // make sure to do this only in production.
    indexPath: process.env.NODE_ENV === 'production'
        ? '../../../resources/views/admin.blade.php'
        : 'index.html'
}
