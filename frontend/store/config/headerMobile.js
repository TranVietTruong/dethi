export const state = () => ({
  statusSearch: false,
  statusMenu: false
})

export const getters = {
  getStatusSearch (state) {
    return state.statusSearch
  },
  getStatusMenu (state) {
    return state.statusMenu
  }
}

export const mutations = {
  setStatusSearch (state, status) {
    state.statusSearch = status
  },
  setStatusMenu (state, status) {
    state.statusMenu = status
  }
}

export const actions = {
  toggleSearch (vuexContext) {
    vuexContext.commit('setStatusSearch', !vuexContext.getters.getStatusSearch)
  },
  toggleMenu (vuexContext) {
    vuexContext.commit('setStatusMenu', !vuexContext.getters.getStatusMenu)
  }
}
