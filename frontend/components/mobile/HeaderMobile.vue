<template>
  <div>
    <v-app-bar clipped-left app color="white" flat>
      <v-app-bar-nav-icon @click.stop="statusMenu = !statusMenu" />
      <v-row justify="center" align="center">
        <v-img
          class="mx-2"
          src="https://i.imgur.com/qgGY4tB.png"
          max-height="40"
          max-width="40"
          contain
        />
      </v-row>
      <v-btn icon @click="statusSearch = !statusSearch">
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
    </v-app-bar>

    <VNavigationDrawer
      v-model="statusMenu"
      app
      left
      fixed
      width="100%"
      height="100vh"
      temporary
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
          <v-list-item-action>
            <v-btn @click="statusMenu = !statusMenu" icon>
              <v-icon>
                mdi-close
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

    <VNavigationDrawer
      v-model="statusSearch"
      app
      clipped
      right
      fixed
      height="100vh"
      width="100%"
      temporary
    >
      <v-row class="pr-2 pl-2 pt-2">
        <v-col cols="4" class="pr-0">
          <v-select
            v-model="defaultTypeSearch"
            class="type_search"
            :items="typeSearch"
            flat
            dense
            hide-details
            outlined
          />
        </v-col>
        <v-col cols="8">
          <v-text-field
            class="search"
            flat
            dense
            hide-details
            outlined
            append-icon="mdi-magnify"
            placeholder="Tìm kiếm ..."
          />
        </v-col>
      </v-row>
    </VNavigationDrawer>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  data () {
    return {
      statusSearch: false,
      statusMenu: false
    }
  },
  computed: {
    ...mapGetters({
      navigations: 'config/app/getNavigations',
      typeSearch: 'config/app/getTypeSearch',
      defaultTypeSearch: 'config/app/getDefaultTypeSearch'
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
