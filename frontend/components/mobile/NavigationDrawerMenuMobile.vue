<template>
  <VNavigationDrawer
    v-model="navigationDrawerMenu"
    app
    clipped
    left
    absolute
    width="100%"
    overlay-opacity="0"
    class="mt-14"
  >
    <template v-slot:prepend>
      <v-list-item v-if="1">
        <v-avatar class="mr-2" color="primary" size="36">
          <span class="white--text subtitle-2">tr</span>
        </v-avatar>

        <v-list-item-content>
          <v-list-item-title>Trần Viết Trưởng</v-list-item-title>
        </v-list-item-content>
        <v-list-item-action>
          <v-btn icon>
            <v-icon>
              mdi-bell
            </v-icon>
          </v-btn>
        </v-list-item-action>
        <v-list-item-action>
          <v-btn outlined x-small>
            Đăng xuất
          </v-btn>
        </v-list-item-action>
      </v-list-item>
      <div v-if="0" class="d-flex justify-space-between pa-2">
        <v-btn width="50%" outlined small color="indigo accent-4">
          <v-icon left small color="indigo accent-4">
            mdi-facebook
          </v-icon>
          Facebook
        </v-btn>
        <v-btn width="50%" outlined small color="red darken-4">
          <v-icon left small color="red darken-4">
            mdi-google-plus
          </v-icon>
          Google
        </v-btn>
      </div>
    </template>

    <v-divider />

    <v-list dense>
      <v-list-item v-for="item in navigations" :key="item.title" link>
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ item.name }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </VNavigationDrawer>
</template>

<script>
import { mapGetters} from 'vuex'
export default {
  data () {
    return {

    }
  },
  computed: {
    ...mapGetters({
      navigationDrawerMenu: 'config/headerMobile/getStatusMenu',
      navigations: 'config/app/getNavigations'
    })
  }
}
</script>
