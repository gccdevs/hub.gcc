<template>
    <div>
        <section class="hero is-fullheight is-default is-bold">
            <div class="hero-body" style="padding-bottom:0px;">
                <div class="container has-text-centered">
                    <div class="columns is-vcentered">
                        <div class="column is-5">
                            <figure class="image is-4by3">
                                <img src="./../../../image/gcclogoH1140.png" alt="Description">
                            </figure>
                        </div>
                        <div class="column is-6 is-offset-1">
                            <h1 class="title is-2">
                                Comming Soon
                            </h1>
                            <h2 class="subtitle is-4"><br><br>
                                For baptism enquiry please directly contact your cell group leader.<br><br>
                                <p class="has-text-centered">
                                    <a href="/" style="text-decoration: none;" class="button is-medium is-info is-outlined">
                                        Back to Hub
                                    </a>
                                </p>
                                <br><br>
                                <a href="#channels" style="text-decoration:none;">Or send us your idea through the channels below.</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <home-footer id="channels" style="background-color:#343a40;padding-bottom: 0px;padding-top:0px;"></home-footer>

    </div>
</template>


<script>

    import HomeFooter from './../home/Footer'

    export default {
        components:{
            HomeFooter
        }
    }

</script>

<style src="./../../../../../public/css/bulma-0.6.1/css/bulma.css"></style>