<template>
  <v-footer
    dark
    padless
  >
    <v-container>
      <v-row>
        <v-col lg="4" cols="12">
          <div class="sub-title1">
            GIỚI THIỆU
          </div>
          <v-divider class="mt-2 mb-2" />
          <v-img
            class="mx-2"
            src="https://i.imgur.com/qgGY4tB.png"
            max-height="40"
            max-width="40"
            contain
          />
          <p class="caption mt-2">
            Blog chia sẽ các thông tin hữu ích về tin học, chia sẽ tài liệu, giáo trình, các thủ thuật hay về CNTT...
          </p>
          <p class="caption">
            Blog được thiết kế bởi dethihaui.com
          </p>
        </v-col>
        <v-col lg="4" cols="12">
          <div class="sub-title1">
            LIÊN HỆ
          </div>
          <v-divider class="mt-2 mb-2" />
          <div class="mt-2">
            <v-icon color="indigo accent-4" small>
              mdi-facebook
            </v-icon>
            <span class="caption">facebook</span>
          </div>
          <div class="mt-2">
            <v-icon color="red darken-4" small>
              mdi-youtube
            </v-icon>
            <span class="caption">youtube</span>
          </div>
          <div class="mt-2">
            <v-icon small>
              mdi-gmail
            </v-icon>
            <span class="caption">tranviettruong1998@gmail.com</span>
          </div>
          <v-row class="mt-1">
            <v-col lg="9">
              <v-text-field
                class="search"
                flat
                dense
                hide-details
                height="30"
                outlined
                placeholder="Góp ý"
              />
            </v-col>
            <v-col lg="3">
              <v-btn outlined dense small>
                submit
              </v-btn>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
    <v-card class="pt-3 pl-3" width="100%">
      <p class="caption">
        Bản quyền thuộc về dethihaui.com
      </p>
    </v-card>
  </v-footer>
</template>
<script>
export default {

}
</script>
<style>

</style>
