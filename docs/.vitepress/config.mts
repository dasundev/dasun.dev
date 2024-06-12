import { defineConfig } from "vitepress";

export default defineConfig({
    title: "dasun.dev",
    description: "Official Documentation",
    srcDir: "src",
    outDir: "../public/docs",
    themeConfig: {
        logoLink: "https://www.dasun.dev",
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
                                { text: 'Customize the dropzone', link: '/livewire-dropzone/customize-the-dropzone' },
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
            ],
            '/payoora/': [
                {
                    text: 'Payoora',
                    items: [
                        { text: 'Introduction', link: '/payoora/introduction' },
                        { text: 'Installation', link: '/payoora/installation' },
                        {
                            text: 'Configuration',
                            items: [
                                { text: 'Env Keys', link: '/payoora/configuration/env-keys' },
                                { text: 'Views', link: '/payoora/configuration/views' },
                            ]
                        },
                        {
                            text: 'Models',
                            items: [
                                { text: 'Introduction', link: '/payoora/models/introduction' },
                                { text: 'User', link: '/payoora/models/user-model' },
                                { text: 'Order', link: '/payoora/models/order-model' },
                                { text: 'OrderLine', link: '/payoora/models/order-line-model' },
                                { text: 'Payment', link: '/payoora/models/payment-model' },
                                { text: 'Subscription', link: '/payoora/models/subscription-model' },
                            ]
                        },
                        {
                            text: 'APIs',
                            items: [
                                { text: 'Checkout API', link: '/payoora/api/checkout-api' },
                                { text: 'Recurring API', link: '/payoora/api/recurring-api' },
                                { text: 'Preapproval API', link: '/payoora/api/preapproval-api' },
                                { text: 'Authorize API', link: '/payoora/api/authorize-api' },
                                { text: 'Capture API', link: '/payoora/api/capture-api' },
                                { text: 'Charging API', link: '/payoora/api/charging-api' },
                                { text: 'Retrieval API', link: '/payoora/api/retrieval-api' },
                                { text: 'Refund API', link: '/payoora/api/refund-api' },
                                { text: 'Subscription Manager API', link: '/payoora/api/subscription-manager-api' },
                            ]
                        },
                        { text: 'Billable Methods', link: '/payoora/billable-methods' },
                        { text: 'Events', link: '/payoora/events' },
                        { text: 'Refund', link: '/payoora/refund' },
                    ]
                }
            ],
        },
        footer: {
            message: 'Released under the MIT License.',
            copyright: 'Copyright © 2020-present Dasun Tharanga'
        },
        socialLinks: [
            { icon: "github", link: "https://github.com/dasundev/dasun.dev" }
        ],
    },
    base: "/docs",
    sitemap: {
        hostname: 'https://www.dasun.dev/docs/'
    },
    head: [
        [
            'script',
            { async: '', src: 'https://www.googletagmanager.com/gtag/js?id=G-DF0M53ZHLF' }
        ],
        [
            'script',
            {},
            `window.dataLayer = window.dataLayer || [];
             function gtag(){dataLayer.push(arguments);}
             gtag('js', new Date());
             gtag('config', 'G-DF0M53ZHLF');`
        ]
    ],
    rewrites: {
        'packages/:pkg/(.*)': ':pkg/(.*)'
    },
});
