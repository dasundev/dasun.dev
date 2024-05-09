import { defineConfig } from "vitepress";

export default defineConfig({
    title: "dasun.dev",
    description: "Official Documentation",
    base: "/docs",
    srcDir: "src",
    outDir: "../public/docs",
    themeConfig: {
        sidebar: {
            '/livewire-dropzone/': [
                {
                    text: 'Livewire Dropzone',
                    items: [
                        {
                            text: 'Getting Started',
                            items: [
                                { text: 'Introduction', link: '/livewire-dropzone/introduction' },
                                { text: 'Installation', link: '/livewire-dropzone/installation' },
                            ]
                        },
                        {
                            text: 'Basic Usage',
                            items: [
                                { text: 'Add your first dropzone', link: '/livewire-dropzone/usage' },
                            ]
                        },
                        {
                            text: 'Advanced Usage',
                            items: [
                                { text: 'Customize the dropzone', link: '/livewire-dropzone/tailor-ui' },
                            ]
                        },
                        {
                            text: 'References',
                            items: [
                                { text: 'Special note', link: '/livewire-dropzone/special-note' },
                                { text: 'Blog post', link: '/livewire-dropzone/blog-post' },
                            ]
                        },
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
