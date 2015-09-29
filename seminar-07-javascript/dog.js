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


var Dog = Class({
    sayHello: function () {
        console.log('Гав, гав, я ' + this.name + '!');
    }
}, function (name) {
    this.name = name;
});

var bobik = new Dog('Бобик');

bobik.sayHello();