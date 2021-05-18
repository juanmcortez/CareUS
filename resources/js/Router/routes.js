const NotFound = () => import('../../CareUS/Pages/NotFound');
const Dashboard = () => import('../../CareUS/Pages/Dashboard');
const PatientsList = () => import('../../CareUS/Pages/Patients/List');

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
        meta: { title: 'Dashboard' }
    },
    {
        path: '/patients/list',
        name: 'patients.list',
        component: PatientsList,
        meta: { title: 'Patient\'s List' }
    },
    {
        path: '*',
        name: 'NotFound',
        component: NotFound,
        meta: { title: 'ERROR 404' }
    }
]
export default routes;
