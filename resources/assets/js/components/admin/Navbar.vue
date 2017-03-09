<template>
    <el-menu :router="true" theme="dark" :default-active="activeIndex" mode="horizontal" @select="handleSelect">
        <el-row type="flex" justify="center">
            <el-col :span="20">
                <li class="el-menu-item navbar-logo">后台管理系统</li>
                <el-menu-item index="/dashboard">首页</el-menu-item>
                <el-menu-item index="page1">Test Page 1</el-menu-item>
                <el-menu-item index="page2">Test Page 2</el-menu-item>
                <li class="el-menu-item navbar-user">
                    <img class="navbar-avatar" src="/img/null_avatar.png">
                    <span class="navbar-username">{{ user.username }}</span>
                </li>
            </el-col>
        </el-row>
    </el-menu>
</template>

<script>
export default {
    data() {
        return {
            activeIndex: '/dashboard',
            user: {}
        };
    },
    mounted() {
        this.user = window.User
    },
    methods: {
        handleSelect(key, keyPath) {
            console.log(key, keyPath);
        }
    }
};
</script>

<style lang="scss" scoped>
.el-menu {
    border-radius: 0;
}
.navbar-logo {
    font-size: 20px;
}
.navbar-user {
    float: right;
}
.navbar-avatar {
    width: 32px;
    padding: 2px;
    border: 1px solid #ccc;
    border-radius: 50%;
}
.navbar-username {
    color: #fff;
    margin-left: 5px;
}
.el-menu-item, .el-submenu__title {
    &:hover {
        color: #fff;
    }
    a {
        text-decoration: none;
    }
}
</style>
