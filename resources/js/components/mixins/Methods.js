export default {
    methods: {
        compareToggle(productId) {
            if (productId in this.$root.config.compare) {
                this.compareRemove(productId)
            } else {
                this.compareAdd(productId)
            }
        },

        compareAdd(productId) {
            axios.post(window.url('/compare'), {
                product: productId
            }).then(response => {
                this.$root.config.compare = response.data;
            }).catch(error => {
                alert('Something went wrong.')
            })
        },

        compareRemove(productId) {
            axios.delete(window.url('/compare/' + productId)).then(response => {
                this.$root.config.compare = response.data;
            }).catch(error => {
                alert('Something went wrong.')
            })
        }
    }
}
