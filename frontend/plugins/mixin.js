import Vue from 'vue'

import { mapGetters } from 'Vuex'
Vue.mixin({
  ssr: false,
  computed: {
    ...mapGetters({
      authenticated: 'auth/user/authenticated',
      user: 'auth/user/user'
    }),
    isMobile () {
      return this.$vuetify.breakpoint.xsOnly
    }
  }
})
