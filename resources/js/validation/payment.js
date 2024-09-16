document.addEventListener('DOMContentLoaded', function () {
    var sponsors = document.querySelectorAll('[id^="payment-form-"]');

    sponsors.forEach(function (form) {
        var sponsorId = form.id.split('-')[2]; // Ottieni l'ID dallo split dell'ID del form

        braintree.dropin.create({
            authorization: window.clientToken,  // Usa il client token globale
            container: '#dropin-container-' + sponsorId
        }, function (err, dropinInstance) {
            if (err) {
                console.error(err);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                dropinInstance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    // Invia il nonce al form
                    document.querySelector('#nonce-' + sponsorId).value = payload.nonce;
                    form.submit();
                });
            });
        });
    });
});
