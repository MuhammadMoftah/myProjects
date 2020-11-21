import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import colors from 'vuetify/es5/util/colors'
import '~/stylus/main.styl'

Vue.use(Vuetify, {
  theme: {
    // primary: '#673AB7',
    // accent: '#FF4081',
    // darkPrimary: '#512DA8',
    // lightPrimary: '#D1C4E9',
    primary: '#ED5101',
    accent: '#607D8B',
    darkPrimary: '#E64A19',
    lightPrimary: '#FFCCBC',
    contrast: '#FFFFFF',
    primaryText: '#212121',
    secondaryText: '#757575',
    divider: '#BDBDBD',
    secondary: colors.amber.darken3,
    info: colors.teal.lighten1,
    warning: colors.amber.base,
    error: colors.deepOrange.accent4,
    success: colors.green.accent3
  }
})
