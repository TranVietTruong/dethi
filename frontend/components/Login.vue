<template>
  <v-menu
    offset-y
    nudge-left="150"
    transition="scroll-y-transition"
    :close-on-click="closeOnContentClick"
    :close-on-content-click="closeOnContentClick"
  >
    <template v-slot:activator="{ on }">
      <v-btn outlined small class="ml-5" v-on="on">
        Đăng nhập
      </v-btn>
    </template>
    <v-card class="pa-4">
      <div>
        <v-btn
          class="pa-3"
          width="250"
          outlined
          x-small
          color="indigo accent-4"
          @click="test()"
        >
          Đăng nhập bằng Facebook <v-icon small right>
            mdi-facebook
          </v-icon>
        </v-btn>
      </div>
      <div class="mt-3">
        <v-btn
          class="pa-3"
          width="250"
          outlined
          x-small
          color="red darken-4"
          @click="login('google')"
        >
          Đăng nhập bằng Google <v-icon small right>
            mdi-google
          </v-icon>
        </v-btn>
      </div>
    </v-card>
  </v-menu>
</template>
<script>
import { mapActions } from 'vuex'
export default {
  data () {
    return {
      closeOnClick: false,
      closeOnContentClick: false
    }
  },
  methods: {
    ...mapActions({
      getUrl: 'auth/user/getUrl'
    }),
    login (provider) {
      this.getUrl({ provider }).then((result) => {
        window.location.href = result.data
      })
    },
    test () {
      this.$router.push({ path: 'exam/123' })
    }
  }
}
</script>
