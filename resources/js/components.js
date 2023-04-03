import 'Vendor/rapidez/core/resources/js/vue'

import ProductCompareCheckbox from './components/ProductCompareCheckbox.vue'
Vue.component('product-compare-checkbox', ProductCompareCheckbox)

Vue.component('product-compare-overview', () => import('./components/ProductCompareOverview.vue'))
Vue.component('product-compare-widget', () => import('./components/ProductCompareWidget.vue'))
