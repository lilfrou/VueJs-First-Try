import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
const store = new Vuex.Store({
    state: {
        line_user_id: "",
        messages: []
    },
    mutations: {
        setLineUserId(state, line_user_id) {
            state.line_user_id = line_user_id;
        },
        setMessages(state, messages) {
            state.messages = messages;
        }
    },
    actions: {
        async loadMessages(state) {
            axios
                .get("/getMessages/" + this.state.line_user_id).then(response => {
                    (state.commit('setMessages', response.data))
                });

        }
    },
    getters: {
        getLineUserId(state) {
            return state.line_user_id;
        },
        getMessages(state) {
            return state.messages;
        }
    }
});
export default store;
