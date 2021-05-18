import VueRouter from 'vue-router';
import routes from './routes';

const router = new VueRouter({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
    // Update the page title.
    document.title = to.meta.title+' | '+process.env.MIX_APP_NAME;
    // Continue
    next();
})

export default router;
