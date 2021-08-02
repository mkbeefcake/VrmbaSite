import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
    meetings: null,
}

// getters
export const getter = {
}

// mutations
export const mutations = {
     
}

// actions
export const actions = {

  async fetchAllMeeting ({ commit }) {
    try {
      const { data } = await axios.get('/api/meeting')

    } catch (e) {

    }
  }

}