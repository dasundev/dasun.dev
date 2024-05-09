import { defineConfig } from "vitepress";

export default defineConfig({
    title: "dasun.dev",
    description: "A VitePress Site",
    srcDir: "src",
    themeConfig: {
        sidebar: {
            '/livewire-dropzone/': [
                {
                    text: 'Livewire Dropzone',
                    items: [
                        {
                            text: 'Introduction', link: '/livewire-dropzone/introduction' },
                    ]
                }
            ]
        },
        socialLinks: [
            { icon: "github", link: "https://github.com/dasundev/dasun.dev" }
        ],
    },
    rewrites: {
        'packages/:pkg/(.*)': ':pkg/(.*)'
    }
});
