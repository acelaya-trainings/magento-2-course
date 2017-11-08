function Person (name, age, height) {
    this.name = name;
    this.age = age;
    this.height = height;
}

function Manager (name, age, height, job) {
    Person.call(this, name, age, height);
    this.job = job;
}
Manager.prototype = Person.prototype;

function TheOtherOne (name, age, height, experience, animals) {
    Person.call(this, name, age, height);
    this.experience = experience;
    this.animals = animals;
}
TheOtherOne.prototype = Person.prototype;


function Animal (eyesCount, legsCount, weight) {
    this.eyesCount = eyesCount;
    this.legsCount = legsCount;
    this.weight = weight;
}

function Mammal (eyesCount, legsCount, weight, nippleCount, hair) {
    Animal.call(this, eyesCount, legsCount, weight);
    this.nippelCount = nippleCount;
    this.hair = hair;
}
Mammal.prototype = Animal.prototype;

function Reptile (eyesCount, legsCount, weight, temperature, scales) {
    Animal.call(this, eyesCount, legsCount, weight);
    this.temperature = temperature;
    this.scales = scales;
}
Reptile.prototype = Animal.prototype;
