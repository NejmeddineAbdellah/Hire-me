<template>
    <div class="container">
        <div class="form_annonce">
            <div class="card">
                <h5 class="text-center mb-4">Powering world-class companies</h5>
                <form class="form-card" onsubmit="event.preventDefault()">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">First
                                name<span class="text-danger">*</span></label><input type="text" id="fname" name="fname"
                                placeholder="Enter your first name" onblur="validate(1)"></div>
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Last
                                name<span class="text-danger">*</span></label><input type="text" id="lname" name="lname"
                                placeholder="Enter your last name" onblur="validate(2)"></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"><label
                                class="form-control-label px-3">Business
                                email<span class="text-danger">*</span></label><input type="text" id="email"
                                name="email" placeholder="" onblur="validate(3)"></div>
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Phone
                                number<span class="text-danger">*</span></label><input type="text" id="mob" name="mob"
                                placeholder="" onblur="validate(4)"></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"><label class="form-control-label px-3">Job
                                title<span class="text-danger">*</span></label><input type="text" id="job" name="job"
                                placeholder="" onblur="validate(5)"></div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"><label class="form-control-label px-3">What
                                would you
                                be using Flinks for?<span class="text-danger">*</span></label><input type="text"
                                id="ans" name="ans" placeholder="" onblur="validate(6)"></div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"><button type="submit" class="btn-block btn-primary">Request a
                                demo</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}

</script>
<style>
    .form_annonce.card {
        padding: 30px 40px;
        margin-top: 10px;
        margin-bottom: 10px;
        border: none !important;
        box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2)
    }

    .form_annonce.blue-text {
        color: #00BCD4
    }

    .form_annonce.form-control-label {
        margin-bottom: 0
    }

    .form_annonceinput,
    textarea,
    button {
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
    }

    .form_annonceinput:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400
    }

    .form_annonce.btn-block {
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer
    }

    .form_annonce.btn-block:hover {
        color: #fff !important
    }

    .form_annonce.button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

</style>
