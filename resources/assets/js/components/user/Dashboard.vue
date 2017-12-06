<template>
    <div>
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group">
                    <router-link :to="{ name: 'form.show' }" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">表单</router-link>
                    <router-link :to="{ name: 'booking' }" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">Booking</router-link>
                    <router-link :to="{ name: 'calendar' }" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">Calendar</router-link>
                    <!--<router-link :to="{ name: 'user.register' }" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">创建用户</router-link>-->
                    <router-link :to="{ name: 'user.list' }" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">用户列表</router-link>
                    <router-link :to="{ name: 'message' }" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">发送信息</router-link>
                    <router-link :to="{name: 'profile'}" class="list-group-item list-group-item-light" activeClass="active" exact tag="button">个人资料</router-link>
                </ul>

            </div>
            <div class="col-md-10">
                <transition name="fade" mode="out-in">
                        <router-view></router-view>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'dashboard-wrapper'
    }
</script>