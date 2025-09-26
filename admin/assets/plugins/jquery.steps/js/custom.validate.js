/**
* Theme: Montran Admin Template
* Author: Coderthemes
* Form wizard page
*/

!function($) {
    "use strict";

    var FormWizard = function() {};

    FormWizard.prototype.createBasic = function($form_container) {
        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });
        return $form_container;
    },
    //creates form with validation
    FormWizard.prototype.createValidatorForm = function($form_container) {
        // Add custom validation method for matching passwords
        $.validator.addMethod("equalToPassword", function(value, element, param) {
            // Return true if the password matches the confirm password field
            return value === $(param).val();
        }, "Passwords do not match.");
    
        $form_container.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error); // Place error message after the element
            },
            rules: {
                // Add validation rules for password and confirm password fields
                password: {
                    required: true,
                    minlength: 6
                },
                confirm: {
                    required: true,
                    equalToPassword: "#password2" // Ensure confirm matches password
                }
            },
            messages: {
                password: {
                    required: "Please enter your password",
                    minlength: "Password must be at least 6 characters long"
                },
                confirm: {
                    required: "Please confirm your password",
                    equalToPassword: "Passwords do not match"
                }
            }
        });
    
        // Initialize the steps wizard
        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                // Ensure validation is done only on visible and enabled fields
                $form_container.validate().settings.ignore = ":disabled,:hidden";
                return $form_container.valid(); // Continue to the next step if valid
            },
            onFinishing: function (event, currentIndex) {
                // Final validation before submitting the form
                $form_container.validate().settings.ignore = ":disabled";
                return $form_container.valid(); // Check if the form is valid
            },
            onFinished: function (event, currentIndex) {
                // Final action after form is successfully validated
                alert("Form successfully submitted!");
            }
        });
    
        return $form_container;
    }
    ,
    //creates vertical form
    FormWizard.prototype.createVertical = function($form_container) {
        $form_container.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            stepsOrientation: "vertical"
        });
        return $form_container;
    },
    FormWizard.prototype.init = function() {
        //initialzing various forms

        //basic form
        this.createBasic($("#basic-form"));

        //form with validation
        this.createValidatorForm($("#wizard-validation-form"));

        //vertical form
        this.createVertical($("#wizard-vertical"));
    },
    //init
    $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.FormWizard.init()
}(window.jQuery);