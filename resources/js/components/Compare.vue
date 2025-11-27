<script>

import { compare, removeProductFromCompare } from './../stores/useCompare.js'

export default {
    data: () => ({
        onlyShowDifferent: false
    }),

    render() {
        return this?.$slots?.default?.(this);
    },

    methods: {
        remove(id) {
            removeProductFromCompare(id)
        },

        formatImage(img) {
            let regex = new RegExp('(?<break>[\\w\\d\\W]+\\/cache+\\/[\\w\\d]+\\/)');
            let remove = regex.exec(img).groups.break;

            return img.replace(remove, '');
        }
    },

    computed: {
        items: () => {
            return compare.value?.items
        },

        count: () => {
            return compare.value?.item_count;
        },

        attributes: function () {
            return this.onlyShowDifferent ? this.differentAttributes : compare.value?.attributes
        },

        differentAttributes: function () {
            let firstItem = this.items[0];
            return compare.value?.attributes.filter((attr) => {
                return this.items.some((item) => {
                    return item.attributes.find((itemAttribute) => itemAttribute.code === attr.code).value !== firstItem.attributes.find((itemAttribute) => itemAttribute.code === attr.code).value
                })
            })
        }
    }
}
</script>
