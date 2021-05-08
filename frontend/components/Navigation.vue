<template>
  <v-sheet class="sticky">
    <v-list color="transparent">
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
    </v-list>
  </v-sheet>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data () {
    return {
    }
  },
  computed: {
    ...mapGetters({
      navigations: 'config/app/getNavigations'
    })
  }
}
</script>

<style>
  .sticky {
    position: sticky !important;
    top: 75px !important;
  }
</style>
