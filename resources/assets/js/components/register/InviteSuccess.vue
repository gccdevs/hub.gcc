<template>
    <div class="text-center">
        <h1 style="color:#00cba9;"><em class="fa  fa-check-circle fa-3x"></em></h1>
        <br>
        <h3>Invitation link has been sent to <b>{{ email }}</b></h3>
    </div>
</template>


<script>

    export default {

        props:['email','name','role'],

    }

</script>