import Vue from 'vue'
import JsonExcel from 'vue-json-excel'
import JsPDF from 'jspdf'
import * as VueGoogleMaps from 'vue2-google-maps'
require('jspdf-autotable')

Vue.use(VueGoogleMaps, {
  load: {
    // key: 'AIzaSyDDExT_cEBc7iFq41uNodErtD5Quex8QqU',
    key: 'AIzaSyBs-ZGmGZNR9EXaIoaUc3COfsOBpHPYG08',
    libraries: 'places'
  }
})

Vue.component('DownloadExcel', JsonExcel)

Vue.mixin({
  methods: {
    generateExcelHeaders(headers) {
      if (!headers || headers.length === 0) return false
      const obj = {}
      headers.forEach(item => {
        if (item.text === 'Actions') return
        obj[item.text] = item.value
      })
      return obj
    },
    generatePDF(data, headers, name) {
      if (!data || data.length === 0) return false
      const pdfName = name || 'PDF'
      const doc = new JsPDF()
      const cols =
        headers
          .filter(item => item.text !== 'Actions')
          .map(item => ({ title: item.text, dataKey: item.value })) ||
        Object.keys(data[0]).map(item => ({ title: item, dataKey: item }))
      doc.autoTable(cols, data)
      doc.save(pdfName + '.pdf')
    }
  }
})
