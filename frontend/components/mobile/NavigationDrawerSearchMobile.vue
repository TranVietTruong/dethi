<template>
  <div id="navigationDrawerSearch">
    <VNavigationDrawer
      v-model="navigationDrawerSearch"
      app
      clipped
      right
      absolute
      height="60"
      width="100%"
      overlay-opacity="0"
      class="mt-14"
    >
      <v-row class="pr-2 pl-2 pt-2">
        <v-col cols="4">
          <v-select
            v-model="defaultTypeSearch"
            class="type_search"
            :items="typeSearch"
            flat
            dense
            height="35"
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
            height="35"
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
import { mapGetters } from 'vuex'
export default {
  data () {
    return {
    }
  },
  computed: {
    ...mapGetters({
      navigationDrawerSearch: 'config/headerMobile/getStatusSearch',
      typeSearch: 'config/app/getTypeSearch',
      defaultTypeSearch: 'config/app/getDefaultTypeSearch'
    })
  }
}
</script>

<style>
  @media only screen and (max-width: 600px) {
    .v-text-field .v-input__control .v-input__slot {
      min-height: auto !important;
      display: flex !important;
      align-items: center !important;
    }
    #navigationDrawerSearch .v-text-field .v-input__control .v-input__slot {
      min-height: auto !important;
      display: flex !important;
      align-items: center !important;
    }
    #navigationDrawerSearch .search .v-input__control {
      font-size: 12px;
    }
    #navigationDrawerSearch .search .v-input__icon {
      height: 17px;
    }
    #navigationDrawerSearch .type_search .v-select__selection {
      font-size: 12px;
    }
  }
</style>
