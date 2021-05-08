<template>
  <v-app-bar clipped-left app color="white" flat>
    <v-app-bar-nav-icon @click="toggleMenu" />
    <v-row justify="center" align="center">
      <v-img
        class="mx-2"
        src="https://i.imgur.com/qgGY4tB.png"
        max-height="40"
        max-width="40"
        contain
      />
    </v-row>
    <v-btn icon @click="toggleSearch">
      <v-icon>mdi-magnify</v-icon>
    </v-btn>
  </v-app-bar>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  data () {
    return {
      status: false
    }
  },
  methods: {
    ...mapActions({
      toggleMenu: 'config/headerMobile/toggleMenu',
      toggleSearch: 'config/headerMobile/toggleSearch'
    })
  }
}
</script>
