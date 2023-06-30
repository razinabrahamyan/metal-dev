new Vue({
    el: '#profile_navigate',
    data: { current: 'private' },
    created() {
        const currentURL = window.location.href
        this.current = currentURL.substring(currentURL.lastIndexOf('/') + 1)
    },
});
