import Vue from 'vue'
import App from './App.vue'
import VueMask from 'v-mask'
import Toasted from 'vue-toasted'

import 'font-awesome/css/font-awesome.css'
import './config/bootstrap'
import './registerServiceWorker'
import router from './config/router'
import store from './config/store'

Vue.use(VueMask)
 
Vue.use(Toasted)
Vue.config.productionTip = false
const DEFAULT_TITLE = 'Platium'
router.beforeEach((to,From,next) =>{
    document.title= to.name != undefined ? `${DEFAULT_TITLE} - ${to.name}` : DEFAULT_TITLE
    next()
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
