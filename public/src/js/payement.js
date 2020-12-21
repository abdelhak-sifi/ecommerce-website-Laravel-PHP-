Stripe.setPublishableKey('pk_test_51HIcmyB7oga629UEQoA9pT8Rii1PrAr6xt8cuv9LwS81eC2hSdkvb0EBYoN1jiHR1bwg8KH9zrYiqh090btZTreQ00L9lzyhoX');

var $form=$('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        number : $('#card-number').val(),
        cvc : $('#cvv_id').val(),
        exp_month : $('#expiry-month-card').val(),
        exp_year : $('#expiry-year-card').val(),
        name : $('#card_name').val()
    },StripeResponseHandler);
    return false;
});

function StripeResponseHandler(status,response){
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').tex(response.error.message);
        $form.find('button').prop('disabled',false);
    }else{
        var token=response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        console.log(token);
        $form.get(0).submit();
    }

}