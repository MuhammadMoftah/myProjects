<template>
  <q-list class="text-blue-grey-9 text-bold">
    <q-card class="text-white my-card bg-primary" square>
      <q-card-section horizontal class="q-py-sm">
        <q-avatar size="65px" class="q-mx-md">
          <q-img
            src="https://previews.123rf.com/images/asmati/asmati1610/asmati161000408/63831624-user-avatar-illustration-anonymous-sign-white-icon-on-red-circle-.jpg"
            style="border-radius: 50%"
          />
        </q-avatar>
        <div class="self-center">
          <div class="text-h6 roboto text-bold">{{ $t("hello") }}</div>
          <!-- new feature to add  -->
          <div
            v-if="false"
            class="text-subtitle2 roboto text-bold"
            style="text-decoration: underline"
          >
            {{ $t("view_profile") }}
          </div>
        </div>
      </q-card-section>
    </q-card>

    <!-- new feature to add  -->
    <div class="flex justify-around q-my-md" v-if="false">
      <q-btn
        color="primary"
        class="roboto"
        style="width: 120px"
        label="Sign in"
        outline
        no-caps
      />
      <q-btn
        color="primary"
        class="roboto"
        unelevated
        style="width: 120px"
        label="Register"
        no-caps
      />
    </div>

    <div class="bg-white q-my-md q-mx-md">
      <q-item
        clickable
        to="/"
        exact
        style="border-bottom: 1px solid #e3e3e3"
        v-ripple:grey
      >
        <q-item-section avatar class="text-blue-grey-9">
          <q-icon name="language" />
        </q-item-section>

        <q-item-section>
          <q-item-label>{{ $t("language") }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item
        v-ripple:grey
        clickable
        to="/menus"
        exact
        style="border-bottom: 1px solid #e3e3e3"
      >
        <q-item-section avatar class="text-blue-grey-9">
          <q-icon name="fastfood" />
        </q-item-section>

        <q-item-section>
          <q-item-label>{{ $t("menu") }}</q-item-label>
        </q-item-section>
      </q-item>
      <q-item
        v-ripple:grey
        clickable
        to="/receipt"
        exact
        style="border-bottom: 1px solid #e3e3e3"
      >
        <q-item-section avatar class="text-blue-grey-9">
          <q-icon name="assignment" />
        </q-item-section>

        <q-item-section>
          <q-item-label>{{ $t("my_orders") }}</q-item-label>
        </q-item-section>
      </q-item>

      <q-item
        v-if="meData.shareLink && false"
        v-ripple:grey
        clickable
        exact
        @click="shareCard = true"
        style="border-bottom: 1px solid #e3e3e3"
        class="text-capitalize"
      >
        <q-item-section avatar class="text-blue-grey-9">
          <q-icon name="groups" />
        </q-item-section>

        <q-item-section>
          <q-item-label>{{ $t("create_order_group") }}</q-item-label>
        </q-item-section>
      </q-item>

      <!-- share link dialog  -->
      <q-dialog v-model="shareCard">
        <q-card class="my-card q-pt-lg" flat style="max-width: 500px">
          <q-img
            src="~/assets/share.svg"
            ratio="1.3"
            class="q-mx-auto block"
            width="100%"
            contain
          />

          <q-card-section>
            <q-btn
              fab
              color="primary"
              icon="groups"
              class="absolute"
              style="top: 0; right: 12px; transform: translateY(-50%)"
            />

            <div class="row no-wrap items-center">
              <div class="col text-h6 ellipsis">
                {{ $t("get_sharable_link") }}
              </div>
            </div>
          </q-card-section>

          <q-card-section class="q-pt-none">
            <div class="text-subtitle1 text-grey-7">
              {{ $t("sharable_link_info") }}
            </div>
          </q-card-section>

          <q-separator />

          <q-card-actions align="right">
            <q-btn
              flat
              color="primary"
              label="Copy link"
              @click="copyLink(meData.shareLink)"
            />
            <q-btn v-close-popup flat color="grey-8" label="Cancel" />
          </q-card-actions>
        </q-card>
      </q-dialog>
      <!-- new feature to add  -->
      <q-item
        v-if="false"
        v-ripple:grey
        clickable
        to="/orders-history"
        exact
        style="border-bottom: 1px solid #e3e3e3"
      >
        <q-item-section avatar class="text-blue-grey-9">
          <q-icon name="alarm" />
        </q-item-section>

        <q-item-section>
          <q-item-label> Orders History </q-item-label>
        </q-item-section>
      </q-item>
    </div>
    <!-- new feature -->
    <div class="flex justify-around q-my-md q-px-md" v-if="false">
      <q-btn
        class="full-width"
        label="Call Waiter"
        icon="record_voice_over"
        outline
        no-caps
        @click="play()"
      />
    </div>
  </q-list>
</template>

<script>
export default {
  name: "SideNav",

  data() {
    return {
      shareCard: false,
      notiSound: new Audio(require("assets/notification.mp3")),
    };
  },
  computed: {
    meData() {
      return this.$store.state.general.meData;
    },
  },
  methods: {
    play() {
      this.notiSound.play();
    },
    copyLink(text) {
      var dummy = document.createElement("textarea");
      document.body.appendChild(dummy);
      dummy.value = text;
      dummy.select();
      document.execCommand("copy");
      document.body.removeChild(dummy);
      this.shareCard = false;
      this.$q.notify({
        position: "top",
        type: "positive",
        icon: "groups",
        color: "green-5",
        message: "Link copied, Enjoy with your friends ",
        classes: "q-mt-xl text-body1",
      });
    },
  },
};
</script>

s
