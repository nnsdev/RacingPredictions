import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'

require('./bootstrap');

window.Vue = require('vue');

library.add(fas)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.component('standings', require('./components/Standings.vue'));
Vue.component('leaderboard', require('./components/Leaderboard.vue'));

const app = new Vue({
    el: '#app'
});