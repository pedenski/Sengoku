var t = "test"; 
var getZ = function (data) {
return data;
};  

var colors = ['red', 'green', 'blue', 'yellow'], index = 0;
var getColor = function () {
(index >= colors.length) && (index = 0);
return colors[index++];
};
