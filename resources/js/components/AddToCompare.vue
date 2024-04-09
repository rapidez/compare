<script>

import { addProductToCompare } from './../stores/useCompare.js'

export default {
    props:['id'],

    render() {
        return this.$scopedSlots.default(this);
    },

    methods: {
        async addProduct() {
            await addProductToCompare([this.id])
        }
    }
}
</script>