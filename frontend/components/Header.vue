<template>
  <v-app-bar app color="white" flat>
    <v-container class="py-0 fill-height">
      <v-avatar class="mr-10" color="grey darken-1" size="32" />
      <v-select
        v-model="defaultTypeSearch"
        class="type_search"
        :items="typeSearch"
        flat
        dense
        hide-details
        outlined
      />
      <v-text-field
        flat
        dense
        hide-details
        outlined
        height="40"
        append-icon="mdi-magnify"
        placeholder="Tìm kiếm ..."
      />
      <v-spacer />
      <Login v-if="!authenticated"/>
      <div v-if="authenticated">
        <v-avatar class="mr-1" color="primary" size="40">
          <img :src="user.avatar">
        </v-avatar>
        <v-btn text small to="/user">
          {{ user.name }}
        </v-btn>
      </div>

      <Notification />
    </v-container>
  </v-app-bar>
</template>

<script>
import Notification from '@/components/notification'
import Login from '@/components/login'
import { mapGetters } from 'vuex'
export default {
  components: {
    Notification,
    Login
  },
  data () {
    return {
    }
  },
  computed: {
    ...mapGetters({
      typeSearch: 'config/app/getTypeSearch',
      defaultTypeSearch: 'config/app/getDefaultTypeSearch',
      authenticated: 'auth/user/authenticated',
      user: 'auth/user/user'
    })
  }
}
</script>

<style>
  .type_search {
    max-width: 150px !important;
  }
</style>
