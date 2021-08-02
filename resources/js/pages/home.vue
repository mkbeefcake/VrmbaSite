<template>
  <div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
              <card style="background:#f9b200; height=150px">

                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="icon-pencil white font-large-2 float-left"></i>
                  </div>
                  <div class="media-body white text-left">
                    <h3 style="margin-bottom:0px">Host New Experience</h3>
                    <span>Set up a new experience</span>
                  </div>
                </div>
              </card>

              <card style="background:#9b59b6; height=150px">
                <h3 style="margin-bottom:0px">Schedule Experience</h3>
                <span>Plan your experiences</span>
              </card>
            </div>
        </div>
        <div class="col-lg-3">
            <card style="background:#664ee6; height=320px">
              Join Experience
            </card>
        </div>
        <div class="col-lg-5">
            <card>
                <custom-calendar></custom-calendar>
            </card>
        </div>
    </div>
  </div>
</template>

<script>
import CustomCalendar from '~/components/CustomCalendar'
export default {
  middleware: 'auth',

  components: {
      CustomCalendar,
  },

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
