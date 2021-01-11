import Vue from 'vue'
import router from './router'
import VueSweetalert2 from 'vue-sweetalert2'
import numeral from 'numeral'
import numFormat from 'vue-filter-number-format'

import App from './components/App.vue'

require('./bootstrap')

Vue.use(VueSweetalert2)

Vue.filter('numFormat', numFormat(numeral));

const app = new Vue({
    el: '#app',
    components: { App },
    router,
})