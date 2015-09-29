var Class = function (constructor, methods) {
    var Class = constructor || function () {};

    for (var method in methods) {
        if (!methods.hasOwnProperty(method)) {
            continue;
        }

        Class.prototype[method] = methods[method];
    }

    return Class;
};

var Cross = Class(function (step) {
    this.$container = $('<img src="cross.png"/>');
    this.setStep(step);

    $('body').append(this.$container);
}, {
    moveLeft: function () {
        var pos = parseInt(this.$container.css('left'));
        this.$container.css('left', pos - this.step)
    },
    moveRight: function () {
        var pos = parseInt(this.$container.css('left'));
        this.$container.css('left', pos + this.step)
    },
    moveUp: function () {
        var pos = parseInt(this.$container.css('top'));
        this.$container.css('top', pos - this.step)
    },
    moveDown: function () {
        var pos = parseInt(this.$container.css('top'));
        this.$container.css('top', pos + this.step)
    },
    setStep: function(step){
        this.step = parseInt(step);
    }
});

const CODE_RIGHT_ARROW = 39;
const CODE_LEFT_ARROW = 37;
const CODE_UP_ARROW = 38;
const CODE_DOWN_ARROW = 40;

var cross = new Cross(5);
var $body = $('body');

$body.on('keydown', function (e) {
    if (e.keyCode == CODE_RIGHT_ARROW) {
        cross.moveRight();
    }

    if (e.keyCode == CODE_LEFT_ARROW) {
        cross.moveLeft();
    }

    if (e.keyCode == CODE_UP_ARROW) {
        cross.moveUp();
    }

    if (e.keyCode == CODE_DOWN_ARROW) {
        cross.moveDown();
    }
});
