<template>
    <div>

        <h1>Successfully</h1>
        <h3>check your inbox for email confirmation.</h3>

        <h3>Purchase Detail: </h3>
        <h4 v-text="'Name: ' + this.name"></h4>
        <h4 v-text="'Receipt: ' + this.paymentRef"></h4>
        <h4 v-text="'Email: ' + this.email"></h4>
        <h4 v-text="'Mobile: ' + this.gender"></h4>
        <h4 v-text="'First Time: ' + this.firstTime"></h4>
        <h4 v-text="'Gender: ' + this.mobile"></h4>
        <h4 v-text="'Address: ' + this.address"></h4>
        <h4 v-text="'Where hear us: ' + this.path"></h4>
    </div>
</template>


<script>

    export default {

        props:['email','name','address','mobile','gender', 'paymentRef', 'firstTime','path'],

    }

</script>