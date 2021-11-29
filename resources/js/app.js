require('./bootstrap');
window.Vue = require('vue').default;

// Form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
// Vue.component(HasError.name, HasError);
// Vue.component(AlertError.name, AlertError);

// Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Routes
import routes from './routes';
const router = new VueRouter({ mode: 'history', routes: routes });

// Components
import DashSidebar from './components/DashSidebar.vue';
import DashHeader from './components/DashHeader.vue';

// Store
import store from './store';

// Loader
import LoaderSpinner from 'vue-loader-spinner'
Vue.use(LoaderSpinner)

// Trans
import VuePageTransition from 'vue-page-transition' 
Vue.use(VuePageTransition)

// Dialog
import VModal from 'vue-js-modal'
import VueConfirmDialog from 'vue-confirm-dialog'
Vue.use(VModal)
Vue.use(VueConfirmDialog)

// Noti
import Notifications from 'vue-notification'
Vue.use(Notifications)

// Toggle
import ToggleButton from 'vue-js-toggle-button'
Vue.use(ToggleButton)

//Moment
Vue.use(require('vue-moment'));

// Standalone
import Pagination from 'laravel-vue-pagination';
import Breadcrumb from './components/Breadcrumb.vue';
import UnreadNotification from './components/notification/Unread.vue';

Vue.component('pagination', Pagination);
Vue.component('breadcrumb', Breadcrumb);
Vue.component('UnreadNotification', UnreadNotification);

//
Vue.prototype.$auth = window.user;


const app = new Vue({
    el: '#app',
    router,
    store
});
