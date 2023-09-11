import { defineConfig, loadEnv } from "vite";

export default ({ mode }) => {
    process.env = {...process.env, ...loadEnv(mode, process.cwd())};

    return defineConfig({
        base: process.env.VITE_BASE_PATH,
        publicDir: process.env.VITE_DEFAULT_PATH + '/public',
        build: {
            minify: true,
            outDir: process.env.VITE_OUTPUT_PATH,
            rollupOptions: {
                input: {
                    index: process.env.VITE_INPUT_PATH + '/js/index.js',
                    style: process.env.VITE_INPUT_PATH + '/sass/style.scss',
					editor: process.env.VITE_INPUT_PATH + '/sass/editor.scss'
                },
                output: {
                    entryFileNames: '[name].js',
                    assetFileNames: (assetInfo) => {
                        return assetInfo.name;
                    }
                }
            }
        },
        plugins: [
			{
				name: 'php',
				enforce: 'post',
				handleHotUpdate({ file, server }) {
					if (file.endsWith('.php')) {
						server.ws.send({
							type: 'full-reload',
							path: '*'
						});
					}
				}
			},
			{
				name: 'twig',
				enforce: 'post',
				handleHotUpdate({ file, server }) {
					if (file.endsWith('.twig')) {
						server.ws.send({
							type: 'full-reload',
							path: '*'
						});
					}
				}
			},
			{
				name: 'html',
				enforce: 'post',
				handleHotUpdate({ file, server }) {
					if (file.endsWith('.html')) {
						server.ws.send({
							type: 'full-reload',
							path: '*'
						});
					}
				}
			}
		]
    })
}

