<template>
    <div id="app">
        <header>
            <navbar></navbar>
        </header>
        <div class="main-body">
            <el-row type="flex" justify="center">
                <el-col :span="18">
                    <router-view></router-view>
                </el-col>
            </el-row>
        </div>
        <footer class="mt-6 p-2" style="background-color: #333">
            <el-row type="flex" justify="center">
                <el-col :span="18">
                    <span>Powered by <a href="https://github.com/xiaoruicode/timelog">Timelog</a></span>
                </el-col>
            </el-row>
        </footer>
    </div>
</template>

<script>
import Navbar from './components/admin/Navbar.vue';

export default {
    components: {
        'navbar': Navbar
    }
};
</script>
