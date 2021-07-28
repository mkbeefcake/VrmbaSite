<div id="sidebar" class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <img src="http://localhost:8000/black/img/title-avatar.png" alt="bonVR" data-nsfw-filter-status="sfw" style="visibility: visible; margin-top:20px; margin-left:20px">
        </div>
        <div>
            <ul class="nav sidebar-nav" id="menuList">
                <div style="height:60px"></div>
                <li onClick="onMenuSelected(this)">
                    <a href="#" class="active"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                </li>
                <div style="height:30px"></div>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-comment"></i> Chat</a>
                </li>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-users"></i> Groups</a>
                </li>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-file"></i> Files</a>
                </li>
                <div style="height:30px"></div>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-user"></i> Contacts</a>
                </li>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-calendar"></i> Callender</a>
                </li>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-video"></i> Schedule</a>
                </li>
                <div style="height:30px"></div>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
                </li>
                <li onClick="onMenuSelected(this)">
                    <a href="#"><i class="fa fa-fw fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>

function onMenuSelected(selected) {
    console.log("Menu selected");
    var cameras = document.getElementById("menuList").getElementsByTagName("li");
    for (let i = 0; i < cameras.length; i++) {
        cameras[i].classList.remove('active');
    }    

    selected.classList.add('active');
}    
</script>
