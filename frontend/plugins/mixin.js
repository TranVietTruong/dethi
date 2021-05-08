import Vue from 'vue'

Vue.mixin({
  ssr: false,
  computed: {
    isMobile () {
      return this.$vuetify.breakpoint.xsOnly
    }
  }
})
