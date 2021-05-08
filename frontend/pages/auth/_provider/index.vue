<template>
  <h1>Đang login</h1>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  middleware: ['isAuth', 'matchRoute'],
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
