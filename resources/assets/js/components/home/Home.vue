<template>
    <div>

        <div class="flex-center position-ref full-height" style="background-color:#343a40;">
            <div class="content">
                <img class="logo" src="./../../../image/gcc-logo.png" />
            </div>
        </div>

        <home-body></home-body>

        <div class="footer">
            <div class="pages-container">
                <ul class="links contact-nav text-white text-center" style="padding-left:0px;margin-bottom: 0px;">
                    <p class="connect text-white text-center" style="font-size: 24px;padding-top:80px;padding-bottom:20px;">Connect with us</p>

                    <li class="social text-center">
                        <a href="https://www.facebook.com/GloryCityChurch" target="_blank"><i class="fa-color fa fa-facebook fa-3x"></i></a>
                    </li>

                    <li class="social text-center">
                        <a href="https://www.instagram.com/glorycitychurch_mel" target="_blank"><i class="fa-color fa fa-instagram fa-3x"></i></a>
                    </li>

                    <li class="social text-center">
                        <a href="https://www.youtube.com/user/GloryCityMelbourne" target="_blank"><i class="fa-color fa fa-youtube fa-3x"></i></a>
                    </li>

                    <li class="social text-center">
                        <a href="https://www.centralhub.glorycitychurch.com/login" target="_blank"><i class="fa-color fa fa-sign-in fa-3x"></i></a>
                    </li>

                    <p class="connect text-white text-center" style="font-size: 24px;padding-top:40px;padding-bottom:100px;margin-bottom:0px;">Central Hub - GCC</p>
                </ul>


            </div>
        </div>
    </div>
</template>

<script>

    import HomeBody from './Body'

    export default{

        components:{
            HomeBody
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

    .footer {
        background-color:#343a40;
    }

    .footer h1 {
        color:white;
    }

    .social {
        padding: 0;
        display:inline-block;
        list-style-type: none;
        box-sizing: border-box;
        text-align: center;
    }

    .fa-color {
        color:white;
    }

    .fa-color:hover {
        color:gray;
    }

</style>