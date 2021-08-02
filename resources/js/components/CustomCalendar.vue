<template>
  <div id="">
    <label class="col-form-label text-md-left" style="font-size:1rem">
        Today, Wednesday 13 October 2021.
    </label>    
    <calendar
      :eventCategories="eventCategories"
      :events="events"
      :offDays="offDays"
      ref="calendar"
    />
  </div>
</template>
<script>
// Importing Component and style
import { Calendar } from 'vue-sweet-calendar'
import 'vue-sweet-calendar/dist/SweetCalendar.css'

export default {
  name: 'YourComponentName',
  data() {
    return {
      offDays: [],
      eventCategories: [
        {
          id: 1,
          title: 'Personal',
          textColor: 'black',
          backgroundColor: '#2af597'
        },
        {
          id: 2,
          title: 'Company-wide',
          textColor: 'white',
          backgroundColor: 'red'
        }
      ],
      events: [
        {
          title: 'Event 1',
          start: '2021-07-29',
          end: '2019-07-29',
          repeat: 'never',
          categoryId: 2
        },
      ]
    }
  },
  methods: {
    goToday() {
      this.$refs.calendar.goToday()
    }
  },
  components: {
    Calendar // Registering Component
  }
}
</script>

