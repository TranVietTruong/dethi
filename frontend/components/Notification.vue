<template>
  <v-menu
    min-width="400"
    max-width="400"
    max-height="600"
    left
    origin="bottom"
    offset-y
    transition="scale-transition"
    :close-on-click="closeOnContentClick"
    :close-on-content-click="closeOnContentClick"
  >
    <template v-slot:activator="{ on }">
      <v-btn icon v-on="on">
        <v-icon>mdi-bell</v-icon>
      </v-btn>
    </template>
    <v-card min-width="400" max-width="400" max-height="600">
      <v-list dense>
        <v-list-item>
          <v-list-item-title>
            Thông báo
          </v-list-item-title>
          <v-list-item-action-text>
            <v-btn icon>
              <v-icon>mdi-dots-horizontal</v-icon>
            </v-btn>
          </v-list-item-action-text>
        </v-list-item>
      </v-list>
      <v-divider />
      <v-list three-line dense>
        <template v-for="item in test">
          <v-list-item :key="item.title" link>
            <v-list-item-avatar>
              <v-img :src="item.avatar" />
            </v-list-item-avatar>
            <v-list-item-content>
              <span class="subtitle-2" v-html="item.subtitle" />
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-card>
  </v-menu>
</template>

<script>
export default {
  data () {
    return {
      closeOnClick: false,
      closeOnContentClick: false,
      test: [
        {
          avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
          title: 'Brunch this weekend?',
          subtitle: '<span class="text--primary">Ali Connors</span> &mdash; I\'ll be in your neighborhood doing errands this weekend. Do you want to hang out?'
        }
      ]
    }
  }
}
</script>
