<template>
  <v-app-bar app color="white" flat>
    <v-container class="py-0 fill-height">
      <v-avatar class="mr-10" color="grey darken-1" size="32" />
      <v-select
        v-model="type"
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
      <Login v-if="!authenticated" />
      <User v-if="authenticated" />
      <Notification />
    </v-container>
  </v-app-bar>
</template>

<script>
import Notification from '@/components/Notification'
import Login from '@/components/Login'
import User from '@/components/User'

import { mapGetters } from 'Vuex'
export default {
  components: {
    Notification,
    Login,
    User
  },
  data () {
    return {
      type: {
        text: 'Đề thi',
        value: 1
      }
    }
  },
  computed: {
    ...mapGetters({
      typeSearch: 'config/app/getTypeSearch',
      authenticated: 'auth/user/authenticated'
    })
  }
}
</script>

<style>
  .type_search {
    max-width: 150px !important;
  }
</style>
