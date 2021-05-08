export const actions = {
  async nuxtServerInit ({ dispatch }, context) {
    await dispatch('auth/user/getUser', { access_token: this.$cookies.get('access_token') }, { root: true })
  }
}
