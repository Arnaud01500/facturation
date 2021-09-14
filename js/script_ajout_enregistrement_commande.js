$('.form-main').on('click', '.remove', function() {
  $('.remove').closest('.form-main').find('.form-block').not(':first').last().remove();
});
$('.form-main').on('click', '.clone', function() {
  $('.clone').closest('.form-main').find('.form-block').first().clone().appendTo('.result');
});