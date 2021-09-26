export const state = () => ({
  access_token: null,
  user: null
})

export const getters = {
  authenticated (state) {
    if (state.access_token == null && state.user == null) {
      return false
    }
    return true
  },
  user (state) {
    return state.user
  }
}

export const mutations = {
  setToken (state, token) {
    state.access_token = token
  },
  setUser (state, user) {
    state.user = user
  }
}

export const actions = {
  async getUrl (vuexContext, params) {
    const result = await this.$axios.$get('/auth/' + params.provider + '/url')
    return result
  },
  async attempt (vuexContext, params) {
    const result = await this.$axios.$get('/auth/' + params.provider + '/callback' + params.query)
    await vuexContext.dispatch('getUser', { access_token: result.data })
    return true
  },
  async getUser (vuexContext, params) {
    if (params.access_token) {
      vuexContext.commit('setToken', params.access_token)
    }
    if (!vuexContext.state.access_token) {
      vuexContext.commit('setUser', null)
      this.$axios.defaults.headers.common.Authorization = null
      this.$cookies.remove('access_token')
      return
    }
    const config = {
      headers: {
        Authorization: 'Bearer ' + params.access_token
      }
    }
    await this.$axios.$get('/auth/me', config).then((result) => {
      vuexContext.commit('setUser', result.data)

      this.$axios.onRequest((config) => {
        config.headers.common.Authorization = 'Bearer ' + params.access_token
      })

      this.$cookies.set('access_token', params.access_token)
    }).catch(() => {
      vuexContext.commit('setUser', null)
      vuexContext.commit('setToken', null)
      this.$axios.defaults.headers.common.Authorization = null
      this.$cookies.remove('access_token')
    })
  },
  async logout (vuexContext) {
    await this.$axios.$get('/auth/logout').then((result) => {
      vuexContext.commit('setToken', null)
      vuexContext.commit('setUser', null)

      this.$axios.onRequest((config) => {
        config.headers.common.Authorization = null
      })

      this.$cookies.remove('access_token')
      this.$router.push({ path: '/' })
    })
  }
}
