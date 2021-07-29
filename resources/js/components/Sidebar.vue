<template>
<div id="sidebar" v-if="user" class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <img src="http://localhost:8000/black/img/title-avatar.png" alt="bonVR" data-nsfw-filter-status="sfw" style="visibility: visible; margin-top:20px; margin-left:20px">
        </div>
        <div>
            <ul class="nav sidebar-nav" id="menuList">
                <div style="height:60px"></div>
                <li onClick="onMenuSelected(this)" id="Dashboard">
                    <a href="#" class="active"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                </li>
                <div style="height:30px"></div>
                <li onClick="onMenuSelected(this)" id="Chat">
                    <a href="#"><i class="fa fa-fw fa-comment"></i> Chat</a>
                </li>
                <li onClick="onMenuSelected(this)" id="Groups">
                    <a href="#"><i class="fa fa-fw fa-users"></i> Groups</a>
                </li>
                <li onClick="onMenuSelected(this)" id="Files">
                    <a href="#"><i class="fa fa-fw fa-file"></i> Files</a>
                </li>
                <div style="height:30px"></div>
                <li onClick="onMenuSelected(this)" id="Contacts">
                    <a href="#"><i class="fa fa-fw fa-user"></i> Contacts</a>
                </li>
                <li onClick="onMenuSelected(this)" id="Calendar">
                    <a href="#"><i class="fa fa-fw fa-calendar"></i> Callender</a>
                </li>
                <li onClick="onMenuSelected(this)" id="Schedule">
                    <a href="meeting"><i class="fa fa-fw fa-video"></i> Schedule</a>
                </li>
                <div style="height:30px"></div>
                <li onClick="onMenuSelected(this)" id="Settings">
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
}

function onMenuSelected(selected) {
    console.log("Menu selected");
    var cameras = document.getElementById("menuList").getElementsByTagName("li");
    for (let i = 0; i < cameras.length; i++) {
        cameras[i].classList.remove('active');
    }    
    
    // VueStore.commit('updateSelectedMenuId', selected.id);
    selected.classList.add('active');
}    

</script>

