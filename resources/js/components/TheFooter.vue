<template>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>A propos</h4>
                                    <div class="footer-pera">
                                        <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so
                                            behold.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address : UPM </p>
                                    </li>
                                    <li><a>
                                            <p>Téléphone : +8880 44338899</p>
                                        </a></li>
                                    <li><a>
                                            <p>Email : info@colorlib.com</p>
                                        </a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Lien rapide</h4>
                                <ul>
                                    <router-link to="/">
                                        <p>
                                            <li><a>Accueil</a></li>
                                        </p>
                                    </router-link>
                                    <router-link to="/contact">
                                        <p>
                                            <li><a>Contact</a></li>
                                        </p>
                                    </router-link>
                                    <router-link to="/Apropos">
                                        <p>
                                            <li><a>A propos</a></li>
                                        </p>
                                    </router-link>
                                    <router-link to="/AnnonceList"
                                        v-if="!connectedUser || connectedUser.role=='candidat'">
                                        <p>
                                            <li><a>Trouver Emploi</a></li>
                                        </p>
                                    </router-link>
                                    <router-link to="/CandidatList"
                                        v-if="connectedUser && connectedUser.role=='recruteur'">
                                        <p>
                                            <li><a>Trouver Candidat</a></li>
                                        </p>
                                    </router-link>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Entrez votre adresse mail pour recevoir les mises à jours</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Email Address" class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                        src="/img/icon/form.png" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->

            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
</template>

<script>
    import {
        ref
    } from 'vue'

    export default {
        setup() {
            const connectedUser = ref()
            if (localStorage.currentUser) {
                connectedUser.value = JSON.parse(localStorage.currentUser)
            }

            return {
                connectedUser,
            }
        }
    }
</script>

<style>
    footer {
        padding-top: 10%;
    }

    .footer-padding {
        padding-top: 30px;
        padding-bottom: 20px;
    }
</style>
