<template>
  <div>
    <VueSignaturePad
      ref="signaturePad"
      width="500px"
      height="500px"
      class="signature"
    />
    <div>
      <v-btn color="primary" dark class="mb-2" @click="save">
        Save
      </v-btn>
      <v-btn dark class="mb-2" @click="undo">
        Reset
      </v-btn>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import VueSignaturePad from 'vue-signature-pad'
Vue.use(VueSignaturePad)
export default {
  name: 'MySignaturePad',
  methods: {
    undo() {
      this.$refs.signaturePad.undoSignature()
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature()
      console.log(isEmpty)
      console.log(data)
    }
    // async saveData() {
    //   const { isEmpty, data } = this.$refs.signaturePad.saveSignature()
    //   console.log(isEmpty)
    //   console.log(data)
    //   const res = await this.$store
    //     .dispatch('tasks/newTask', this.editedItem)
    //     .catch(() => {
    //       this.buttonLoading = false
    //     })
    //   this.buttonLoading = false

    //   if (!res || res === 'error') return
    //   this.$store.dispatch('snackbar/show', {
    //     message: 'Success!',
    //     timeout: 2000,
    //     color: 'success'
    //   })
    // }
  }
}
</script>

<style lang="stylus" scoped>

.signature {
  background #fff
  box-shadow  0 .5rem 1rem rgba(0,0,0,.15)!important
}
</style>
