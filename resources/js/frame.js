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
    var container = $('.FileSystemElement-container[data-id="' + elementId + '"]');
    delete data._id;
    var button = container.find('.FileSystemElement-button');
    var pickerContainer = container.find('.FileSystemElement-picker-container');
    var picker = container.find('.FileSystemElement-picker');
    var element = container.find('.FileSystemElement-element');
    var input = container.find('.FileSystemElement-element input');
    pickerContainer.hide();
    picker.html('');
    button.hide();
    element.show().find('.FileSystemElement-thumbnail img').attr('src', (data.thumbUrl || data.url));
    input.val(rawData);
  }, false);

  $(document).on('click', '.file-system-picker-open, .FileSystemElement-element .FileSystemElement-thumbnail img', function(ev) {
    var container = $(ev.target).closest('.FileSystemElement-container');
    var pickerContainer = container.find('.FileSystemElement-picker-container');
    var picker = container.find('.FileSystemElement-picker');

    pickerContainer.show();
    picker.html('<iframe src="http://files.levelup.no/?mode=picker&_pickerid=' + container.data('id') + '" width="100%" height="100%"></iframe>');

    ev.preventDefault();
  });

  $(document).on('click', '.file-system-remove', function(ev) {
    var container = $(ev.target).closest('.FileSystemElement-container');
    var button = container.find('.FileSystemElement-button');
    var pickerContainer = container.find('.FileSystemElement-picker-container');
    var picker = container.find('.FileSystemElement-picker');
    var element = container.find('.FileSystemElement-element');
    var input = container.find('.FileSystemElement-element input');
    button.show();
    pickerContainer.hide();
    element.hide();
    picker.html('');
    input.val('');

    ev.preventDefault();
  });

  $(document).on('click', '.FileSystemElement-close', function(ev) {
    var container = $(ev.target).closest('.FileSystemElement-container');
    var pickerContainer = container.find('.FileSystemElement-picker-container');
    var picker = container.find('.FileSystemElement-picker');
    pickerContainer.hide();
    picker.html('');

    ev.preventDefault();
  });

});