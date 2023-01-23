import './bootstrap';
import '../css/app.css';
import moment from "moment";
import 'moment/locale/es';
 moment.locale('es');





import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';






const year = new Date();
const methods = {
    formatDate(value) {
        return moment(String(value)).format("MM/DD/YYYY hh:mm");
    },
    formatDateT(value) {
        return moment(String(value)).format("MM/DD/YYYY");
    },
    formatDateRevert(value) {
        return moment(String(value)).format("DD-MM-YYYY");
    },
    serializeHour(hour) {
        return moment(hour).format("LT");
    },
    formatLLLL(value){
        let mom = moment(value).format('LLLL');
        return mom.split('de '+year.getFullYear())[0]
    },
    formatLLLLFul(value){
        //miércoles, 24 de agosto de 2022 10:29
        let mom = moment(value).format('LLLL');
        return mom
    },
    formatD(){
      moment.locale('es');
       let dt =  moment().format('LLLL');
      let splitDt = dt.split(' ')
      return splitDt[0]+' '+splitDt[1]+' '+splitDt[2]+' '+splitDt[3]

    },
    formatHour(v){
         return moment().format('h:mm:ss a');
      },

    dateCustom(){
        const days = [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado',
          ];
          const moths = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

          const date = new Date(moment().format('L'));
          
          return `${days[date.getDay()]}, ${date.getDate()} ${moths[date.getMonth()]} ${date.getFullYear()}`;
    },

    //in use
    dateCustomHour(dt){
        const days = [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado',
          ];
          const moths = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

          const date = new Date(dt);
          return `${days[date.getDay()]} ${date.getDate()} de ${moths[date.getMonth()]} de  ${date.getFullYear()}`;
    },

    //in use
    dateHour(hour,dt){
        const date = dt + ' '+hour;
         return moment(date).format('h:mm a');
    },

    //in use
    dateDay(date){
        const d = new Date(date);
        return d.getDate() + 1
    }
};





const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            
            .use(ZiggyVue, Ziggy)
            .mixin({
                methods,
            })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
