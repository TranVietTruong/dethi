<template>
  <div>
    <v-sheet class="pa-5">
      <h1 class="title mb-2 text-center">TẢI ĐỀ THI LÊN</h1>
      <v-form>
        <v-text-field
          label="Tiêu đề"
          prepend-icon="mdi-file-document-edit"
          placeholder="Đề thi môn lập trình hướng đối tượng - Trường ĐH CNHN - năm 2019-2020"
          outlined
        ></v-text-field>

        <v-file-input
          v-model="files"
          color="deep-purple accent-4"
          counter
          label="Chọn ảnh để tải lên"
          multiple
          prepend-icon="mdi-camera"
          outlined
          :show-size="1000"
        >
          <template v-slot:selection="{ index, text }">
            <v-chip
              v-if="index < 2"
              color="deep-purple accent-4"
              dark
              label
              small
            >
              {{ text }}
            </v-chip>

            <span
              v-else-if="index === 2"
              class="overline grey--text text--darken-3 mx-2"
            >
              +{{ files.length - 2 }} File(s)
            </span>
          </template>
        </v-file-input>
        <div class="text-center">
          <v-btn color="primary">
            TẢI LÊN
          </v-btn>
        </div>
      </v-form>
    </v-sheet>
  </div>
</template>

<script>
export default {
  layout: 'user',
  data () {
    return {
      files: []
    }
  }
}
</script>
<style>

</style>
