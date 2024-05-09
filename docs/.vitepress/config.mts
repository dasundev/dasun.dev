import { defineConfig } from "vitepress";

export default defineConfig({
    title: "dasun.dev",
    description: "A VitePress Site",
    srcDir: "src",
    outDir: "../public/docs",
    base: "/docs",
    themeConfig: {
        sidebar: {
            '/livewire-dropzone/': [
                {
                    text: 'Livewire Dropzone',
                    items: [
                        { text: 'Introduction', link: '/livewire-dropzone/introduction' },
                        { text: 'Installation', link: '/livewire-dropzone/installation' },
                        { text: 'Usage', link: '/livewire-dropzone/usage' },
                        { text: 'Tailor UI', link: '/livewire-dropzone/tailor-ui' },
                        { text: 'Special Note', link: '/livewire-dropzone/special-note' },
                        { text: 'Blog Post', link: '/livewire-dropzone/blog-post' },
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
