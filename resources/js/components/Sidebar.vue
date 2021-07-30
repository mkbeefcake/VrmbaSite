<template>
<div id="sidebar" v-if="user" class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <img src="http://localhost:8000/black/img/title-avatar.png" alt="bonVR" data-nsfw-filter-status="sfw" style="visibility: visible; margin-top:20px; margin-left:20px">
        </div>
        <div>
            <ul class="nav sidebar-nav" id="menuList">
                <div style="height:60px"></div>
                <li v-on:click="onMenuSelected($event)" id="Dashboard">
                    <router-link :to="{ name: 'home' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </router-link>
                </li>
                <div style="height:30px"></div>
                <li v-on:click="onMenuSelected($event)" id="Chat">
                    <router-link :to="{ name: 'chat' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-comment"></i> Chat
                    </router-link>
                </li>
                <li v-on:click="onMenuSelected($event)" id="Groups">
                    <router-link :to="{ name: 'groups' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-users"></i> Groups
                    </router-link>
                </li>
                <li v-on:click="onMenuSelected($event)" id="Files">
                    <router-link :to="{ name: 'files' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-file"></i> Files
                    </router-link>
                </li>
                <div style="height:30px"></div>
                <li v-on:click="onMenuSelected($event)" id="Contacts">
                    <router-link :to="{ name: 'contacts' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-user"></i> Contacts
                    </router-link>
                </li>
                <li v-on:click="onMenuSelected($event)" id="Calendar">
                    <router-link :to="{ name: 'calendar' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-calendar"></i> Callender
                    </router-link>
                </li>
                <li v-on:click="onMenuSelected($event)" id="Schedule">
                    <router-link :to="{ name: 'meeting' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-video"></i> Schedule
                    </router-link>                        
                </li>
                <div style="height:30px"></div>
                <li v-on:click="onMenuSelected($event)" id="Settings">                    
                    <router-link :to="{ name: 'settings' }" class="nav-link" active-class="active">
                        <i class="fa fa-fw fa-cog"></i> Settings
                    </router-link>
                </li>
                <li>
                    <a href="#" class="nav-link" @click.prevent="logout">                    
                        <i class="fa fa-fw fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    appName: window.config.appName
  }),
  computed: mapGetters({
    user: 'auth/user'
  }),
  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    onMenuSelected: function(event){
        // console.log(event);

        var menulist = document.getElementById("menuList").getElementsByTagName("li");
        for (let i = 0; i < menulist.length; i++) {
            menulist[i].classList.remove('active');
        }
        event.target.parentElement.classList.add('active');
    },
  }
}


</script>

