$(document).ready(function() {
var input = $('.nav-search-input');
var results = $('.result-search');
input.on('focus', function() {
if (input.is(':focus')) {
results.show().css('display', 'flex');
}
});
input.on('blur', function() {
results.hide().css('display', 'none');
});
});