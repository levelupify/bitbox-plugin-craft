$(document).ready(function() {

  var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
  var eventer = window[eventMethod];
  var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

  // Listen to message from child window
  window.addEventListener('message',function(e) {
    var key = e.message ? 'message' : 'data';
    var rawData = e[key];
    var data = JSON.parse(rawData);
    console.log('data from iframe', data);
    var elementId = data._id;
    var container = $('.Bitbox-container[data-id="' + elementId + '"]');
    delete data._id;
    var button = container.find('.Bitbox-button');
    var pickerContainer = container.find('.Bitbox-picker-container');
    var picker = container.find('.Bitbox-picker');
    var element = container.find('.Bitbox-element');
    var input = container.find('.Bitbox-element input');
    pickerContainer.hide();
    picker.html('');
    button.hide();
    element.show().find('.Bitbox-thumbnail img').attr('src', (data.thumbUrl || data.url));
    input.val(rawData);
  }, false);

  $(document).on('click', '.file-system-picker-open, .Bitbox-element .Bitbox-thumbnail img', function(ev) {
    var container = $(ev.target).closest('.Bitbox-container');
    var pickerContainer = container.find('.Bitbox-picker-container');
    var picker = container.find('.Bitbox-picker');

    pickerContainer.show();
    picker.html('<iframe src="http://bitbox.xyz/?mode=picker&_pickerid=' + container.data('id') + '" width="100%" height="100%"></iframe>');

    ev.preventDefault();
  });

  $(document).on('click', '.file-system-remove', function(ev) {
    var container = $(ev.target).closest('.Bitbox-container');
    var button = container.find('.Bitbox-button');
    var pickerContainer = container.find('.Bitbox-picker-container');
    var picker = container.find('.Bitbox-picker');
    var element = container.find('.Bitbox-element');
    var input = container.find('.Bitbox-element input');
    button.show();
    pickerContainer.hide();
    element.hide();
    picker.html('');
    input.val('');

    ev.preventDefault();
  });

  $(document).on('click', '.Bitbox-close', function(ev) {
    var container = $(ev.target).closest('.Bitbox-container');
    var pickerContainer = container.find('.Bitbox-picker-container');
    var picker = container.find('.Bitbox-picker');
    pickerContainer.hide();
    picker.html('');

    ev.preventDefault();
  });

});