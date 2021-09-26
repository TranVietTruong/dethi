export const state = () => ({
  typeSearch: [
    {
      text: 'Đề thi',
      value: 1
    },
    {
      text: 'BTL, Tài liệu',
      value: 2
    }
  ],
  navigations: [
    {
      name: 'TỔNG QUAN',
      icon: 'mdi-home',
      to: '/user'
    },
    {
      name: 'TẢI ĐỀ THI',
      icon: 'mdi-arrow-up-bold-box',
      to: '/user/upload-exam'
    },
    {
      name: 'TẢI TÀI LIỆU',
      icon: 'mdi-arrow-up-bold-box-outline',
      to: '#'
    },
    {
      name: 'QUẢN LÍ TÀI LIỆU',
      icon: 'mdi-file-document-edit',
      to: '#'
    }
  ]
})

export const getters = {
  getTypeSearch (state) {
    return state.typeSearch
  },
  getDefaultTypeSearch (state) {
    return state.defaultTypeSearch
  },
  getNavigations (state) {
    return state.navigations
  }
}
