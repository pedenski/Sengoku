
$(document).ready(function() {






// $('#Notice-7').click(function() {

//   new jBox('Notice', {
//     theme: 'NoticeFancy',
//     attributes: {
//       x: 'left',
//       y: 'bottom'
//     },
//     color: getColor(),
//     content: getString(),
//     title: getTitle(),
//     maxWidth: 600,
//     audio: 'jbox/Source/audio/bling2',
//     volume: 80,
//     autoClose: Math.random() * 8000 + 2000,
//     animation: {open: 'slide:bottom', close: 'slide:left'},
//     delayOnHover: true,
//     showCountdown: true,
//     closeButton: true
//   });
  
// });



/* Image */


new jBox('Image', {
  imageCounter: true,
  imageCounterSeparator: ' of '
});


/* Additional JS for demo purposes  */


$('.target-notice').click(function() {
  $(this).addClass('active').html('Click me again');
}).mouseleave(function() {
  $(this).removeClass('active').html('Click me');
});

var colors = ['red', 'green', 'blue', 'yellow'], index = 0;
var getColor = function () {
  (index >= colors.length) && (index = 0);
  return colors[index++];
};

var strings = ['Short', 'You just switched the internet off', 'Please do not click too hard - next time we\'ll notify google.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'];
var getString = function () {
  return strings[Math.floor(Math.random()*strings.length)];
};

var titles = ['Congrats', 'Success', 'Thank you', false, false, false];
var getTitle = function () {
  return titles[Math.floor(Math.random()*strings.length)];
};


});

