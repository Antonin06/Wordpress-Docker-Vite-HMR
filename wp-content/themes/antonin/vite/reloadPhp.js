// import { Plugin, ViteDevServer } from 'vite'
import chokidar from 'chokidar'
import colors from 'picocolors'
import path from 'path'

const getShortName = (file, root) => (
    file.startsWith(`${root}/`) ? path.posix.relative(root, file) : file
);

const liveReload = (paths, config = {}) => ({
    name: 'vite-plugin-live-reload',

    configureServer: ({ ws, config: { root: viteRoot, logger } }) => {
        const root = config.root || viteRoot;

        const reload = (filePath) => {
            ws.send({ type: 'full-reload', path: config?.alwaysReload ? '*' : filePath });
            if (config.log ?? true) {
                logger.info(
                    colors.green(`page reload `) + colors.dim(getShortName(filePath, root)),
                    { clear: true, timestamp: true }
                );
            }
        };

        chokidar
            .watch(paths, { cwd: root, ignoreInitial: true, ...config })
            .on('add', reload)
            .on('change', reload);
    },
});

export default liveReload;