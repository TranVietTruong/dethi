<template>
  <v-menu
    offset-y
    transition="scroll-y-transition"
    :close-on-click="closeOnContentClick"
    :close-on-content-click="closeOnContentClick"
  >
    <template v-slot:activator="{ on }">
      <div>
        <v-avatar class="mr-1" color="primary" size="40">
          <img :src="user.avatar">
        </v-avatar>
        <v-btn text small v-on="on">
          {{ user.name }}
        </v-btn>
      </div>
    </template>
    <v-card class="pa-4">
      <v-list dense color="transparent">
        <v-list-item
          v-for="(navigation,index) in navigations"
          :key="index"
          :to="navigation.to"
          link
          exact
        >
          <v-list-item-icon>
            <v-icon v-text="navigation.icon" />
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{ navigation.name }}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="logout()">
          <v-list-item-icon>
            <v-icon> mdi-account-arrow-right </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              Đăng xuất
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-card>
  </v-menu>
</template>

<script>
import { mapGetters, mapActions } from 'Vuex'
export default {
  data () {
    return {
      closeOnClick: false,
      closeOnContentClick: false
    }
  },
  computed: {
    ...mapGetters({
      navigations: 'config/app/getNavigations',
      user: 'auth/user/user'
    })
  },
  methods: {
    ...mapActions({
      logout: 'auth/user/logout'
    })
  }
}
</script>

<style>

</style>
