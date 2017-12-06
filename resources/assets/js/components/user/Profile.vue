<template>
    <div>
        <h1>个人信息</h1>
        <br>
        <router-link to="#" class="btn btn-outline-info" activeClass="active" exact>修改信息</router-link>
        <router-link to="#" class="btn btn-outline-info" activeClass="active" exact>修改密码</router-link>
        <br><br>
        <ul class="list-group">
            <li class="list-group-item">
                用户名
                <br>
                <h4> user.name </h4>
            </li>
            <li class="list-group-item">
                邮箱
                <br>
                <h4> user.email </h4>
            </li>
        </ul>
    </div>
</template>

<script>
    export default{

    }
</script>
