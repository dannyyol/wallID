<template>
    <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-bell mx-0"></i>
            <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
            
            <router-link to="/notifications" class="dropdown-item preview-item" v-for="n in notifications" :key="n.id">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                        <b style="text-transform:capitalize"> {{ n.data.title.charAt(0) }} </b>
                    </div>
                </div>
                <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">{{n.data.title}}</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                        {{ n.created_at | moment("from", "now", true) }} ago
                    </p>
                </div>
            </router-link>
        </div>
    </li>
</template>

<script>
export default {
    data() {
        return {
            notifications: [],
        };
    },
    methods: {
        loadUnread() {
            axios.get('/api/users/notifications')
                .then((response) => {
                    this.notifications = response.data.data;
                })
                .catch((e) => {
                    
                })
        },

    },
    created() {
       this.loadUnread();
    }
};
</script>
