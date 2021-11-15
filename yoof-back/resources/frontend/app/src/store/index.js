import Vue from 'vue'
import Vuex from 'vuex'
import {state} from "./state";
import {mutations} from "./mutations";
import {actions} from "./actions";
import {getters} from "./getters";

// #### MODULES ####
import indexPage from "./modules/indexPage";

Vue.use(Vuex)

export default new Vuex.Store({
    state,
    mutations,
    actions,
    modules: {
      indexPage,
    },
    getters,
})
