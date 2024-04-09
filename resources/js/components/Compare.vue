<script>

import { compare, removeProductFromCompare } from './../stores/useCompare.js'

export default {
    render() {
        return this.$scopedSlots.default(this);
    },

    methods: {
        remove(id) {
            removeProductFromCompare([id])
        }
    },

    computed: {
        items: () => {
            return compare.value?.items
        },

        count: () => {
            return compare.value?.item_count;
        },

        attributes: () => {
            return compare.value?.attributes
        }
    }
}
</script>