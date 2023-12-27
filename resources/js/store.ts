import { createStore } from 'vuex'
export default createStore({

  state: {
    user: {
      isAuthenticated: false,
      data: {}
    },
    notification: {
      isActive: false,
      type: '',
      resource: {
        id: '',
        name: ''
      },
      message: ''
    }
  },
  mutations: {
    sendNotification(state, payload) {
      state.notification = {
        isActive: true,
        type: payload.type,
        resource: {
          id: payload.id,
          name: payload.name
        },
        message: payload.message
      }
    },

    dismissNotification(state) {
      state.notification = {
        isActive: false,
        type: '',
        resource: {
          id: '',
          name: ''
        },
        message: ''
      }
    },

    storeAuthenticatedUser(state, payload) {
      state.user = {
        isAuthenticated: true,
        data: payload
      }
    },

    removeAuthenticateUser(state) {
      state.user = {
        isAuthenticated: false,
        data: {}
      }
    }

  },
  actions: {
    hideNotification({ commit }) {
      commit('dismissNotification')
    },
    showNotification({ commit }, payload) {
      commit('sendNotification', payload)
    },
    removeUser({ commit }) {
      commit('removeAuthenticateUser')
    },
    storeUser({ commit }, payload) {
      commit('storeAuthenticatedUser', payload)
    },
  }

})