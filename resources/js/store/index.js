import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex)

//Modules
import categories from './modules/categories'
import brands from './modules/brands'
import sizes from './modules/sizes'

export default new Vuex.Store({
    modules: {
        categories,
        brands,
        sizes
    }
})