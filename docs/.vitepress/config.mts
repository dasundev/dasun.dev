import { defineConfig } from "vitepress";

export default defineConfig({
    title: "dasun.dev",
    description: "A VitePress Site",
    srcDir: "src",
    themeConfig: {
        nav: [
            { text: "Home", link: "/" },
            { text: "Examples", link: "/markdown-examples" }
        ],
        sidebar: [
            {
                text: "Examples",
                items: [
                    { text: "Markdown Examples", link: "/markdown-examples" },
                    { text: "Runtime API Examples", link: "/api-examples" }
                ]
            }
        ],
        socialLinks: [
            { icon: "github", link: "https://github.com/vuejs/vitepress" }
        ],
    },
    rewrites: {
        'packages/:pkg/(.*)': ':pkg/index.md'
    }
});
