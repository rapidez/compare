import AddToCompare from "./components/AddToCompare.vue";
import Compare from "./components/Compare.vue";

document.addEventListener('vue:loaded', function (event) {
    const vue = event.detail.vue
    vue.component('add-to-compare', AddToCompare)
    vue.component('product-compare', Compare)
})
