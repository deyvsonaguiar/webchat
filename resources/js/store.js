import Vue from 'vue';
import axios from 'axios';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

export default new Vuex.Store({
  state: {
    user: {}
  },
  mutations: {
      setUserState: (state, value) => state.user = value
  },
  actions: {
      userStateAction: () => {
          axios.get('api/users/me').them(response => {
              const userResponse = response.data.user
              commit('setUserState', userResponse)
          })
      }
  }
})
