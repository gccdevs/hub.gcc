<template>
    <div>

        <div class="flex-center position-ref full-height" style="background-color:#343a40;">
            <div class="content">
                <img class="logo" src="./../../../image/gcc-logo.png" />
            </div>
        </div>

        <home-body></home-body>
        <home-footer></home-footer>
    </div>
</template>

<script>

    import HomeBody from './Body'
    import HomeFooter from './Footer'

    export default{

        components:{
            HomeBody,
            HomeFooter
        }

    }

</script>


<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .content {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .links > li {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .footer h1 {
        color:white;
    }

</style>