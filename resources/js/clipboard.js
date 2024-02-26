export default (e) => ({
    copied: false,
    async copyToClipboard(e) {
        try {
            const text = this.$root.querySelector('.torchlight-copy-target').textContent
            await navigator.clipboard.writeText(text);
        } catch (error) {
            console.error(error.message);
        }
        this.copied = true
        setTimeout(() => (this.copied = false), 2000)
    },
})
