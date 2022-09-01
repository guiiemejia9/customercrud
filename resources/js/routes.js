const Home = () => import('./components/Home.vue')
const Contacto = () => import('./components/Contacto.vue')

const Mostrar = () => import('./components/customer/Mostrar.vue')
const Crear = () => import('./components/customer/Crear.vue')
const Editar = () => import('./components/customer/Editar.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarCustomers',
        path: '/customers',
        component: Mostrar
    },
    {
        name: 'crearCustomer',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarCustomer',
        path: '/editar/:id',
        component: Editar
    },
     {
        name: 'contacto',
        path: '/contacto',
        component: Contacto
    }
]