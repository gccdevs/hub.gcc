<template>
    <div class="container">
        <h1 class="is-size-1 has-text-centered" style="color:#00cba9;"><em class="fa  fa-check-circle fa-3x"></em></h1>
        <br>
        <h1 class="is-size-3 has-text-centered">Invitation link has been sent to <b>{{ this.email }}</b></h1>
    </div>
</template>


<script>

    export default {

        props:['email','name','role'],

    }

</script>