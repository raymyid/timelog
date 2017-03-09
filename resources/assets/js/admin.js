
require('./bootstrap');

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';

import router from './routes/admin.js';
import Admin from './Admin.vue';

Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    router,
    render: h => h(Admin)
});
