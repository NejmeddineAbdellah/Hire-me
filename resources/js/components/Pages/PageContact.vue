<template>
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                        placeholder=" Votre Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Entrer votre nom et prenom">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Entre votre email address'" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entre Sujet'"
                                        placeholder="Entre le Subjet">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <div class="media-body">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <div class="media-body">
                            <h3>+212 000 000 000</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <div class="media-body">
                            <h3>support@hireme.com</h3>
                            <p>Envoyez-nous votre demande à tout moment !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
</template>

<script>
    export default {

    }
</script>

<style scoped>
    input,
    select,
    option {
        font-size: 30px;
        font-weight: 500;
        margin: auto;
        height: auto;
    }
</style>
