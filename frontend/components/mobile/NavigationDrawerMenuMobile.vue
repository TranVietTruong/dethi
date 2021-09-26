<template>
  <VNavigationDrawer
    v-model="status"
    app
    left
    fixed
    width="100%"
    height="100vh"
    overlay-opacity="0"
    class="mt-14"
  >
    <template v-slot:prepend>
      <v-list-item v-if="authenticated">
        <v-avatar class="mr-2" color="primary" size="36">
          <img :src="user.avatar">
        </v-avatar>

        <v-list-item-content>
          <v-list-item-title>{{ user.name }}</v-list-item-title>
        </v-list-item-content>
        <v-list-item-action>
          <v-btn icon>
            <v-icon>
              mdi-bell
            </v-icon>
          </v-btn>
        </v-list-item-action>
      </v-list-item>
      <div v-if="!authenticated" class="d-flex justify-start pa-2">
        <v-btn width="100%" outlined small color="red darken-4" @click="login('google')">
          <v-icon left small color="red darken-4">
            mdi-google-plus
          </v-icon>
          Đăng nhập với Google
        </v-btn>
      </div>
    </template>

    <v-divider />

    <v-list v-if="authenticated" dense>
      <v-list-item
        v-for="(navigation, index) in navigations"
        :key="index"
        :to="navigation.to"
        link
        exact
      >
        <v-list-item-icon>
          <v-icon>{{ navigation.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ navigation.name }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-list-item @click="logout()">
        <v-list-item-icon>
          <v-icon> mdi-account-arrow-right </v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>Đăng xuất</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </VNavigationDrawer>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  props: {
    status: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {

    }
  },
  computed: {
    ...mapGetters({
      navigations: 'config/app/getNavigations'
    })
  },
  methods: {
    ...mapActions({
      getUrl: 'auth/user/getUrl',
      logout: 'auth/user/logout'
    }),
    login (provider) {
      this.getUrl({ provider }).then((result) => {
        window.location.href = result.data
      })
    }
  }
}
</script>
