import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from './components/DashboardComponent'
import Index from './components/IndexComponent'
import MyStoresComponent from './components/MyStoresComponent'
import MyEmployeesComponent from './components/MyEmployeesComponent'
import HelpComponent from './components/HelpComponent'
import SettingsComponent from './components/SettingsComponent'

Vue.use(VueRouter)
var app = document.querySelector('#app')
const routes = [
    {path: '/',name:'index',component:Index},
    {path: '/my-stores', name:'my-stores',component:MyStoresComponent},
    {path: '/my-employees', name:'my-employees',component:MyEmployeesComponent},
    {path: '/help', name:'help',component:HelpComponent},
    {path: '/settings', name:'settings',component:SettingsComponent}
]

const router = new VueRouter({
    mode: 'history',
    routes,
    base: app.getAttribute('data-base')
})

new Vue({
    el: '#app',
    components: {Dashboard},
    router
})
