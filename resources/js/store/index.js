import actions from './actions'
import getters from './getters'
import mutations from './mutations'
import VuexPersist from 'vuex-persist';


const state = {
    cameras : [],
    selectedCameraId : "",
}

const vuexLocalStorage = new VuexPersist({
    key: 'vuex',
    storage: window.localStorage, 
});
export default {
    state, 
    getters,
    actions,
    mutations,
    plugins: [vuexLocalStorage.plugin],
   
}