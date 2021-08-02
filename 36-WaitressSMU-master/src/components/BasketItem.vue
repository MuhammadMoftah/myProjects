<template>
   <aside
      class="basket-item column q-pt-sm"
      style="flex: auto; border-bottom: 1px solid #ededed"
   >
      <div class="justify-between row q-mx-sm q-mt-xs">
         <p class="no-margin text-capitalize">
            <span class="block text-bold text-subtitle2 text-blue-grey-9">
               {{ item.name }}
            </span>
            <span
               v-for="(variation, i) in item.product_variation"
               :key="variation.name"
               class="inline text-grey-7 text-bold text-caption"
            >
               <span v-if="i">,</span>
               <span v-for="option in variation.options" :key="option.id">
                  {{ option.name }}
               </span>
            </span>
         </p>
         <p class="text-bold text-subtitle2 text-blue-grey-9">
            {{ (item.total / 100).toFixed(2) }} EGP
         </p>
      </div>
      <!-- Note  -->
      <div class="q-px-sm" v-if="note.length">
         <span class="roboto text-blue-grey-9"> Note: </span>
         <span class="text-grey-7">{{ note }}</span>
      </div>
      <div class="items-center justify-between row">
         <q-btn
            dense
            flat
            color="red-8"
            unelevated
            padding="sm"
            icon="delete"
            @click="removeFromBasket"
         />

         <q-btn
            class="text-grey-8 q-mt-sm"
            flat
            dense
            no-caps
            @click="noteDialog = true"
         >
            <template slot="default">
               <q-icon name="description" size="xs" />
               <span class="roboto"> Add Note </span>
            </template>
         </q-btn>

         <q-btn-group flat>
            <q-btn
               outline
               color="grey-8"
               @click="editQuantity(item.quantity - 1)"
               icon="remove"
               flat
               padding="xs"
            />
            <q-btn color="blue-grey-9" outline flat :label="item.quantity" />
            <q-btn
               outline
               color="grey-8"
               @click="editQuantity(item.quantity + 1)"
               icon="add"
               flat
               padding="xs"
            />
         </q-btn-group>
      </div>

      <q-dialog v-model="noteDialog" persistent>
         <q-card class="q-dialog-plugin">
            <q-card-section>
               <q-input
                  color="blue-grey-8"
                  class="q-my-md"
                  v-model="note"
                  label="Add Note"
                  dense
                  maxlength="255"
                  counter
               />
            </q-card-section>
            <!-- buttons example -->
            <q-card-actions align="right">
               <q-btn
                  color="grey-8"
                  outline
                  label="Cancel"
                  @click="cancelNote()"
                  dense
                  no-caps
               />
               <q-btn
                  color="blue-9"
                  outline
                  dense
                  :loading="loading === 'note'"
                  label="Add note"
                  @click="addNote"
                  no-caps
               />
            </q-card-actions>
         </q-card>
      </q-dialog>
      <q-inner-loading :showing="loading">
         <q-spinner-tail color="primary" size="3em" />
      </q-inner-loading>
   </aside>
</template>

<script>
export default {
   props: {
      item: {
         default: function () {
            return {};
         },
         type: Object,
      },
   },
   data: () => ({
      loading: false,
      note: "",
      noteDialog: false,
   }),
   computed: {
      table({ $store }) {
         const table = $store.state.tables.activeTable;
         return table;
      },
   },
   mounted() {
      if (this.item.note) {
         this.note = this.item.note;
      }
   },
   methods: {
      async editQuantity(quantity) {
         if (quantity === 0) {
            this.removeFromBasket();
            return;
         }
         try {
            this.loading = true;
            const res = await this.$axios.patch(
               `tables/${this.table.id}/cart/` + this.item.cart_id,
               {
                  id: this.item.id,
                  quantity: quantity,
               }
            );
            this.$store.commit("basket/updateBasket", res.data.data);

            this.loading = false;
         } catch (e) {
            this.loading = false;
         }
      },
      async removeFromBasket() {
         try {
            this.loading = true;

            const res = await this.$axios.delete(
               `tables/${this.table.id}/cart/` + this.item.cart_id
            );
            this.$store.commit("basket/updateBasket", res.data.data);
            this.loading = false;
         } catch (e) {
            this.loading = false;
         }
      },
      cancelNote() {
         this.note = "";
         this.noteDialog = false;
      },
      async addNote() {
         this.loading = "note";

         try {
            this.loading = true;
            const res = await this.$axios.patch(
               `tables/${this.table.id}/cart/` + this.item.cart_id,
               {
                  id: this.item.id,
                  note: this.note,
               }
            );
            this.$store.commit("basket/updateBasket", res.data.data);

            this.loading = false;
            this.noteDialog = false;
         } catch (e) {
            this.loading = false;
            this.noteDialog = false;
         }
      },
   },
};
</script>

<style scoped>
.items-container {
   height: calc(100vh - 50px) !important;
   width: 100%;
}
.basket-item {
   position: relative;
}
</style>