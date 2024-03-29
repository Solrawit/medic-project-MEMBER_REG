document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.querySelectorAll('.ripple');
    buttons.forEach(function (button) {
      button.addEventListener('click', function (e) {
        var ripple = document.createElement('span');
        var rect = button.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;
  
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
  
        ripple.classList.add('ripple-effect');
        button.appendChild(ripple);
  
        setTimeout(function () {
          ripple.remove();
        }, 400);
      });
    });
  });
  