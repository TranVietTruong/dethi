<template>
  <v-overlay>
    <v-progress-circular
      indeterminate
      size="64"
    ></v-progress-circular>
  </v-overlay>
</template>

<script>
import { mapActions } from 'Vuex'
export default {
  middleware: ['isAuth', 'matchRoute'],
  layout: 'empty',
  data () {
    return {
      provider: this.$route.params.provider,
      query: this.$route.fullPath.replace(this.$route.path, '')
    }
  },
  methods: {
    ...mapActions({
      attempt: 'auth/user/attempt'
    })
  },
  mounted () {
    this.attempt({ provider: this.provider, query: this.query }).then((result) => {
      this.$router.push({ path: '/' })
    })
  }
}
</script>
