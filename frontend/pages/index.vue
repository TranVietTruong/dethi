<template>
  <div>
    <v-sheet :class="isMobile ? '' : 'pa-5'">
      <h1 :class="isMobile ? 'text-center pa-2 headline':'headline'">
        ĐỀ THI
      </h1>
      <v-row id="index">
        <v-col
          v-for="n in 5"
          :key="n"
          class="mb-2 test"
          cols="6"
          lg="3"
          md="4"
          sm="6"
          xs="6"
        >
          <v-card>
            <v-img src="/dethi.jpg" />
            <v-card-subtitle class="pb-0">
              Đề thi lập trình hướng đối tượng
            </v-card-subtitle>
            <v-card-text class="pb-0">
              <v-row class="pr-2 pl-2 mt-2 mb-2" align="center" justify="space-around">
                <div>
                  <v-icon small>
                    mdi-eye-outline
                  </v-icon>
                  <span>256</span>
                </div>
                <div>
                  <v-icon small>
                    mdi-comment-processing-outline
                  </v-icon>
                  <span>256</span>
                </div>
                <div>
                  <v-icon small>
                    mdi-download
                  </v-icon>
                  <span>256</span>
                </div>
              </v-row>
            </v-card-text>

            <v-card-actions class="d-flex justify-space-between">
              <v-btn
                text
                width="47%"
                height="25"
                x-small
                outlined
                color="deep-orange"
              >
                <v-icon small left>
                  mdi-heart-outline
                </v-icon>
                like
              </v-btn>

              <v-btn
                text
                x-small
                height="25"
                outlined
                color="primary"
              >
                <v-icon small left>
                  mdi-facebook
                </v-icon>
                share
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-sheet>
    <v-sheet :class="isMobile ? 'mt-5' : 'pa-5 mt-5'">
      <h1 :class="isMobile ? 'text-center pa-2 headline':'headline'">
        BÀI TẬP LỚN, TÀI LIỆU
      </h1>
      <v-row id="index">
        <v-col
          v-for="n in 5"
          :key="n"
          class="mb-2 test"
          cols="6"
          lg="3"
          md="4"
          sm="6"
          xs="6"
        >
          <v-card>
            <v-img src="/dethi.jpg" />
            <v-card-subtitle class="pb-0">
              Đề thi lập trình hướng đối tượng
            </v-card-subtitle>
            <v-card-text class="pb-0">
              <v-row class="pr-2 pl-2 mt-2 mb-2" align="center" justify="space-around">
                <div>
                  <v-icon small>
                    mdi-eye-outline
                  </v-icon>
                  <span>256</span>
                </div>
                <div>
                  <v-icon small>
                    mdi-comment-processing-outline
                  </v-icon>
                  <span>256</span>
                </div>
                <div>
                  <v-icon small>
                    mdi-download
                  </v-icon>
                  <span>256</span>
                </div>
              </v-row>
            </v-card-text>

            <v-card-actions class="d-flex justify-space-between">
              <v-btn
                text
                width="47%"
                height="25"
                x-small
                outlined
                color="deep-orange"
              >
                <v-icon small left>
                  mdi-heart-outline
                </v-icon>
                like
              </v-btn>

              <v-btn
                text
                x-small
                height="25"
                outlined
                color="primary"
              >
                <v-icon small left>
                  mdi-facebook
                </v-icon>
                share
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-sheet>
  </div>
</template>

<script>
export default {
  layout: 'error',
  methods: {
  }
}
</script>

<style>
#index span {
  font-size: 10px;
}
</style>
