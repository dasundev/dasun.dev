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
                        { text: 'Special note', link: '/livewire-dropzone/special-note' },
                        { text: 'Blog post', link: '/livewire-dropzone/blog-post' },
                    ]
                }
            ],
            '/filament-access-secret/': [
                {
                    text: 'Filament Access Secret',
                    items: [
                        {
                            text: 'Getting Started',
                            items: [
                                { text: 'Introduction', link: '/filament-access-secret/introduction' },
                                { text: 'Installation', link: '/filament-access-secret/installation' },
                            ]
                        },
                        {
                            text: 'Usage',
                            items: [
                                { text: 'Enable secret access', link: '/filament-access-secret/enable-secret-access' },
                                { text: 'Multiple panel support', link: '/filament-access-secret/multiple-panel-support' },
                                { text: 'Disable secret access', link: '/filament-access-secret/disable-secret-access' },
                                { text: 'Enhance security', link: '/filament-access-secret/enhance-security' },
                            ]
                        },
                        { text: 'Special note', link: '/filament-access-secret/special-note' },
                    ]
                }
            ],
            '/livewire-quill-text-editor/': [
                {
                    text: 'Livewire Quill Text Editor',
                    items: [
                        {
                            text: 'Getting Started',
                            items: [
                                { text: 'Introduction', link: '/livewire-quill-text-editor/introduction' },
                                { text: 'Installation', link: '/livewire-quill-text-editor/installation' },
                            ]
                        },
                        {
                            text: 'Usage',
                            items: [
                                { text: 'Use editor component', link: '/livewire-quill-text-editor/use-editor-component' },
                                { text: 'Customize the editor', link: '/livewire-quill-text-editor/customize-the-editor' },
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
